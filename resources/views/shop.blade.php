@extends('layout')

@section('content')
<section class="py-5">
    <div class="container px-5 mb-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Produk Digital Findara</span></h1>
            <p class="lead fw-normal text-muted mb-0 mt-2">Source code, template premium, dan panduan praktis siap pakai untuk akselerasi bisnis digital Anda.</p>
        </div>

        <div class="row gx-5 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center">
            @forelse($products as $product)
            <div class="col mb-5">
                <div class="card h-100 shadow border-0 rounded-4">
                    <img class="card-img-top rounded-top-4"
                         src="{{ $product->image ? (filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : asset('storage/' . $product->image)) : 'https://dummyimage.com/600x400/13357B/ffffff&text=Findara+Digital' }}"
                         alt="{{ $product->name }}"
                         style="height: 200px; object-fit: cover;" />

                    <div class="card-body p-4">
                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{ $product->category ?? 'Digital Product' }}</div>
                        <h5 class="card-title fw-bolder mb-2">{{ $product->name }}</h5>
                        <h4 class="text-primary fw-bolder mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</h4>
                        <p class="card-text mb-0 text-muted small">{{ $product->description }}</p>
                    </div>

                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                        <div class="d-grid">
                            <button type="button"
                                    class="btn btn-primary rounded-pill fw-bolder py-2"
                                    onclick="openCheckoutModal({{ $product->id }}, '{{ addslashes($product->name) }}', {{ $product->price }})">
                                <i class="bi bi-cart-check me-1"></i> Beli Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">Belum ada produk digital yang tersedia saat ini.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Modal Checkout Pembeli -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bolder" id="checkoutModalLabel">Checkout Produk Digital</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="bg-light p-3 rounded-3 mb-3">
                    <div class="small text-muted">Produk yang dipilih:</div>
                    <div class="fw-bolder text-dark" id="modalProductName">-</div>
                    <div class="fw-bolder text-primary mt-1" id="modalProductPrice">Rp 0</div>
                </div>

                <form id="checkoutForm">
                    <input type="hidden" id="product_id" name="product_id">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nama Lengkap</label>
                        <input type="text" class="form-control" id="customer_name" required placeholder="Masukkan nama lengkap Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Alamat Email (Untuk Pengiriman Akses File)</label>
                        <input type="email" class="form-control" id="customer_email" required placeholder="nama@email.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nomor WhatsApp</label>
                        <input type="tel" class="form-control" id="customer_phone" required placeholder="0812xxxxxxxx">
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bolder" id="payButton">
                            Lanjut ke Pembayaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Midtrans Snap JS (Otomatis menyesuaikan Sandbox / Production) -->
<script src="{{ config('services.midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>

<script>
    let checkoutModalInstance = null;

    function openCheckoutModal(id, name, price) {
        document.getElementById('product_id').value = id;
        document.getElementById('modalProductName').innerText = name;
        document.getElementById('modalProductPrice').innerText = 'Rp ' + Number(price).toLocaleString('id-ID');

        const modalEl = document.getElementById('checkoutModal');
        checkoutModalInstance = new bootstrap.Modal(modalEl);
        checkoutModalInstance.show();
    }

    document.getElementById('checkoutForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const payButton = document.getElementById('payButton');
        payButton.disabled = true;
        payButton.innerText = 'Memproses...';

        try {
            const response = await fetch("{{ route('shop.checkout') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    product_id: document.getElementById('product_id').value,
                    customer_name: document.getElementById('customer_name').value,
                    customer_email: document.getElementById('customer_email').value,
                    customer_phone: document.getElementById('customer_phone').value
                })
            });

            const data = await response.json();

            if (data.status === 'success' && data.snap_token) {
                checkoutModalInstance.hide();

                window.snap.pay(data.snap_token, {
                    onSuccess: function (result) {
                        alert('Pembayaran berhasil! Pesanan Anda (' + data.order_id + ') telah tercatat.');
                        window.location.reload();
                    },
                    onPending: function (result) {
                        alert('Menunggu pembayaran Anda. Silakan selesaikan sesuai instruksi.');
                        window.location.reload();
                    },
                    onError: function (result) {
                        alert('Pembayaran gagal diproses, silakan coba kembali.');
                    },
                    onClose: function () {
                        alert('Anda menutup jendela pembayaran sebelum menyelesaikan transaksi.');
                    }
                });
            } else {
                alert(data.message || 'Terjadi kesalahan saat menghubungi server pembayaran.');
            }
        } catch (error) {
            alert('Gagal terhubung ke server: ' + error.message);
        } finally {
            payButton.disabled = false;
            payButton.innerText = 'Lanjut ke Pembayaran';
        }
    });
</script>
@endsection