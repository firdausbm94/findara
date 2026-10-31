@extends('layout')

@section('content')
<!-- Page content-->
<section class="py-5">
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Hubungi Saya</h1>
                <p class="lead fw-normal text-muted mb-0">Mari bekerjasama mewujudkan ide Anda!</p>
            </div> <!-- -->
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <!-- Form Start -->
                    <form id="contactForm">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Masukkan nama Anda..." required />
                            <label for="name">Nama Lengkap</label>
                        </div> <!--[cite: 1] -->
                        
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="nama@email.com" required />
                            <label for="email">Alamat Email</label>
                        </div> <!--[cite: 1] -->
                        
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" placeholder="0812-3456-7890" required />
                            <label for="phone">Nomor Telepon / WhatsApp</label>
                        </div> <!--[cite: 1] -->
                        
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" placeholder="Tulis pesan Anda di sini..." style="height: 10rem" required></textarea>
                            <label for="message">Pesan / Kebutuhan Proyek</label>
                        </div> <!--[cite: 1] -->
                        
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="button" onclick="sendWhatsApp()">Kirim via WhatsApp</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script untuk direct ke WhatsApp -->
<script>
    function sendWhatsApp() {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var message = document.getElementById('message').value;

        // Validasi sederhana
        if(name == '' || message == '') {
            alert('Harap isi Nama dan Pesan Anda!');
            return;
        }

        // Format pesan ke WhatsApp (Ganti nomor di bawah dengan nomor lu)
        var waNumber = "6285213303200"; // Dari CV lu: 0852 1330 3200
        var waText = "Halo Firdaus,%0A%0ASaya " + name + ".%0AEmail: " + email + "%0ANo HP: " + phone + "%0A%0A" + message;
        
        var waUrl = "https://wa.me/" + waNumber + "?text=" + waText;
        
        // Buka tab baru ke WhatsApp
        window.open(waUrl, '_blank');
    }
</script>
@endsection