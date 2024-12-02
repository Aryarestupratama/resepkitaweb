<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifikasi</title>
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

        /* Container Style */
        .notifikasi-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        /* Header */
        .notifikasi-container h2 {
            margin-top: 100px;
            font-size: 1.8rem;
            font-weight: bold;
            color: #DBAF50;
            margin-bottom: 20px;
            border-bottom: 2px solid #DBAF50;
            padding-bottom: 10px;
        }

        /* Notification List */
        .list-group {
            padding: 0;
        }

        /* Notification Item */
        .list-group-item {
            background-color: #fff;
            border: none;
            border-radius: 8px;
            margin-bottom: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .list-group-item-secondary {
            background-color: rgba(219, 175, 80, 0.1);
        }

        /* Hover Effect */
        .list-group-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            background-color: #DBAF50;
            color: white;
        }

        .list-group-item:hover p,
        .list-group-item:hover small {
            color: white;
        }

        /* Notification Message */
        .list-group-item p {
            font-size: 1rem;
            font-weight: 500;
            margin: 0 0 5px;
            color: #333;
        }

        /* Notification Time */
        .list-group-item small {
            font-size: 0.8rem;
            color: #777;
        }

        /* Button */
        .btn-link {
            color: #DBAF50;
            font-size: 0.9rem;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .btn-link:hover {
            color: #b89443;
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
                    <li><a class="nav-link" href="{{ route('subscriptions.index') }}">Subscribe</a></li>
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
    
    <div class="notifikasi-container" data-aos="fade-up">
    <h2 data-aos="zoom-in">Notifikasi</h2>
    <ul class="list-group">
        @foreach ($notifications as $notification)
            <li class="list-group-item {{ $notification->is_read ? 'list-group-item-secondary' : '' }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <p>{{ $notification->message }}</p>
                <small>{{ $notification->created_at->diffForHumans() }}</small>
                @if (!$notification->is_read)
                   <form action="{{ route('notifications.read', $notification->id) }}" method="POST" style="display:inline;">
                       @csrf
                       <button type="submit" class="btn btn-sm btn-link">Tandai sebagai dibaca</button>
                   </form>
                @endif
            </li>
        @endforeach
    </ul>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>