<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wdth,wght@62.5..100,100..900&display=swap" rel="stylesheet">
    
    <style>
         body {
            margin: 0;
            font-family: 'Noto Sans', sans-serif;
            color: #333;
            background-color: #f8f9fa;
            overflow-x: hidden; /* Prevent horizontal scroll */
        }

        .navbar {
            background-color: #DBAF50;
            position: fixed;
            z-index: 1000;
            width: 100%;
            top: 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan untuk kesan modern */
        }

        .navbar-brand {
            color: black; /* Warna default teks */
            font-weight: bold;
            font-size: 1.8rem; /* Sedikit lebih besar untuk penekanan */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); /* Bayangan halus untuk kedalaman */
            transition: transform 0.3s ease, text-shadow 0.3s ease, color 0.3s ease; /* Efek transisi lembut */
            margin-left: -100px;
        }

        .navbar-brand span {
            color: #ffffff; /* Warna berbeda untuk highlight */
            font-style: italic; /* Menambah variasi */
            text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.8); /* Sedikit glow pada span */
        }

        /* Efek Hover */
        .navbar-brand:hover {
            color: #f0902f; /* Warna hover menjadi oranye terang */
            text-shadow: 
                0 0 10px rgba(240, 144, 47, 0.8), /* Glowing utama */
                0 0 20px rgba(240, 144, 47, 0.6), /* Lapisan glow tambahan */
                0 0 30px rgba(240, 144, 47, 0.4); /* Glow lembut */
            transform: scale(1.1); /* Membesar sedikit untuk kesan interaktif */
        }

       /* Default Nav-link */
        .nav-link {
            color: #ffffff; /* Warna default link, putih untuk kontras */
            position: relative;
            font-weight: 600; /* Sedikit tebal */
            font-size: 1rem; /* Ukuran teks yang pas */
            transition: color 0.3s ease, transform 0.3s ease;
            margin-right: 20px;
        }

        .navbar-nav {
            margin-right: -150px;
        }

        /* Hover color and underline animation */
        .nav-link:hover {
            color: #f7f7f7; /* Warna teks saat di-hover, sedikit lebih terang */
            transform: scale(1.05); /* Sedikit pembesaran untuk efek hover */
        }

        .nav-link::after {
            content: ""; /* Pseudo-element for underline */
            position: absolute;
            left: 0;
            right: 0;
            bottom: -5px;
            height: 2px;
            background: #ffffff; /* Warna underline */
            transform: scaleX(0); /* Mulai dengan garis yang tidak terlihat */
            transform-origin: left; /* Garis muncul dari kiri ke kanan */
            transition: transform 0.3s ease;
        }

        /* Show underline on hover */
        .nav-link:hover::after {
            transform: scaleX(1); /* Garis muncul saat hover */
        }

        /* Active Link State */
        .nav-link.active {
            color: #ffffff; /* Warna teks link aktif */
        }

        .nav-link.active::after {
            transform: scaleX(1); /* Garis bawah terlihat */
            background: #f7f7f7; /* Warna underline aktif lebih terang */
        }

        .welcome-section {
            margin-top: 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-size: cover;
            background-position: center;
            animation: bg-change 20s infinite;
            height: 100vh; /* Penuh layar */
            background-color:#F8F9FA; /* Biru navy */
            color: #fff;
            text-align: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 100px;
        }        

        /* Keyframes for background change */
        @keyframes bg-change {
            0% {
                background-image: url({{ asset('assets/bg1.jpg') }});
            }
            33% {
                background-image: url({{ asset('assets/bg2.jpg') }});
            }
            66% {
                background-image: url({{ asset('assets/bg3.jpg') }});
            }
            100% {
                background-image: url({{ asset('assets/bg4.jpg') }});
            }
        }

        .welcome-section h1 {
            font-weight: 900;
            color: #f0902f;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 1);
            font-size: 3rem;
        }

        /* Tambahkan styling untuk teks */
        .welcome-text {
            font-size: 2rem;
            font-weight: bold;
            line-height: 1.5;
            color: #DBAF50;
             text-shadow: 1px 1px 3px rgba(0, 0, 0, 1);
        }

        /* General Container Styling */
        .container {
            max-width: 1140px; /* Batasi lebar maksimum agar tidak terlalu besar */
            margin: 0 auto; /* Pusatkan kontainer di tengah layar */
            padding: 0 40px; /* Beri sedikit ruang di sisi dalam */
            box-sizing: border-box; /* Pastikan padding dihitung dalam total ukuran */
        }

        /* Heading Styling */
        .container h2 {
            font-weight: bold;
            font-size: 2.2rem;
            color: #DBAF50;
            margin-bottom: 100px;
            position: relative;
            text-transform: uppercase;
            text-align: center;
        }

        .container h2::after {
            content: "";
            display: block;
            width: 80px;
            height: 4px;
            background: #DBAF50;
            margin: 10px auto 0;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Empat kolom per baris */
            gap: 20px; /* Jarak antar kartu */
            justify-items: center; /* Pusatkan item di setiap sel */
            width: 100%; /* Pastikan grid menggunakan seluruh lebar kontainer */
            margin: 0 auto;
        }

        @media (max-width: 992px) { /* Untuk layar sedang */
            .card-container {
                grid-template-columns: repeat(2, 1fr); /* Dua kolom */
            }
        }

        @media (max-width: 768px) { /* Untuk layar kecil */
            .card-container {
                grid-template-columns: 1fr; /* Satu kolom */
            }
        }

        /* Card Styling */
        .card {
            background: #ffffff;
            border-radius: 15px;
            width: 100%;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content:center;
            align-items: center;
            cursor: pointer;
            aspect-ratio: 1 / 1;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        /* Card Image */
        .card img {
            width: 100%; /* Isi seluruh lebar kartu */
            height: 100%; /* Isi seluruh tinggi kartu */
            object-fit: contain;
            object-position: center;
            transition: transform 0.3s ease;
        }

        .card:hover img {
            transform: scale(1.1);
        }

        /* Title Overlay */
        .card-title {
            position: absolute;
            bottom: 15px;
            left: 15px;
            right: 15px;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.6) 100%);
            color: #ffffff;
            padding: 10px 15px;
            font-size: 1.4rem;
            font-weight: bold;
            text-align: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
        }

        .card:hover .card-title {
            background: rgba(0, 0, 0, 0.8);
            color: #dbaf50; /* Warna emas saat hover */
        }

        /* Views Info */
        .card .views-info {
            position: absolute;
            top: 15px;
            left: 15px;
            background: rgba(0, 0, 0, 0.5);
            color: #ffffff;
            font-size: 1rem;
            padding: 5px 10px;
            border-radius: 5px;
            z-index: 1;
            transition: opacity 0.3s ease;
        }

        .card:hover .views-info {
            background: rgba(0, 0, 0, 0.8);
            color: #dbaf50; /* Warna emas saat hover */
        }

        /* Hover Effects */
        .card:hover .card-title,
        .card:hover .views-info {
            opacity: 1;
        }

       button.upload-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px; /* Ukuran awal tombol */
            height: 60px;
            border-radius: 50%;
            background-color: #DBAF50;
            color: white;
            font-size: 1rem;
            font-weight: 500;
            border: none;
            transition: all 0.3s ease;
            cursor: pointer;
            position: fixed; /* Tombol tetap di posisi yang sama saat scroll */
            bottom: 20px; /* Jarak dari bawah */
            right: 20px; /* Jarak dari kanan */
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.3);
            z-index: 1000; /* Pastikan tombol ada di atas elemen lain */
            overflow: hidden;
        }

        button.upload-btn:hover {
            width: 200px; /* Perluas tombol */
            border-radius: 35px; /* Bentuk lebih persegi panjang */
            justify-content: start; /* Teks rata kiri */
            padding-left: 20px; /* Jarak teks dari ikon */
            box-shadow: 0px 12px 25px rgba(0, 0, 0, 0.4);
        }

        button.upload-btn::before {
            content: ""; /* Awalnya tidak ada teks */
            position: relative;
            opacity: 0; /* Sembunyikan teks */
            transition: opacity 0.3s ease, transform 0.3s ease; /* Animasi halus */
            transform: translateX(-20px); /* Geser teks sedikit ke kiri */
        }

        button.upload-btn:hover::before {
            content: "Upload Resep"; /* Tambahkan teks saat hover */
            opacity: 1; /* Tampilkan teks */
            transform: translateX(0); /* Kembalikan teks ke posisi normal */
            margin-left: 15px; /* Jarak antara teks dan ikon */
            white-space: nowrap; /* Pastikan teks tetap dalam satu baris */
            margin-right: 30px;
        }

        footer {
            background-color: #333;
            color: #fff;
            margin-bottom: -17px;
        }

        .about-container,
        .social-container,
        .contact-container {
            padding: 50px 0px 0px 0px;
        }

        .about-container h1,
        .contact-container h2,
        .social-container h2 {
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            text-align: left;
        }

        .about-container p {
            font-weight: 400;
            font-size: 16px;     
            line-height: 28px;     
        }

       .contact-link {
            padding: 0;
            margin: 20px 0; /* Jarak atas dan bawah */
            list-style: none; /* Hilangkan bullet points */
            display: flex; /* Tampilkan secara horizontal */
            gap: 30px; /* Jarak antar elemen */
        }

        .contact-item a {
            font-size: 1rem; /* Ukuran teks */
            font-weight: bold; /* Teks tebal */
            color: #DBAF50; /* Warna default */
            text-decoration: none; /* Hilangkan garis bawah */
            padding: 10px 15px; /* Ruang di sekitar teks */
            border: 2px solid transparent; /* Garis awal transparan */
            border-radius: 5px; /* Membuat sudut membulat */
            transition: color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease; /* Efek transisi */
        }

        .contact-item a:hover {
            color: white; /* Warna teks saat hover */
            border-color: #DBAF50; /* Warna garis berubah */
            background-color: #DBAF50; /* Latar belakang saat hover */
            box-shadow: 0 4px 10px rgba(219, 175, 80, 0.5); /* Efek shadow */
            transform: scale(1.1); /* Sedikit membesar */
        }

        .contact-item a:active {
            transform: scale(0.95); /* Mengecil sedikit saat diklik */
            box-shadow: 0 2px 6px rgba(219, 175, 80, 0.3); /* Shadow lebih kecil */
        }

       .social-container ul {
            padding: 0;
            margin: 20px 0; /* Margin atas dan bawah */
            list-style: none; /* Hilangkan bullet points */
            display: flex;
            gap: 20px; /* Jarak antar elemen */
       }

       .social-item {
            display: inline-block;
            margin: 0 10px; /* Jarak antar ikon */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Efek transisi */
        }

        .social-item a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px; /* Ukuran kotak ikon */
            height: 50px;
            border-radius: 50%; /* Membuat bentuk lingkaran */
            background-color: #DBAF50; /* Warna latar belakang default */
            color: white; /* Warna ikon */
            text-decoration: none; /* Hilangkan underline */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow halus */
            transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease; /* Transisi efek */
        }

        .social-item a i {
            font-size: 1.5rem; /* Ukuran ikon */
        }

        .social-item a:hover {
            background-color: #f0902f; /* Warna hover */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2); /* Glow lebih intensif */
            transform: scale(1.1); /* Efek memperbesar saat hover */
        }

        .social-item a:active {
            transform: scale(0.95); /* Efek menekan saat klik */
        }


       .copyright {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 20px;
       }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg p-3">
        <div class="container">
            <a class="navbar-brand" href="#">Resep<span>Kita</span></a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li><a class="nav-link" href="{{ route('search.index') }}">Search</a></li>
                    <li><a class="nav-link" href="{{ route('bookmarks.index') }}">Collection</a></li>
                    <li><a class="nav-link" href="{{ route('subscriptions.index') }}">Subscribe</a></li>
                    <li><a class="nav-link" href="{{ route('notifications.index') }}">Notification</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" class="nav-link" >Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <section class="welcome-section">
        <h1>Halo, {{ $username }}! Selamat datang di aplikasi kami.</h1>
        <h2 class="welcome-text">
            <span id="typed-text"></span>
        </h2>
    </section>


    <div class="container" style="height: 100vh">
        <h2 class="text-center my-4" data-aos="fade-right" style="color: #DBAF50;">Makanan Populer</h2>
        <div class="card-container" data-aos="fade-up">
            @if($makananPopuler->isEmpty())
                <p class="text-center">Tidak ada makanan populer saat ini.</p>
            @else
                @foreach($makananPopuler as $resep)
                    <div class="card">
                        <a href="/resep/{{ $resep->id }}">
                            <img src="{{ asset('storage/' . $resep->image_path) }}" alt="{{ $resep->title }}">
                            <div class="card-title">{{ $resep->title }}</div>
                            <p class="views-info">{{ $resep->total_views }} x dilihat</p>
                        </a>
                    </div>       
                @endforeach
            @endif
        </div>
    </div>

    <div class="container" style="height: 100vh">
        <h2 class="text-center my-4" data-aos="fade-right" style="color: #DBAF50;">Minuman Populer</h2>
        <div class="card-container" data-aos="fade-up">
            @if($minumanPopuler->isEmpty())
                <p class="text-center">Tidak ada minuman populer saat ini.</p>
            @else
                @foreach($minumanPopuler as $resep)
                    <div class="card">
                        <a href="/resep/{{ $resep->id }}">
                            <img src="{{ asset('storage/' . $resep->image_path) }}" alt="{{ $resep->title }}">
                            <div class="card-title">{{ $resep->title }}</div>
                            <p class="views-info">{{ $resep->total_views }} x dilihat</p>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- Floating Upload Button -->
    <button class="upload-btn" onclick="location.href='{{ route('reseps.create') }}'">
        <i data-feather="plus"></i>
    </button>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#333" fill-opacity="1" d="M0,192L34.3,160C68.6,128,137,64,206,80C274.3,96,343,192,411,202.7C480,213,549,139,617,106.7C685.7,75,754,85,823,112C891.4,139,960,181,1029,176C1097.1,171,1166,117,1234,117.3C1302.9,117,1371,171,1406,197.3L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
    <!-- Footer -->
    <footer>
            <div class="about-container">
                <h1 data-aos="fade-up" data-aos-duration="1500">Tentang Kami</h1>
                <p data-aos="fade-up" data-aos-duration="1500">Di resepkita, kami berkomitmen menjadikan <strong>memasak sebagai aktivitas yang lebih seru dan bermakna</strong> . Kami percaya bahwa memasak adalah salah satu cara untuk menciptakan kehidupan yang lebih sehat, bahagia, dan berkelanjutan bagi semua.
                    Melalui resepkita, kami mendukung koki rumahan di mana saja untuk saling berbagi inspirasi, resep, dan cerita memasak.</p>
            </div>
            <div class="contact-container" >
                <h2 data-aos="fade-up" data-aos-duration="1500">Selengkapnya</h2>
                <ul class="contact-link" data-aos="fade-up" data-aos-duration="1500">
                    <li class="contact-item" ><a href="#">FAQ</a></li>
                    <li class="contact-item"><a href="#">Kirim Saran</a></li>
                </ul>
            </div>
            <div class="social-container">
                <h2 data-aos="fade-up" data-aos-duration="1500">Ikuti Kami</h2>
                <ul data-aos="fade-up" data-aos-duration="1500">
                    <li class="social-item"><a href="#"><i data-feather="facebook"></i></a></li>
                    <li class="social-item"><a href="#"><i data-feather="instagram"></i></a></li>
                    <li class="social-item"><a href="#"><i data-feather="twitter"></i></a></li>
                    <li class="social-item"><a href="#"><i data-feather="youtube"></i></a></li>
                </ul>
            </div>
        <p class="copyright">Copyright &copy; ResepKita</p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        AOS.init();
        feather.replace();
    </script>
     <script>
        setTimeout(function() {
        // Inisialisasi Typed.js
        var typed = new Typed('#typed-text', {
            strings: ["Mau masak apa hari ini?", "Buat resep sebanyak mungkin!", "Kreasi masakan untuk setiap momen!"],
            typeSpeed: 50,  // Kecepatan mengetik
            backSpeed: 30,  // Kecepatan menghapus
            loop: true      // Loop animasi
        });
         }, 1000);
    </script>
</body>
</html>
