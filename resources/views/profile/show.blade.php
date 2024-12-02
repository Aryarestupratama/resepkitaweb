<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profil {{ $user->username }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wdth,wght@62.5..100,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            color: #333;
            font-family: 'Noto Sans', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        /* Container Styling */
        .container {
            padding: 20px;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        /* Back to Dashboard Button */
        .btn-back-dashboard {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            color: #fff;
            background: #DBAF50;
            border: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn-back-dashboard:hover {
            background: #b38e3f;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-3px);
        }

        /* Profile Header */
        .profile-header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 2px solid #DBAF50;
            margin-bottom: 20px;
        }

        .profile-header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #DBAF50;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .profile-header p {
            font-size: 1.2rem;
            color: #666;
            margin-top: 5px;
        }

        /* Subscription Button */
        #subscription-button {
            font-size: 1rem;
            font-weight: bold;
            color: #fff;
            background: #DBAF50;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        #subscription-button:hover {
            background: #b38e3f;
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        /* General Card Styling */
        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            height: 100%; /* Memastikan card penuh sesuai layout */
            display: flex;
            flex-direction: column; /* Mengatur layout menjadi vertikal */
            justify-content: space-between;
            aspect-ratio: 1 / 1; /* Membuat kartu persegi */
        }

        /* Gambar di dalam kartu */
        .card-img-top {
            width: 100%;
            height: auto;
            max-height: 60%; /* Membatasi tinggi gambar agar teks selalu terlihat */
            object-fit: cover; /* Gambar tetap proporsional tanpa distorsi */
        }

        /* Teks di dalam kartu */
        .card-body {
            padding: 15px;
            background-color: #fff; /* Background putih untuk teks */
            text-align: center;
            flex-grow: 1; /* Memastikan area teks tetap fleksibel */
            display: flex;
            flex-direction: column;
            justify-content: center; /* Teks selalu berada di tengah secara vertikal */
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #DBAF50;
            margin-bottom: 10px;
            text-transform: capitalize; /* Membuat huruf pertama setiap kata menjadi kapital */
        }

        .card-text {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 5px;
            line-height: 1.4; /* Jarak antar baris lebih rapi */
        }

        /* Informasi Views */
        .views-info {
            font-size: 0.85rem;
            color: #DBAF50;
            font-weight: bold;
            background: rgba(219, 175, 80, 0.1); /* Warna background lembut */
            padding: 5px;
            border-radius: 8px;
            display: inline-block;
            margin-top: 5px;
        }

        /* Hover pada Kartu */
        .card:hover .card-title,
        .card:hover .views-info {
            color: #b38e3f;
        }

        /* Responsivitas untuk grid */
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .col-md-4 {
            flex: 1 1 calc(33.333% - 20px); /* Tiga kartu per baris dengan jarak */
            max-width: calc(33.333% - 20px);
        }

        [data-aos="fade-up"] {
            opacity: 1;
            transform: translateY(0);
        }

        [data-aos="zoom-in"] {
            opacity: 1;
            transform: scale(1);
        }

        [data-aos="fade-left"], [data-aos="fade-right"] {
            opacity: 1;
            transform: translateX(0);
        }

    </style>
</head>
<body>
    <div class="container" data-aos="fade-up">
    <a href="/dashboard" class="btn-back-dashboard" data-aos="fade-left" data-aos-delay="200">Kembali ke Dashboard</a>
    <div class="profile-header" data-aos="zoom-in" data-aos-delay="400">
    <h1>
        @if(auth()->user() && $user->username === auth()->user()->username)
            Profil Saya
        @else
            {{ $user->username }}
        @endif
    </h1>
        <p id="subscriber-count">{{ $subscriberCount }} Follower</p>
        @if(auth()->id() !== $user->id)
            @php
                $isSubscribed = $user->subscribers->contains('user_id', auth()->id());
            @endphp
            <form id="subscription-form" method="POST" action="{{ route('unsubscribe', $user->id) }}" data-aos="fade-right" data-aos-delay="600">
                @csrf
                @if($isSubscribed)
                    @method('DELETE')
                @endif
                <input type="hidden" name="subscribed_user_id" value="{{ $user->id }}">
                <button type="submit" class="btn btn-primary" id="subscription-button">
                    {{ $isSubscribed ? 'Unsubscribe' : 'Subscribe' }}
                </button>
            </form>
        @endif
    </div>
    <h2 class="text-center mb-5">Postingan</h2>
   <div class="uploaded-recipes" data-aos="fade-up" data-aos-delay="800">
    @if($reseps->isEmpty())
        <p data-aos="fade-in">Tidak ada resep yang diunggah.</p>
    @else
        <div class="row">
            @foreach($reseps as $resep)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('resep.show', $resep->id) }}" class="text-decoration-none text-dark">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $resep->image_path) }}" alt="{{ $resep->title }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $resep->title }}</h5>
                                <p class="card-text">Diunggah {{ $resep->created_at->diffForHumans() }}</p>
                                <p class="views-info">{{ $resep->total_views }} x dilihat</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>



</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#subscription-form').on('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman form secara default

            var form = $(this);
            var actionUrl = form.attr('action');
            var formData = form.serialize(); // Ambil data dari form

            // Kirim permintaan AJAX
            $.ajax({
                url: actionUrl, 
                method: form.find('[name="_method"]').val() || 'POST', // Gunakan method POST atau DELETE
                data: formData,
                success: function(response) {
                    // Update the subscription button text
                    $('#subscription-button').text(response.isSubscribed ? 'Unsubscribe' : 'Subscribe');
                    
                    // Update the subscriber count
                    $('#subscriber-count').text(response.newSubscriberCount + ' Subscriber');
                    
                    alert(response.message); // Display the message
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan, coba lagi.');
                }
            });
        });
    });
</script>
<script>
    AOS.init({
        duration: 1000,  /* Durasi animasi dalam milidetik */
        easing: 'ease-in-out',  /* Gaya transisi */
        once: true,  /* Animasi hanya muncul sekali */
        delay: 100   /* Penundaan animasi */
    });
</script>
</body>
</html>