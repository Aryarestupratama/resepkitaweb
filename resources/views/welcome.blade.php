<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ResepKita</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
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

        .welcome-container {
            color: #fff;
            gap: 200px;
            margin-top: 80px;
            display: flex; /* Flexbox untuk membuat elemen sejajar horizontal */
            justify-content: space-between; /* Memberikan jarak antara kedua elemen */
            align-items: center; /* Menyelaraskan elemen secara vertikal */
            height: 100vh; /* Tinggi penuh halaman */
            padding: 0 50px; /* Menambahkan padding di kiri dan kanan */
            background-image: url({{ asset('assets/bg-welcome.jpg') }});
            background-size: cover; /* Membuat gambar latar memenuhi kontainer */
            background-position: center; /* Memusatkan gambar latar */
        }

        .welcome-word {
            max-width: 100%; /* Membatasi lebar maksimal */
        }

        .welcome-word h1 {
            margin-bottom: 20px; /* Jarak antar elemen */
            font-weight: 900;
            font-size: 3rem;
            text-shadow: 6px 6px 8px rgba(0, 0, 0, 1);
        }

        .welcome-word h2 {
            font-size: 1rem; /* Ukuran font sedang */
            margin-bottom: 30px; /* Jarak antar elemen */
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 1);
        }

        .welcome-hp {
            display: flex;
            flex-direction: column;
            flex: 1; /* Memberikan ruang untuk bagian gambar */
            max-width: 50%; /* Membatasi lebar maksimal */
            text-align: center; /* Pusatkan konten di dalam bagian gambar */
        }

        .welcome-hp .gambarhp{
            width: 100%;
            max-width: 250px; /* Mengatur lebar gambar relatif terhadap kontainer */
            height: auto;
            margin-bottom: 20px;
        }

        .unduh-btn,
        .login-btn {
            display: inline-block;
            width: 100%;
            max-width: 250px; /* Mengatur lebar gambar relatif terhadap kontainer */
            height: auto;
            margin-bottom: 20px;
            text-decoration: none;
            color: white;
            padding: 15px;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            background: linear-gradient(90deg, #c89a40, #dbaf50);
            border: none;
            border-radius: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .unduh-btn:hover,
        .login-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            background: linear-gradient(90deg, #dbaf50, #f3c76a);
        }

        .unduh-btn:active,
        .login-btn:active {
            transform: translateY(2px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            background: linear-gradient(90deg, #b5822f, #dbaf50);
        }

        .word-section {
            margin-right: 100px;
        }

        .word-section-right {
            margin-left: 100px;
            margin-right: 100px;
        }

        .container-section,
        .container-section-right {
            display: flex;
            align-items: center;
            margin: 20px;
        }

        .container-section h1,
        .container-section-right h1 {
            font-size: 34px;
            font-weight: 700;
            color: #4A4A4A;
        }

        .container-section h4,
        .container-section-right h4 {
            font-size: 16px;
            font-weight: 400;
            color: #4A4A4A;
            max-width: 800px;
            line-height: 24px;
            margin-bottom: 50px;
        }

        .gambarhp {
            width: 100%; /* Mengatur lebar penuh sesuai container */
            max-width: 300px; /* Batas lebar maksimal */
            height: auto; /* Menjaga rasio gambar */
        }

        footer {
            background-color: #F8F9FA;
            margin-bottom: -40px;
            color: #4A4A4A;
        }

        .about-container,
        .social-container,
        .contact-container {
            margin: 50px;
        }

        .about-container h1,
        .contact-container h2,
        .social-container h2 {
            font-size: 14px;
            font-weight: 600;
            color: #4A4A4A;
            margin-top: 20px;;
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg p-3">
        <div class="container">
            <a class="navbar-brand" href="#">Resep<span>Kita</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Welcome Section -->
    <div class="welcome-container" style="height:100vh;">
        <div class="welcome-word">
            <h1 data-aos="fade-right">Selamat Datang di Website ResepKita</h1>
            <h2 data-aos="fade-right">Masuk ke akunmu untuk menemukan berbagai resep dari pengguna lainnya.</h2>
            <a href="{{ route('login') }}" class="login-btn" data-aos="fade-right">Login</a>
        </div>
        <div class="welcome-hp">
            <img src="{{ asset('assets/dashboard.png') }}" alt="gambar hp halaman cari" class="gambarhp">
            <a href="#" class="unduh-btn">Unduh Aplikasi</a>
        </div>
    </div>

    <!-- Detail Cari -->
    <div class="container-section" style="height:100vh;">
        <div class="word-section" data-aos="fade-right" data-aos-duration="2000">
            <h1>Temukan berbagai resep dari komunitas ResepKita</h1>
            <h4>Gunakan fitur pencarian di resepkita untuk menemukan resep berdasarkan bahan atau nama hidangan, memastikan kamu selalu mendapatkan ide masakan baru setiap hari. <br><br>
                Pengalaman ini akan lebih menyenangkan dengan menggunakan resepkita secara gratis!</h4>
            <a href="#" class="unduh-btn">Unduh Aplikasi</a>
        </div>
       <img src="{{ asset('assets/cari.png') }}" alt="gambar hp halaman cari" class="gambarhp" data-aos="fade-right" data-aos-duration="1500">

    </div>

    <!-- Detail Simpan -->
    <div class="container-section-right flex-row-reverse" style="height:100vh;">
        <div class="word-section-right"  data-aos="fade-left" data-aos-duration="2000">
            <h1>Simpan Resep Favoritmu</h1>
            <h4>Dengan fitur Simpan Resep di resepkita, kamu bisa menyimpan resep menarik untuk dicoba kapan saja. <br> <br>
                Nikmati kemudahan menyimpan dan mengelola resep dengan aplikasi gratis resepkita!</h4>
            <a href="#" class="unduh-btn">Unduh Aplikasi</a>
        </div>
        <img src="{{ asset('assets/simpan.png') }}" alt="gambar hp halaman simpan" class="gambarhp"data-aos="fade-left" data-aos-duration="1500">
    </div>

    <!-- Detail Bagikan -->
    <div class="container-section" style="height:100vh;">
        <div class="word-section" style="margin-right: 200px; max-width: 1000px;" data-aos="fade-right" data-aos-duration="2000">
            <h1>Bagikan resepmu</h1>
            <h4>Kamu dapat mengabadikan dan membagikan pengalaman memasakmu maupun resep keluargamu dengan menuliskannya di Cookpad. <br> <br>
                Bagikan resepmu dengan aplikasi Cookpad! Gratis!</h4>
            <a href="#" class="unduh-btn">Unduh Aplikasi</a>
        </div>
        <img src="{{ asset('assets/bagikan.png') }}" alt="gambar hp halaman bagikan" class="gambarhp" data-aos="fade-right" data-aos-duration="1500">
    </div>
    
    <hr>

    <!-- Footer -->
    <footer>
            <div class="about-container">
                <h1 data-aos="fade-up" data-aos-duration="1500">Tentang Kami</h1>
                <p data-aos="fade-up" data-aos-duration="1500">Di resepkita, kami berkomitmen menjadikan <strong>memasak sebagai aktivitas yang lebih seru dan bermakna</strong> . Kami percaya bahwa memasak adalah salah satu cara untuk menciptakan kehidupan yang lebih sehat, bahagia, dan berkelanjutan bagi semua.
                    Melalui resepkita, kami mendukung koki rumahan di mana saja untuk saling berbagi inspirasi, resep, dan cerita memasak.</p>
            </div>
            <div class="contact-container">
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

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
        feather.replace();
    </script>
</body>
</html>
