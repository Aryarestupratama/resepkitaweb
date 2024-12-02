<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wdth,wght@62.5..100,100..900&display=swap" rel="stylesheet">

    <style>
        /* General Styling */
        body {
            background: #DBAF50;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            text-align: center;
            max-width: 450px;
            padding: 0 15px;
            box-sizing: border-box;
        }

        /* Card Styling */
        .card {
            background: #ffffff;
            color: #DBAF50;
            border-radius: 12px;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.25);
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
        }

        /* Description Styling */
        .description {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            color: #DBAF50;
            background: rgba(219, 175, 80, 0.1);
            padding: 1rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
        }

        .card h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #DBAF50;
        }

        /* Form Styling */
        .form-group {
            margin-top: 20px;
            text-align: left;
        }

        .form-control {
            border-radius: 25px;
            padding: 0.75rem 1.5rem;
            border: 1px solid #DBAF50;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #DBAF50;
            box-shadow: 0px 0px 8px rgba(219, 175, 80, 0.5);
            outline: none;
        }

        /* Input Wrapper for Password Field */
        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            padding-right: 2.5rem;
        }

        .input-wrapper .toggle-password {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            font-size: 1.2rem;
            color: #DBAF50;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .input-wrapper .toggle-password:hover {
            color: #b08a40;
        }

        /* Button Styling */
        .btn-primary {
            background: #DBAF50;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background: #b08a40;
            transform: translateY(-2px);
        }

        /* Link Styling */
        a {
            color: #DBAF50;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #b08a40;
        }

        /* Footer Text */
        .footer-text {
            font-size: 1rem;
            color: #fff;
            margin-top: 2rem;
            opacity: 0.9;
            text-shadow: 0px 0px 10px rgba(255, 255, 255, 0.9), 0px 0px 20px rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body>
   <div class="container">
        <div class="card" data-aos="zoom-in" data-aos-duration="1000">
            <div class="description" data-aos="fade-up" data-aos-duration="1000">
                <p>Masuk untuk menikmati berbagai resep favoritmu di ResepKita!</p>
            </div>

            <h3 class="text-center">Login</h3>
            @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group password-container">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <i data-feather="eye" class="toggle-password"></i>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                <p class="text-center mt-3">
                    Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
                </p>
            </form>
        </div>
        <p class="footer-text">Dengan ResepKita, masak jadi lebih mudah dan menyenangkan!</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
        feather.replace();
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const togglePassword = document.querySelector('.toggle-password');
            const passwordInput = document.querySelector('input[name="password"]');

            togglePassword.addEventListener('click', function () {
                // Toggle input type between 'password' and 'text'
                const isPasswordVisible = passwordInput.type === 'text';
                passwordInput.type = isPasswordVisible ? 'password' : 'text';

                // Change icon using Feather Icons
                this.setAttribute('data-feather', isPasswordVisible ? 'eye' : 'eye-off');
                feather.replace(); // Refresh Feather icons
            });
        });
    </script>
</body>
</html>
