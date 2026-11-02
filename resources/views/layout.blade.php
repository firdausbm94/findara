<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Primary Meta Tags -->
        <meta name="title" content="Findara - Agensi IT & Digital Marketing Pekanbaru">
        <meta name="description" content="Solusi profesional pembuatan website, bridging SIMRS, dan strategi digital marketing terukur untuk bisnis Anda.">

        <!-- Open Graph / WhatsApp / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url('/') }}">
        <meta property="og:title" content="Findara - Agensi IT & Digital Marketing Pekanbaru">
        <meta property="og:description" content="Solusi profesional pembuatan website, bridging SIMRS, dan strategi digital marketing terukur untuk bisnis Anda.">
        <meta property="og:image" content="{{ asset('assets/logo.png') }}">

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Findara - Firdaus BM Portfolio</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

        <!-- Meta Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', 'MASUKKAN_PIXEL_ID_LU_DISINI');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=MASUKKAN_PIXEL_ID_LU_DISINI&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Meta Pixel Code -->
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
                <div class="container px-5">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('assets/logo1.png') }}" alt="Findara Digital Agency" style="max-height: 75px; width: auto;">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/resume') }}">Resume</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/projects') }}">Portofolio</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/shop') }}">Shop</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <!-- Area dinamis untuk konten halaman lain -->
            @yield('content')

        </main>
        <!-- Footer-->
        <footer class="bg-white py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0">Copyright © Firdaus BM - Findara 2026</div></div>
                    <div class="col-auto">
                        <a class="small" href="#!">Privacy</a>
                        <span class="mx-1">·</span>
                        <a class="small" href="#!">Terms</a>
                        <span class="mx-1">·</span>
                        <a class="small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>

        <!-- Findara AI Chat Widget -->
        <style>
            #findara-chat-widget { position: fixed; bottom: 30px; right: 30px; z-index: 9999; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
            .chat-btn { background: #13357B; color: white; border-radius: 50%; width: 65px; height: 65px; cursor: pointer; box-shadow: 0 4px 15px rgba(0,0,0,0.3); display: flex; justify-content: center; align-items: center; font-size: 28px; transition: transform 0.3s; }
            .chat-btn:hover { transform: scale(1.1); }
            .chat-window { display: none; width: 350px; height: 480px; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); flex-direction: column; overflow: hidden; position: absolute; bottom: 85px; right: 0; transform-origin: bottom right; animation: popUp 0.3s ease-out; }
            @keyframes popUp { from { opacity: 0; transform: scale(0.5); } to { opacity: 1; transform: scale(1); } }
            .chat-header { background: #13357B; color: white; padding: 18px; font-weight: 600; display: flex; justify-content: space-between; align-items: center; border-radius: 20px 20px 0 0; }
            .chat-body { flex: 1; padding: 20px; overflow-y: auto; display: flex; flex-direction: column; gap: 12px; background: #f8f9fa; }
            .chat-input-area { display: flex; padding: 15px; border-top: 1px solid #eee; background: #fff; }
            .chat-input-area input { flex: 1; padding: 12px 18px; border: 1px solid #ddd; border-radius: 25px; outline: none; font-size: 14px; }
            .chat-input-area button { background: #13357B; color: white; border: none; padding: 0 18px; margin-left: 10px; border-radius: 50%; cursor: pointer; transition: background 0.3s; }
            .chat-input-area button:hover { background: #0f2a63; }
            .msg { max-width: 80%; padding: 12px 16px; border-radius: 18px; font-size: 14px; line-height: 1.5; }
            .msg.user { background: #13357B; color: white; align-self: flex-end; border-bottom-right-radius: 4px; }
            .msg.ai { background: #e9ecef; color: #333; align-self: flex-start; border-bottom-left-radius: 4px; }
        </style>

        <div id="findara-chat-widget">
            <div class="chat-window" id="chatWindow">
                <div class="chat-header">
                    <span>🤖 Findara AI Assistant</span>
                    <span style="cursor:pointer; font-size: 18px;" onclick="toggleChat()">✖</span>
                </div>
                <div class="chat-body" id="chatBody">
                    <div class="msg ai">Halo! Saya AI dari Findara. Ada yang bisa saya bantu terkait layanan IT atau digital marketing hari ini?</div>
                </div>
                <div class="chat-input-area">
                    <input type="text" id="chatInput" placeholder="Ketik pesan di sini..." onkeypress="handleEnter(event)">
                    <button onclick="sendMessage()">➤</button>
                </div>
            </div>
            <div class="chat-btn" onclick="toggleChat()"> 💬 </div>
        </div>

        <script>
            function toggleChat() {
                const w = document.getElementById('chatWindow');
                w.style.display = w.style.display === 'flex' ? 'none' : 'flex';
                
                // Track ke Meta Ads kalau user buka chat
                if (w.style.display === 'flex' && typeof fbq === 'function') {
                    fbq('track', 'Contact');
                }
            }
            
            async function sendMessage() {
                const input = document.getElementById('chatInput');
                const msg = input.value.trim();
                if(!msg) return;
                
                appendMsg(msg, 'user');
                input.value = '';

                const loadingId = appendMsg('Sedang mengetik...', 'ai', true);

                try {
                    const res = await fetch('/api/chat', {
                        method: 'POST',
                        headers: { 
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                        },
                        body: JSON.stringify({ message: msg })
                    });
                    const data = await res.json();
                    removeMsg(loadingId);
                    appendMsg(data.reply, 'ai');
                } catch (e) {
                    removeMsg(loadingId);
                    appendMsg('Maaf, server sedang sibuk.', 'ai');
                }
            }
            
            function appendMsg(text, sender, isTemp = false) {
                const b = document.getElementById('chatBody');
                const d = document.createElement('div');
                d.className = `msg ${sender}`;
                d.innerText = text;
                const id = 'msg-' + Date.now();
                d.id = id;
                b.appendChild(d);
                b.scrollTop = b.scrollHeight;
                return id;
            }
            
            function removeMsg(id) {
                const el = document.getElementById(id);
                if(el) el.remove();
            }
            
            function handleEnter(e) {
                if(e.key === 'Enter') sendMessage();
            }
        </script>
        <!-- End Findara AI Chat Widget -->
    </body>
</html>