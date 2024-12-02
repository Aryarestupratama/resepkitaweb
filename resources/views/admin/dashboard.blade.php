<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
        :root {
            --primary-color: #2C3E50;
            --secondary-color: #34495E;
            --accent-color: #E74C3C;
        }

        body {
            font-family: 'Noto Sans', sans-serif;
            background-color: #F4F6F9;
            color: var(--primary-color);
        }

        .admin-card {
            transition: all 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
        }

        .admin-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        /* CSS Kustom untuk Navigasi Tab */
        .nav-tabs {
            border-bottom: 2px solid #000; /* Garis bawah hitam */
        }

        .nav-link {
            color: #000; /* Teks hitam */
            background-color: #fff; /* Latar belakang putih */
            border: 1px solid #000; /* Border hitam */
            transition: background-color 0.3s, color 0.3s; /* Transisi untuk efek hover */
        }

        .nav-link.active {
            background-color: #000; /* Latar belakang hitam untuk tab aktif */
            color: #fff; /* Teks putih untuk tab aktif */
        }

        .nav-link:hover {
            background-color: #f0f0f0; /* Latar belakang abu-abu muda saat hover */
            color: #000; /* Teks hitam saat hover */
        }

        .nav-link:focus {
            box-shadow: none; /* Menghilangkan efek fokus */
        }

        .btn-admin {
            background-color: var(--accent-color);
            color: white;
            transition: all 0.3s ease;
        }

        .btn-admin:hover {
            background-color: darken(var(--accent-color), 10%);
            transform: scale(1.05);
        }

        .user-card {
            border: 1px solid #e0e0e0; /* Warna border yang lebih lembut */
            border-radius: 8px; /* Membuat sudut card lebih melengkung */
            transition: transform 0.2s; /* Efek transisi saat hover */
        }

        .user-card:hover {
            transform: scale(1.02); /* Efek zoom saat hover */
        }

        .user-card-title {
            color: black; /* Warna judul hitam */
            font-weight: bold; /* Menebalkan teks judul */
            margin-bottom: 15px; /* Memberikan jarak di bawah judul */
        }

        .user-list-item {
            background-color: #f9f9f9; /* Warna latar belakang item daftar */
            border: 1px solid #e0e0e0; /* Border item daftar */
            transition: background-color 0.2s; /* Efek transisi saat hover */
        }

        .user-list-item:hover {
            background-color: #e0e0e0; /* Warna latar belakang saat hover */
        }

        .recipe-card {
            border: 1px solid #e0e0e0; /* Warna border yang lebih lembut */
            border-radius: 8px; /* Membuat sudut card lebih melengkung */
            transition: transform 0.2s; /* Efek transisi saat hover */
        }

        .recipe-card:hover {
            transform: scale(1.02); /* Efek zoom saat hover */
        }

        .recipe-card-title {
            color: black; /* Warna judul hitam */
            font-weight: bold; /* Menebalkan teks judul */
            margin-bottom: 15px; /* Memberikan jarak di bawah judul */
        }

        .recipe-list-item {
            background-color: #f9f9f9; /* Warna latar belakang item daftar */
            border: 1px solid #e0e0e0; /* Border item daftar */
            transition: background-color 0.2s; /* Efek transisi saat hover */
        }

        .recipe-list-item:hover {
            background-color: #e0e0e0; /* Warna latar belakang saat hover */
        }

        .popular-food-title {
            color: black; /* Mengubah warna judul menjadi hitam */
            font-family: 'Noto Sans', sans-serif; /* Font judul */
            margin-bottom: 30px; /* Jarak bawah judul */
        }

        .popular-food-card {
            border: 1px solid #e0e0e0; /* Border card */
            border-radius: 10px; /* Sudut card yang lebih melengkung */
            transition: transform 0.2s; /* Efek transisi saat hover */
            height: 100%; /* Memastikan card memiliki tinggi penuh */
        }

        .row {
            margin-left: 0; /* Menghilangkan margin kiri pada row */
            margin-right: 0; /* Menghilangkan margin kanan pada row */
        }

        .popular-food-card {
            margin-bottom: 20px; /* Mengatur jarak bawah antar card */
            margin-left: 200px;
        }

        .card {
            margin: 0 auto; /* Mengatur card agar rata tengah */
        }

        .popular-food-card-title {
            font-weight: bold; /* Menebalkan teks judul */
            color: black; /* Mengubah warna teks judul menjadi hitam */
            margin-bottom: 10px; /* Jarak bawah judul */
        }

        .card-img-top {
            height: 200px; /* Mengatur tinggi gambar agar seragam */
            object-fit: cover; /* Memastikan gambar tidak terdistorsi */
            border-top-left-radius: 10px; /* Sudut melengkung pada gambar */
            border-top-right-radius: 10px; /* Sudut melengkung pada gambar */
        }

        .view-viewers {
            transition: background-color 0.3s, transform 0.2s; /* Efek transisi */
        }

        .view-viewers:hover {
            background-color: #007bff; /* Mengubah warna latar belakang saat hover */
            transform: scale(1.05); /* Efek zoom saat hover */
        }

        .admin-title {
            color: #ffffff;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 30px;
            position: relative;
        }

        .admin-title::after {
            content: '';
            display: block;
            width: 100px;
            height: 4px;
            background: #ffffff;
            margin: 8px auto 0 auto;
            border-radius: 2px;
        }

        /* User List Styling */
        .user-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .user-card {
            background-color: #1e1e1e; /* Card warna abu-abu gelap */
            border: 1px solid #333333; /* Border untuk card */
            border-radius: 8px; /* Card rounded */
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(255, 255, 255, 0.3); /* Hover efek mewah */
        }

        .user-info p {
            margin: 5px 0;
            font-size: 16px;
            line-height: 1.5;
            color: #cccccc;
        }

        .user-info span {
            font-weight: bold;
            color: #ffffff;
        }

        .user-name {
            font-size: 20px;
            color: #ffffff;
            margin-bottom: 10px;
            text-transform: capitalize;
        }

        /* Recipe List Styling */
        .recipe-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Admin Recipe Section Title */
        .admin-recipe-title {
            color: #ffffff;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 30px;
            position: relative;
            text-align: center;
        }

        .admin-recipe-title::after {
            content: '';
            display: block;
            width: 120px;
            height: 4px;
            background: #ffffff;
            margin: 10px auto 0 auto;
            border-radius: 2px;
        }

        /* Recipe List Styling */
        .admin-recipe-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .admin-recipe-card {
            background-color: #1e1e1e; /* Card background warna abu-abu gelap */
            border: 1px solid #333333; /* Border */
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .admin-recipe-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(255, 255, 255, 0.3); /* Hover efek mewah */
        }

        .admin-recipe-info {
            padding: 20px;
        }

        .admin-recipe-title {
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 15px;
        }

        .admin-recipe-details {
            list-style-type: none;
            padding: 0;
            margin: 0;
            font-size: 16px;
            color: #cccccc;
            line-height: 1.6;
        }

        .admin-recipe-details li {
            margin-bottom: 8px;
        }

        .admin-recipe-details span {
            font-weight: bold;
            color: #ffffff;
        }

        /* Image Styling */
        .admin-recipe-img {
            width: 100%;
            height: auto;
            border-radius: 0;
            object-fit: cover;
        }

    </style>
</head>
<body>
<div class="container-fluid px-4 py-5">
    <header class="text-center mb-5">
        <h1 class="display-4 fw-bold text-dark">Culinary Admin Dashboard</h1>
    </header>


    <div class="row g-4 mb-5">
        <!-- Statistik Pengguna -->
        <div class="col-md-4">
            <div class="card admin-card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Total Pengguna</h4>
                    <p class="card-text display-6">{{ $statistics['totalUsers'] }}</p>
                </div>
            </div>
        </div>

        <!-- Statistik Resep -->
        <div class="col-md-4">
            <div class="card admin-card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Total Resep</h4>
                    <p class="card-text display-6">{{ $statistics['totalResep'] }}</p>
                </div>
            </div>
        </div>

        <!-- User dengan Subscriber Terbanyak -->
        <div class="col-md-4">
            <div class="card admin-card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">User dengan Subscriber Terbanyak</h4>
                    @if($userWithMostSubscribers)
                        <p class="card-text">{{ $userWithMostSubscribers->username }}</p>
                        <p class="card-text">Jumlah Subscriber: {{ $userWithMostSubscribers->subscribers_count }}</p>
                    @else
                        <p class="card-text">Tidak ada data subscriber.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-center my-4" style="color: black; font-family: 'Noto Sans', sans-serif;">Data Terbaru</h2>

    <div class="row">
        <!-- Data Pengguna Terbaru -->
        <div class="col-md-6 mb-4">
            <div class="card recipe-card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title recipe-card-title">Pengguna Terbaru</h5>
                    <ul class="list-group recipe-list-group">
                        @foreach($recentUsers as $user)
                        <li class="list-group-item recipe-list-item">
                            {{ $user->username }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Data Resep Terbaru -->
        <div class="col-md-6 mb-4">
            <div class="card recipe-card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title recipe-card-title">Resep Terbaru</h5>
                    <ul class="list-group recipe-list-group">
                        @foreach($recentResep as $resep)
                        <li class="list-group-item recipe-list-item">
                            {{ $resep->title }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="text-center popular-food-title">Makanan dan Minuman Populer Berdasarkan Views</h2>
        <div class="row justify-content-center">
            @foreach($makananPopuler as $resep)
            <div class="col-md-4 mb-3"> <!-- Menggunakan mb-3 untuk margin bawah -->
                <div class="card popular-food-card shadow-lg rounded-3">
                    <img src="{{ asset('storage/' . $resep->image_path) }}" class="card-img-top" alt="{{ $resep->title }}">
                    <div class="card-body">
                        <h5 class="card-title popular-food-card-title">{{ $resep->title }}</h5>
                        <p><strong>Views:</strong> {{ $resep->total_views }}</p>
                        <button class="btn btn-info btn-sm view-viewers" data-id="{{ $resep->id }}" title="Lihat daftar penonton">
                            <i class="fas fa-eye"></i> <!-- Menambahkan ikon mata dari Font Awesome -->
                            Lihat Penonton
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($minumanPopuler as $minuman)
            <div class="col-md-4 mb-3"> <!-- Menggunakan mb-3 untuk margin bawah -->
                <div class="card popular-food-card shadow-lg rounded-3">
                    <img src="{{ asset('storage/' . $minuman->image_path) }}" class="card-img-top" alt="{{ $minuman->title }}">
                    <div class="card-body">
                        <h5 class="card-title popular-food-card-title">{{ $minuman->title }}</h5>
                        <p><strong>Views:</strong> {{ $minuman->total_views }}</p>
                        <button class="btn btn-info btn-sm view-viewers" data-id="{{ $minuman->id }}" title="Lihat daftar penonton">
                            <i class="fas fa-eye"></i> <!-- Menambahkan ikon mata dari Font Awesome -->
                            Lihat Penonton
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
        
    <h2 class="text-center mb-4" style="margin-top: 50px;">Resep Makanan Terpopuler Berdasarkan Like dan Comment</h2>
        <div class="row justify-content-center">
            <!-- Resep Makanan dengan Like Terbanyak -->
            @if($mostLikedMakanan)
            <div class="col-md-3 mb-2">
                <div class="card shadow border-0 rounded-3" style="max-width: 300px; margin: auto;">
                    <img src="{{ asset('storage/' . $mostLikedMakanan->image_path) }}" class="card-img-top" alt="Resep Makanan Populer" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $mostLikedMakanan->title }}</h5>
                        <p class="card-text"><strong>Likes:</strong> {{ $mostLikedMakanan->likes_count }}</p>
                        <p class="card-text"><strong>Kategori:</strong> {{ $mostLikedMakanan->category }}</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Resep Makanan dengan Komentar Terbanyak -->
            @if($mostCommentedMakanan)
            <div class="col-md-3 mb-4">
                <div class="card shadow border-0 rounded-3" style="max-width: 300px; margin: auto;">
                    <img src="{{ asset('storage/' . $mostCommentedMakanan->image_path) }}" class="card-img-top" alt="Resep Makanan Populer" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $mostCommentedMakanan->title }}</h5>
                        <p class="card-text"><strong>Komentar:</strong> {{ $mostCommentedMakanan->comments_count }}</p>
                        <p class="card-text"><strong>Kategori:</strong> {{ $mostCommentedMakanan->category }}</p>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <h2 class="text-center mb-4">Resep Minuman Terpopuler Berdasarkan Like dan Comment</h2>
        <div class="row justify-content-center">
            <!-- Resep Minuman dengan Like Terbanyak -->
            @if($mostLikedMinuman)
            <div class="col-md-3 mb-4">
                <div class="card shadow border-0 rounded-3" style="max-width: 300px; margin: auto;">
                    <img src="{{ asset('storage/' . $mostLikedMinuman->image_path) }}" class="card-img-top" alt="Minuman Populer" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $mostLikedMinuman->title }}</h5>
                        <p class="card-text"><strong>Likes:</strong> {{ $mostLikedMinuman->likes_count }}</p>
                        <p class="card-text"><strong>Kategori:</strong> {{ $mostLikedMinuman->category }}</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Resep Minuman dengan Komentar Terbanyak -->
            @if($mostCommentedMinuman)
            <div class="col-md-3 mb-4">
                <div class="card shadow border-0 rounded-3" style="max-width: 300px; margin: auto;">
                    <img src="{{ asset('storage/' . $mostCommentedMinuman->image_path) }}" class="card-img-top" alt="Minuman Populer" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $mostCommentedMinuman->title }}</h5>
                        <p class="card-text"><strong>Komentar:</strong> {{ $mostCommentedMinuman->comments_count }}</p>
                        <p class="card-text"><strong>Kategori:</strong> {{ $mostCommentedMinuman->category }}</p>
                    </div> 
                </div>
            </div>
            @endif
        </div>

    <!-- Navigasi Tab -->
    <ul class="nav nav-tabs mb-4" id="adminTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="kelolaUser -tab" data-bs-toggle="tab" data-bs-target="#kelolaUser " type="button" role="tab" aria-controls="kelolaUser " aria-selected="true">Kelola Pengguna</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="kelolaResep-tab" data-bs-toggle="tab" data-bs-target="#kelolaResep" type="button" role="tab" aria-controls="kelolaResep" aria-selected="false">Kelola Resep</button>
        </li>
    </ul>

    <!-- Konten Tab -->
    <div class="tab-content" id="adminTabsContent">
        <div class="tab-pane fade show active" id="kelolaUser" role="tabpanel" aria-labelledby="kelolaUser-tab">
            <div class="container my-4">
                <h1 class="text-center admin-title" style="color: black">Daftar Pengguna</h1>
                <div class="user-list">
                    @foreach($users as $user)
                    <div class="user-card">
                        <div class="user-info">
                            <h3 class="user-name">{{ $user->username }}</h3>
                            <p><span>Email:</span> {{ $user->email }}</p>
                            <p><span>No. Telepon:</span> {{ $user->phone_number }}</p>
                            <p><span>Role:</span> {{ ucfirst($user->role) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


      <div class="tab-pane fade" id="kelolaResep" role="tabpanel" aria-labelledby="kelolaResep-tab">
    <div class="container my-4">
        <h1 class="text-center admin-recipe-title">Daftar Resep</h1>
        <div class="admin-recipe-list">
            @foreach($reseps as $resep)
            <div class="admin-recipe-card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $resep->image_path) }}" alt="Gambar Resep {{ $resep->title }}" class="admin-recipe-img img-fluid rounded">
                    </div>
                    <div class="col-md-8">
                        <div class="admin-recipe-info">
                            <h3 class="admin-recipe-title">{{ $resep->title }}</h3>
                            <ul class="admin-recipe-details">
                                <li><span>Pengunggah:</span> {{ $resep->user->username }}</li>
                                <li><span>Kategori:</span> {{ $resep->category }}</li>
                                <li><span>Bahan:</span> {{ $resep->ingredients }}</li>
                                <li><span>Langkah-langkah:</span> {!! nl2br(e($resep->steps)) !!}</li>
                                <li><span>Waktu Memasak:</span> {{ $resep->cooking_time }} menit</li>
                                <li><span>Portion:</span> {{ $resep->portion }} orang</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>



    <!-- Modal Viewers -->
    <div class="modal fade" id="viewersModal" tabindex="-1" aria-labelledby="viewersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewersModalLabel">Viewers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="viewersList" class="list-group">
                        <!-- Data viewers akan dimuat di sini -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Tangkap klik tombol "Lihat Viewers"
            document.querySelectorAll('.view-viewers').forEach(button => {
                button.addEventListener('click', function () {
                    const resepId = this.getAttribute('data-id');
                    const modal = new bootstrap.Modal(document.getElementById('viewersModal'));
                    const viewersList = document.getElementById('viewersList');

                    // Bersihkan isi modal sebelumnya
                    viewersList.innerHTML = '<li class="list-group-item">Memuat data...</li>';

                    // Lakukan AJAX request
                    fetch(`/resep/${resepId}/viewers`)
                        .then(response => response.json())
                        .then(data => {
                            // Tampilkan data viewers
                            viewersList.innerHTML = '';
                            if (data.viewers.length > 0) {
                                data.viewers.forEach(viewer => {
                                    const listItem = document.createElement('li');
                                    listItem.className = 'list-group-item';
                                    listItem.textContent = `${viewer.username} (${viewer.email})`;
                                    viewersList.appendChild(listItem);
                                });
                            } else {
                                viewersList.innerHTML = '<li class="list-group-item">Belum ada viewers.</li>';
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            viewersList.innerHTML = '<li class="list-group-item">Terjadi kesalahan saat memuat data.</li>';
                        });

                    // Tampilkan modal
                    modal.show();
                });
            });
        });
    </script>

</body>
</html>
