<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Resep</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wdth,wght@62.5..100,100..900&display=swap" rel="stylesheet">
    <style>
/* Form Container */
.upload-form {
    background: rgba(255, 255, 255, 0.7); /* Efek glassmorphism */
    backdrop-filter: blur(10px); /* Blur latar belakang */
    border: 1px solid rgba(255, 255, 255, 0.3); /* Transparan lembut */
    border-radius: 15px;
    max-width: 500px; /* Batas lebar maksimum untuk form */
    width: 100%; /* Responsif penuh di perangkat kecil */
    margin: 30px auto; /* Jarak atas dan bawah yang lebih besar */
    padding: 30px;
    animation: fadeIn 0.7s ease-in-out;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2), 0 5px 15px rgba(219, 175, 80, 0.3); /* Shadow halus */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Hover Effect for Form */
.upload-form:hover {
    transform: scale(1.03);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3), 0 8px 20px rgba(219, 175, 80, 0.4); /* Shadow lebih intens */
}

/* Submit Button */
.btn-submit {
    background: linear-gradient(135deg, #DBAF50, #f2ca80);
    color: #fff;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
    margin-top: 20px;
    transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    width: 100%; /* Tombol memenuhi lebar form */
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1), 0 4px 15px rgba(219, 175, 80, 0.3);
}

.btn-submit:hover {
    background: linear-gradient(135deg, #c29244, #dba850);
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(219, 175, 80, 0.5);
}

/* Input and Textarea Styling */
.form-control, .form-select {
    background: rgba(255, 255, 255, 0.6); /* Transparansi untuk kesan mewah */
    border: 1px solid rgba(219, 175, 80, 0.5); /* Warna emas transparan */
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    border-radius: 5px;
    margin-bottom: 15px;
    height: auto;
    padding: 10px;
    font-size: 1rem;
    color: #333;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1); /* Shadow dalam */
}

.form-control:focus, .form-select:focus {
    border-color: #DBAF50;
    box-shadow: 0 0 8px rgba(219, 175, 80, 0.7);
    background: rgba(255, 255, 255, 0.8);
    color: #000;
}

/* Adjust for Full Page Usage */
body {
    background: radial-gradient(circle, #ffffff, #f6e6d5, #d3b77c); /* Gradient mewah */
    display: flex;
    align-items: flex-start;
    justify-content: center;
    padding: 50px 0;
    min-height: 100vh;
}

/* Title Styling */
h2 {
    font-weight: bold;
    text-transform: uppercase;
    color: #DBAF50;
    text-align: center;
    margin-bottom: 20px;
    font-size: 1.8rem;
    position: relative;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

h2::after {
    content: "";
    display: block;
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #DBAF50, #f2ca80);
    margin: 10px auto 0;
    border-radius: 2px;
}

/* Fade-in Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Button Back to Dashboard */
.btn-back-dashboard {
    display: inline-block;
    background: linear-gradient(135deg, #DBAF50, #f2ca80);
    color: #fff;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
    margin-bottom: 20px; /* Beri jarak dengan form */
    text-decoration: none;
    transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1), 0 4px 15px rgba(219, 175, 80, 0.3);
}

.btn-back-dashboard:hover {
    background: linear-gradient(135deg, #c29244, #dba850);
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(219, 175, 80, 0.5);
}

.btn-back-dashboard:active {
    transform: translateY(2px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15), 0 4px 10px rgba(219, 175, 80, 0.4);
}

    </style>
</head>
<body>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container py-5">
    <a href="/dashboard" class="btn-back-dashboard">Kembali ke Dashboard</a>
    <h2 class="text-center mb-4" style="color: #DBAF50;">Unggah Resep Anda</h2>
    <form action="{{ route('resep.store') }}" method="POST" enctype="multipart/form-data" class="upload-form p-4 shadow-lg rounded">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Resep</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Judul Resep" required>
        </div>
        <div class="mb-3">
            <label for="descriptions" class="form-label">Deskripsi Resep</label>
            <textarea id="descriptions" name="descriptions" class="form-control" placeholder="Deskripsi Resep" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Bahan-Bahan</label>
            <textarea id="ingredients" name="ingredients" class="form-control" placeholder="Bahan-Bahan" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="steps" class="form-label">Langkah-Langkah</label>
            <textarea id="steps" name="steps" class="form-control" placeholder="Langkah-Langkah" rows="4" required></textarea>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cooking_time" class="form-label">Waktu Memasak (menit)</label>
                <input type="number" id="cooking_time" name="cooking_time" class="form-control" placeholder="Waktu Memasak" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="portion" class="form-label">Porsi</label>
                <input type="number" id="portion" name="portion" class="form-control" placeholder="Porsi" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="image_path" class="form-label">Unggah Gambar</label>
            <input type="file" id="image_path" name="image_path" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select id="category" name="category" class="form-select" required>
                <option value="makanan">Makanan</option>
                <option value="minuman">Minuman</option>
            </select>
        </div>
        <button type="submit" class="btn btn-submit w-100 mt-3">Unggah Resep</button>
    </form>
</div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>
</html>