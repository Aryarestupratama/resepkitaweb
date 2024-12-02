<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookmark</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wdth,wght@62.5..100,100..900&display=swap" rel="stylesheet">

    <style>
        body {
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

        .playlist-container {
            padding: 20px;
            margin-top: 100px;
        }

        /* Card Playlist */
        .playlist-card {
            width: 200px;
            border: 1px solid #DBAF50;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            color: inherit;
            background-color: white;
        }

        .playlist-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Grid Gambar Resep */
        .playlist-images {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 4px;
            padding: 10px;
            background-color: #f8f9fa;
        }

        .playlist-image img {
            width: 100%;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
        }

        .playlist-image.placeholder {
            background-color: #e9ecef;
            width: 100%;
            height: 80px;
            border-radius: 4px;
        }

        /* Judul Playlist */
        .playlist-title {
            padding: 10px;
            font-size: 1rem;
            font-weight: bold;
            color: #333;
        }

       .bookmark-card {
            display: flex;
            align-items: center;
            margin-bottom: 15px; /* Memberikan jarak antar card */
            padding: 10px; /* Memberikan padding pada card */
            border-radius: 8px; /* Memberikan sudut membulat pada card */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan ringan pada card */
            background-color: #fff; /* Warna latar belakang putih */
            transition: box-shadow 0.3s ease; /* Transisi untuk efek hover */
            margin-left: 50px;
            margin-right: 50px;
        }

        .bookmark-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Efek hover untuk bayangan */
        }

        .bookmark-image {
            width: 80px; /* Mengatur ukuran gambar */
            height: 80px; /* Mengatur tinggi gambar agar proporsional */
            margin-right: 15px; /* Memberikan jarak antara gambar dan informasi */
            border-radius: 8px; /* Membulatkan sudut gambar */
            overflow: hidden;
        }

        .bookmark-image img {
            width: 100%; /* Membuat gambar mengikuti lebar kontainer */
            height: 100%; /* Membuat gambar mengikuti tinggi kontainer */
            object-fit: cover; /* Memastikan gambar tidak terdistorsi */
        }

        .bookmark-info {
            flex-grow: 1; /* Membuat informasi mengambil sisa ruang yang tersedia */
        }

        .bookmark-title {
            font-weight: bold;
            font-size: 16px; /* Mengatur ukuran font judul */
            margin-bottom: 5px;
        }

        .bookmark-uploaded-by,
        .bookmark-date {
            font-size: 14px; /* Mengatur ukuran font untuk informasi lainnya */
            color: #555; /* Memberikan warna teks sedikit lebih gelap */
        }

        .btn-danger {
            margin-left: auto; /* Menempatkan tombol hapus di sebelah kanan */
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
            position: absolute;
            opacity: 0; /* Sembunyikan teks */
            transition: opacity 0.3s ease, transform 0.3s ease; /* Animasi halus */
            transform: translateX(-20px); /* Geser teks sedikit ke kiri */
            color: white; /* Warna teks */
            font-size: 16px;
            font-weight: bold;
        }

        button.upload-btn:hover::before {
            content: "Buat Playlist Baru"; /* Tambahkan teks saat hover */
            opacity: 1; /* Tampilkan teks */
            transform: translateX(0); /* Kembalikan teks ke posisi normal */
            margin-left: 30px; /* Jarak antara teks dan ikon */
            white-space: nowrap; /* Pastikan teks tetap dalam satu baris */
            margin-right: 40px;
        }

        /* Form Playlist */
        #playlistForm {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); /* Memposisikan form di tengah */
            width: 80%;
            max-width: 600px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            display: none; /* Form disembunyikan secara default */
            z-index: 999; /* Pastikan form berada di atas konten */
        }

        #playlistForm h3 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #DBAF50;
            text-align: center;
        }

        #playlistForm .form-group {
            margin-bottom: 20px;
        }

        #playlistForm label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        #playlistForm input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        #playlistForm .form-check-label {
            font-size: 16px;
            color: #333;
        }

        #playlistForm button[type="submit"] {
            background-color: #DBAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        #playlistForm button[type="submit"]:hover {
            background-color: #c28f45; /* Warna lebih gelap saat hover */
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

    <div class="playlist-container">
        <h1 class="text-center mb-4">Daftar Playlist</h1>

        @if($playlists->isEmpty())
            <div class="alert alert-warning text-center">
                Belum ada playlist yang dibuat.
            </div>
        @else
            <div class="d-flex flex-wrap justify-content-center gap-4">
                @foreach($playlists as $playlist)
                    <a href="{{ route('playlists.show', $playlist->id) }}" class="card playlist-card text-decoration-none">
                        <!-- Grid Gambar Resep -->
                        <div class="playlist-images">
                            @foreach($playlist->reseps->take(4) as $resep)
                                <div class="playlist-image">
                                    <img src="{{ asset('storage/' . $resep->image_path) }}" alt="{{ $resep->title }}"
                                    alt="{{ $resep->title }}" 
                                    onerror="this.onerror=null;this.src='{{ asset('images/placeholder.jpg') }}';"
                                    loading="lazy">
                                </div>
                            @endforeach
                            @for($i = $playlist->reseps->count(); $i < 4; $i++)
                                <div class="playlist-image placeholder"></div>
                            @endfor
                        </div>
                        <!-- Judul Playlist -->
                        <div class="playlist-title text-center mt-2">
                            <strong>{{ $playlist->name }}</strong>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>

    <div class="bookmark-container">
        <h1 class="text-center mb-4">Daftar Bookmark</h1>

        @if($bookmarks->isEmpty())
            <div class="alert alert-warning text-center" style="margin : 0px 25px;">
                Belum ada resep yang disimpan ke bookmark.
            </div>
        @else
            <div class="list-group">
                @foreach($bookmarks as $bookmark)
                    <div class="bookmark-card d-flex align-items-center">
                        <!-- Link ke detail resep -->
                        <a href="{{ route('resep.show', $bookmark->resep->id) }}" class="d-flex w-100" style="text-decoration: none; color: inherit;">
                            <!-- Gambar Resep -->
                            <div class="bookmark-image">
                                @if($bookmark->resep->image_path)
                                    <img src="{{ asset('storage/' . $bookmark->resep->image_path) }}" alt="{{ $bookmark->resep->title }}">
                                @else
                                    <div class="placeholder-image">No Image</div>
                                @endif
                            </div>

                            <!-- Info Resep -->
                            <div class="bookmark-info flex-grow-1">
                                <h5 class="bookmark-title">{{ $bookmark->resep->title }}</h5>
                                <small class="bookmark-uploaded-by">Diunggah oleh {{ $bookmark->resep->user->username }}</small><br>
                                <small class="bookmark-date">Ditambahkan pada: {{ $bookmark->created_at->format('d M Y') }}</small>
                            </div>
                        </a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('bookmarks.destroy', $bookmark->id) }}" method="POST" class="ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>


    <button id="togglePlaylistForm" class="upload-btn">
         <i data-feather="plus"></i>
    </button>


    <div id="playlistForm">
        <form action="{{ route('playlists.store') }}" method="POST">
            @csrf
            <h3>Buat Playlist Baru</h3>
            <div class="form-group">
                <label for="playlist_name">Nama Playlist:</label>
                <input type="text" name="playlist_name" id="playlist_name" required>
            </div>
            <div class="form-group">
                <label>Pilih Resep:</label>
                <div id="resep_ids" required>
                    @foreach($bookmarks as $bookmark)
                        <div class="form-check">
                            <input type="checkbox" name="resep_ids[]" id="resep_{{ $bookmark->resep->id }}" value="{{ $bookmark->resep->id }}" class="form-check-input">
                            <label for="resep_{{ $bookmark->resep->id }}" class="form-check-label">{{ $bookmark->resep->title }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Buat Playlist</button>
        </form>
    </div>

    <hr style="margin-top: 350px;">
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
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        feather.replace();
    </script>
   <script>
    document.getElementById('togglePlaylistForm').addEventListener('click', function() {
        var form = document.getElementById('playlistForm');
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    });
</script>
</body>
</html>