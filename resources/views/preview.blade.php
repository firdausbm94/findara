<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ $project->title }} - Live Preview | Findara</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>
        body, html { margin: 0; padding: 0; height: 100%; overflow: hidden; background-color: #e9ecef; }
        .top-bar { height: 60px; background-color: #212529; color: white; display: flex; align-items: center; justify-content: space-between; padding: 0 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.2); z-index: 10; position: relative;}
        .iframe-container { height: calc(100vh - 60px); border: none; display: block; background: white; transition: width 0.3s ease-in-out; }
        .device-icons i { font-size: 1.2rem; cursor: pointer; margin: 0 10px; color: #adb5bd; transition: 0.3s; }
        .device-icons i:hover, .device-icons i.active { color: white; }
        .brand-text { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 1.2rem; text-decoration: none; color: white; }
    </style>
</head>
<body>
    <!-- Top Bar ala ThemeForest -->
    <div class="top-bar">
        <div class="d-flex align-items-center">
            <a href="{{ url('/') }}" class="brand-text me-4">Findara<span class="text-primary">.</span></a>
            <span class="d-none d-md-inline border-start border-secondary ps-4">{{ $project->title }}</span>
        </div>
        
        <!-- Toggle Ukuran Perangkat -->
        <div class="device-icons d-none d-lg-flex">
            <i class="bi bi-display active" onclick="changeDevice('100%', this)" title="Desktop View"></i>
            <i class="bi bi-tablet" onclick="changeDevice('768px', this)" title="Tablet View"></i>
            <i class="bi bi-phone" onclick="changeDevice('375px', this)" title="Mobile View"></i>
        </div>

        <div>
            <a href="{{ $project->live_url }}" target="_blank" class="btn btn-outline-light btn-sm me-2" title="Hapus Bingkai">
                <i class="bi bi-box-arrow-up-right"></i>
            </a>
            <a href="{{ url('/projects') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-x-lg"></i> Tutup
            </a>
        </div>
    </div>

    <!-- Iframe Area -->
    <div class="d-flex justify-content-center w-100" style="background: #343a40; height: calc(100vh - 60px);">
        <iframe id="preview-frame" src="{{ $project->live_url }}" class="iframe-container" style="width: 100%;"></iframe>
    </div>

    <script>
        // Script untuk mengubah ukuran iframe (Responsive Preview)
        function changeDevice(width, element) {
            document.getElementById('preview-frame').style.width = width;
            
            let icons = document.querySelectorAll('.device-icons i');
            icons.forEach(icon => icon.classList.remove('active'));
            element.classList.add('active');
        }
    </script>
</body>
</html>