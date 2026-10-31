@extends('layout')

@section('content')
<!-- Projects Section-->
<section class="py-5">
    <div class="container px-5 mb-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Katalog Project & Template</span></h1>
            <p class="lead fw-normal text-muted mb-0 mt-2">Kumpulan portofolio website dan sistem informasi yang dikembangkan oleh Findara.</p>
        </div>
        
        <!-- Grid Projects Dinamis dari Database -->
        <div class="row gx-5 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center">
            @foreach($projects as $project)
            <div class="col mb-5">
                <div class="card h-100 shadow border-0 rounded-4">
                    <!-- Menampilkan gambar thumbnail (jika ada file upload, ambil dari storage, jika dummy tampilkan langsung) -->
                    <img class="card-img-top rounded-top-4" 
                         src="{{ $project->image ? (filter_var($project->image, FILTER_VALIDATE_URL) ? $project->image : asset('storage/' . $project->image)) : 'https://dummyimage.com/600x400/343a40/6c757d' }}" 
                         alt="{{ $project->title }}" 
                         style="height: 200px; object-fit: cover;" />
                    
                    <div class="card-body p-4">
                        <div class="badge bg-{{ $project->badge_color }} bg-gradient rounded-pill mb-2">{{ $project->category }}</div>
                        <h5 class="card-title mb-3">{{ $project->title }}</h5>
                        <p class="card-text mb-0 text-muted">{{ $project->description }}</p>
                    </div>
                    
                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                        <div class="d-flex align-items-end justify-content-between">
                            <a class="btn btn-primary btn-sm px-3 rounded-pill" href="{{ route('project.preview', $project->id) }}">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Live View
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endsection