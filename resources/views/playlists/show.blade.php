<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Playlist {{ $playlist->name }}</title>
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

        body {
            font-family: 'Noto Sans', sans-serif;
            background-color: #ffffff;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Tombol Back-Link */
        .back-link {
            display: inline-block;
            text-decoration: none;
            padding: 10px 20px; /* Ukuran padding */
            background-color: #DBAF50; /* Warna utama */
            color: #fff; /* Warna teks putih */
            font-weight: bold;
            border-radius: 8px; /* Tepi tombol bulat */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan */
            transition: all 0.3s ease; /* Efek transisi */
            text-align: center; /* Pusatkan teks */
            margin-top: 100px;
        }

        .back-link:hover {
            background-color: #a0803d; /* Warna saat hover */
            transform: translateY(-3px); /* Efek mengangkat */
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2); /* Perbesar bayangan */
        }

        .back-link:active {
            transform: translateY(0); /* Efek klik */
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1); /* Bayangan mengecil */
        }

       /* Judul Playlist */
.playlist-title {
    font-size: 2.5rem; /* Ukuran lebih besar untuk menonjolkan judul */
    font-weight: 700; /* Lebih tebal untuk kesan kuat */
    color: #DBAF50;
    margin-top: 30px; /* Tambahkan jarak atas */
    margin-bottom: 15px; /* Sedikit jarak dengan subtitle */
    text-align: center;
    letter-spacing: 1.5px; /* Tambahkan spasi antar huruf untuk elegansi */
    position: relative;
}

.playlist-title::after {
    content: "";
    display: block;
    width: 80px; /* Garis dekoratif */
    height: 4px;
    background-color: #DBAF50;
    margin: 10px auto 0; /* Pusatkan garis di bawah teks */
    border-radius: 2px; /* Sedikit lengkung untuk lembut */
}

/* Subtitle Playlist */
.playlist-subtitle {
    font-size: 1.7rem; /* Sedikit lebih besar untuk keseimbangan */
    color: #444; /* Warna lebih gelap dari teks umum */
    margin-bottom: 25px; /* Tambahkan ruang ke elemen berikutnya */
    text-align: center;
    font-style: italic; /* Tambahkan gaya miring untuk estetika */
    line-height: 1.5; /* Buat teks lebih nyaman dibaca */
    transition: color 0.3s ease; /* Efek transisi warna */
}

.playlist-subtitle:hover {
    color: #DBAF50; /* Warna berubah saat hover */
}

        .playlist-recipes-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .playlist-card {
            display: flex;
            align-items: stretch;
            background-color: #DBAF50;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .playlist-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-left {
            flex-shrink: 0;
            width: 120px;
            height: 120px;
            overflow: hidden;
            border-radius: 10px 0 0 10px;
            background-color: #fff;
        }

        .recipe-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .playlist-card:hover .recipe-image {
            transform: scale(1.1); /* Efek zoom saat hover */
        }

        .card-right {
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: #ffffff;
            flex-grow: 1;
            border-radius: 0 10px 10px 0;
        }

        .recipe-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #DBAF50;
            margin-bottom: 5px;
            transition: color 0.3s ease;
        }

        .recipe-title:hover {
            color: #a0803d;
        }

        .recipe-uploader,
        .recipe-date {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 5px;
        }

        .recipe-uploader span,
        .recipe-date span {
            font-weight: bold;
            color: #DBAF50;
        }

        .recipe-date {
            font-style: italic;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg p-3">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">Resep<span>Kita</span></a>
        </div>
    </nav>


    <a href="{{ route('bookmarks.index') }}" class="back-link button-link">Kembali ke Bookmark</a>
    <h1 class="playlist-title">{{ $playlist->name }}</h1>
    <h2 class="playlist-subtitle">Resep dalam Playlist:</h2>
    <div class="playlist-recipes-container">
        @foreach($resep as $r)
            <div class="playlist-card">
                <div class="card-left">
                    <img src="{{ asset('storage/' . $r->image_path) }}" alt="Gambar {{ $r->title }}" class="recipe-image">
                </div>
                <div class="card-right">
                    <h3 class="recipe-title">{{ $r->title }}</h3>
                    <p class="recipe-uploader">Diunggah oleh: <span>{{ $r->user->username }}</span></p>
                    <p class="recipe-date">Diupload pada: <span>{{ \Carbon\Carbon::parse($r->created_at)->format('d M Y') }}</span></p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>