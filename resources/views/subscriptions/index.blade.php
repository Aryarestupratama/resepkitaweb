<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wdth,wght@62.5..100,100..900&display=swap" rel="stylesheet">
    <style>
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

        .navbar-nav {
            margin-right: -50px;
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

        /* Styling untuk daftar user yang disubscribe */
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            width: 100%;
            height: 150px; /* Ukuran gambar profile */
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        .card-body {
            padding: 15px;
        }

        .card-title a {
            color: #DBAF50;
            font-weight: bold;
            text-decoration: none;
        }

        .card-title a:hover {
            text-decoration: underline;
        }

        /* Styling untuk resep */
        .card-link {
            text-decoration: none;
            color: inherit;
        }

        .card h-100 {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-img-top {
            height: 200px; /* Ukuran gambar resep */
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-footer {
            background-color: #f9f9f9;
            padding: 10px;
            font-size: 0.9rem;
        }

        .card-footer a {
            color: #DBAF50;
        }

        .card-footer a:hover {
            text-decoration: underline;
        }

        .text-muted {
            font-size: 0.85rem;
        }

        /* Card untuk User yang Anda Subscribe */
        .user-card {
            border: none;
            background-color: transparent;
        }

        .icon-container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100px;  /* Ukuran lingkaran */
            height: 100px;
            border-radius: 50%;  /* Membuat lingkaran */
            background-color: #DBAF50;  /* Warna latar belakang lingkaran */
            margin: 0 auto;  /* Posisikan ke tengah */
        }

        .icon-user {
            font-size: 40px;  /* Ukuran ikon */
            color: white;  /* Warna ikon */
        }

        .card-body {
            padding: 10px;
        }

        .card-title {
            margin-top: 10px;
        }

        .card-title a {
            color: #DBAF50;
            text-decoration: none;
        }

        .card-title a:hover {
            text-decoration: underline;
        }

        /* Card untuk Resep */
        .card {
            border: none;
            background-color: white;  /* Latar belakang putih untuk card resep */
            border-radius: 10px;  /* Sedikit melengkungkan sudut card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  /* Memberikan bayangan ringan pada card */
            transition: all 0.3s ease;  /* Animasi halus saat hover */
        }

        .card:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);  /* Membuat bayangan lebih tajam saat hover */
        }

        .card img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;  /* Membuat gambar di card memiliki sudut melengkung */
        }

        .card-footer {
            background-color: #f8f9fa;  /* Warna latar belakang footer card */
            color: #6c757d;  /* Warna teks footer card */
            font-size: 0.875rem;
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
    <nav class="navbar navbar-expand-lg p-3">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">Resep<span>Kita</span></a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li><a class="nav-link" href="{{ route('search.index') }}">Search</a></li>
                    <li><a class="nav-link" href="{{ route('bookmarks.index') }}">Collection</a></li>
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

<div class="container" style="margin-top: 100px;">
    <h2 class="text-center mb-4">User yang Anda Subscribe</h2>
    <div class="row mb-4">
        @foreach($subscribedUsers as $userId)
            @php
                $user = App\Models\User::find($userId);
            @endphp
            <div class="col-md-3 mb-3">
                <div class="text-center user-card">
                    <div class="icon-container">
                        <i data-feather="user" class="icon-user"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none" style="color: #DBAF50;">
                                {{ $user->username }}
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="text-center mb-4">Resep dari User yang Anda Subscribe</h2>
    <div class="row mb-4">
        @foreach($reseps as $resep)
            <div class="col-md-4 mb-4">
                <a href="{{ route('resep.show', $resep->id) }}" class="card text-decoration-none">
                    <div class="card">
                        <img src="{{ asset('storage/' . $resep->image_path) }}" class="card-img-top" alt="{{ $resep->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $resep->title }}</h5>
                            <p class="card-text">{{ Str::limit($resep->description, 100) }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            Diunggah oleh: {{ $resep->user->username }} <br>
                            {{ $resep->created_at->diffForHumans() }}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        feather.replace();
    </script>
    <script>
        AOS.init();
    </script>
</body>
</html>