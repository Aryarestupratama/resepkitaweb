<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wdth,wght@62.5..100,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Noto Sans', sans-serif;
            color: #333;
            background-color: #f8f9fa;
            overflow-x: hidden; /* Prevent horizontal scroll */
            line-height: 1.6;
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

        .search-form {
            margin-top: 150px;
            margin-left: 20px; /* Memberi margin kiri */
            text-align: left;
        }

        .search-box {
            border: 2px solid #DBAF50; /* Warna dominan */
            border-radius: 5px;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
            padding: 10px 15px; /* Spasi dalam */
        }

        .search-box:focus {
            box-shadow: 0 0 10px rgba(219, 175, 80, 0.5);
            transform: scale(1.02);
            outline: none;
        }

        /* Tombol Cari */
        .btn-search {
            background-color: #DBAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-search:hover {
            background-color: #b78e40;
            transform: scale(1.05);
            color: #fff;
        }

        /* Kontainer Hasil Pencarian */
        .result-container {
            max-width: 800px;
            margin: 0 auto;
        }

        /* Kartu Resep */
        .recipe-card {
            width: 100%;
            max-width: 700px;
            border: 1px solid #DBAF50;
            border-radius: 8px;
            overflow: hidden;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .recipe-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: scale(1.02);
        }

        /* Gambar Resep */
        .recipe-image img {
            width: 120px; /* Tinggi sesuai card */
            height: 100%; 
            object-fit: cover;
            border-right: 2px solid #DBAF50;
        }

        /* Info Resep */
        .recipe-title {
            font-weight: bold;
            color: #333;
        }

        .bookmark-icon {
            position: absolute;
            top: 10px;
            right: 15px;
        }

        .bookmark-icon i {
            color: #DBAF50;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .bookmark-icon i:hover {
            color: #b78e40;
        }

        /* Mengatur layout */
        .result-container .d-flex {
            position: relative; /* Untuk memposisikan icon */
            padding: 15px;
        }

        .recipe-card {
            width: 100%;
            max-width: 700px;
            border: 1px solid #DBAF50;
            border-radius: 8px;
            overflow: hidden;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
            color: inherit; /* Memastikan warna teks tetap */
        }

        .recipe-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: scale(1.02);
        }

        /* Bookmark Icon tetap tidak menjadi bagian dari link */
        .bookmark-icon button {
            cursor: pointer;
        }

        /* Kontainer Riwayat */
        .history-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .history-card {
            width: 100%;
            max-width: 700px;
            border: 1px solid #DBAF50;
            border-radius: 8px;
            overflow: hidden;
            padding: 10px;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .history-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: scale(1.02);
        }

        .history-image img {
            width: 120px;
            height: 100%;
            object-fit: cover;
            border-right: 2px solid #DBAF50;
        }

        .history-title {
            font-weight: bold;
            color: #333;
        }

        .history-card form {
            margin: 0;
        }

        .history-card form button {
            font-size: 0.9rem;
            padding: 5px 10px;
            transition: background-color 0.3s ease;
        }

        .history-card form button:hover {
            background-color: #c53030;
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

<div class="container">
    <!-- Form Pencarian -->
    <form action="{{ route('search.storeSearchQuery') }}" method="POST" class="search-form mb-4">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="d-flex align-items-center gap-2">
                    <!-- Kotak Pencarian -->
                    <input type="text" name="search_query" class="form-control search-box" placeholder="Cari resep..." required>
                    
                    <!-- Tombol Cari -->
                    <button type="submit" class="btn btn-search">Cari</button>
                </div>
            </div>
        </div>
    </form>



        <!-- Hasil Pencarian -->
    <div class="result-container">
        <h3 class="text-center mb-4">Hasil Pencarian:</h3>
        @if(isset($results) && $results->isNotEmpty())
            <div class="d-flex flex-column align-items-center gap-3">
                @foreach($results as $resep)
                    <a href="{{ route('resep.show', $resep->id) }}" class="card recipe-card text-decoration-none">
                        <div class="d-flex align-items-center">
                            <!-- Gambar Resep -->
                            <div class="recipe-image">
                                <img src="{{ asset('storage/' . $resep->image_path) }}" alt="{{ $resep->title }}">
                            </div>

                            <!-- Info Resep -->
                            <div class="flex-grow-1 ms-3">
                                <h5 class="recipe-title mb-2">{{ $resep->title }}</h5>
                                <p class="mb-1"><strong>Porsi:</strong> {{ $resep->portion }}</p>
                                <small class="text-muted">{{ $resep->user->username }}</small>
                            </div>

                            <!-- Icon Bookmark -->
                            <div class="bookmark-icon">
                                <button class="btn btn-link p-0">
                                    <i class="feather-icon" data-feather="bookmark"></i>
                                </button>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @elseif(isset($results))
            <p class="text-center">Tidak ada resep yang ditemukan.</p>
        @endif
    </div>
    <hr style="border: none;height: 2px;background-color: #DBAF50;margin-top: 100px;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
    <!-- Riwayat Pencarian -->
    <div class="history-container">
        <h3 class="text-center mb-4">Riwayat Pencarian:</h3>
        @if($history->isEmpty())
            <p class="text-center">Belum ada riwayat pencarian.</p>
        @else
            <div class="d-flex flex-column align-items-center gap-3">
                @foreach($history as $item)
                    @if($item->resep)
                        <div class="card history-card">
                            <div class="d-flex align-items-center">
                                <!-- Gambar Resep -->
                                <div class="history-image">
                                    <img src="{{ asset('storage/' . $item->resep->image_path) }}" alt="{{ $item->resep->title }}">
                                </div>

                                <!-- Info Resep -->
                                <div class="flex-grow-1 ms-3">
                                    <a href="{{ route('resep.show', $item->resep->id) }}" class="text-decoration-none text-dark">
                                        <h5 class="history-title mb-2">{{ $item->resep->title }}</h5>
                                        <small class="d-block mb-1">Diunggah oleh: {{ $item->resep->user->username }}</small>
                                        <small class="d-block text-muted">Dicari terakhir: {{ $item->created_at->diffForHumans() }}</small>
                                    </a>
                                </div>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('history.delete', $item->id) }}" method="POST" class="ms-3">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</div>
<hr style="border: none;height: 2px;background-color: #DBAF50;margin: 250px 60px 0px 60px;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        feather.replace();
    </script>
</body>
</html>
