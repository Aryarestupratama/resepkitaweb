<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wdth,wght@62.5..100,100..900&display=swap" rel="stylesheet">

    <style>
       /* General Body and Container Styling */
body {
    background: #DBAF50;
    color: #333;
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
    color: #333;
    border-radius: 20px;
    box-shadow: 0px 12px 24px rgba(0, 0, 0, 0.15), 0px 8px 16px rgba(0, 0, 0, 0.1);
    padding: 2.5rem;
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-top: 5px solid #DBAF50;
    margin-top: 200px;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 16px 32px rgba(0, 0, 0, 0.2);
}

/* Title and Description */
.card h3 {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: #DBAF50;
}

.description {
    font-size: 1rem;
    margin-bottom: 1.5rem;
    background: rgba(219, 175, 80, 0.1);
    padding: 1rem 1.5rem;
    border-radius: 10px;
    font-weight: 500;
    color: #555;
}

/* Form Styling */
.form-group {
    margin-top: 20px;
    text-align: left;
}

.form-control {
    border-radius: 25px;
    padding: 0.75rem 1.5rem;
    border: 1px solid #ddd;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #DBAF50;
    box-shadow: 0px 0px 10px rgba(219, 175, 80, 0.5);
    outline: none;
}

/* Password Field Wrapper */
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
    transition: all 0.3s ease;
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
    font-style: italic;
    opacity: 0.9;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="card" data-aos="fade-up" data-aos-duration="1000">
            <!-- Description Inside the Form Border -->
            <div class="description" data-aos="fade-up" data-aos-duration="1000">
                <p>Temukan resep favoritmu dan inspirasi kuliner setiap hari di ResepKita!</p>
            </div>
            <h3 class="text-center">Register</h3>
            @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif

            <form action="{{ route('register') }}" method="POST" class="register-form">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <i data-feather="eye" class="toggle-password"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-wrapper">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                        <i data-feather="eye" class="toggle-password"></i>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
                <p class="text-center mt-3">
                    Sudah punya akun? Silahkan <a href="{{ route('login') }}">Login</a>
                </p>
            </form>
        </div>
        <!-- Motivational Footer Text -->
        <p class="footer-text">Dengan ResepKita, masak jadi lebih mudah dan menyenangkan!</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
        feather.replace();

        // Toggle password visibility script
        document.addEventListener('DOMContentLoaded', () => {
            const togglePassword = document.querySelectorAll('.toggle-password');
            togglePassword.forEach(item => {
                item.addEventListener('click', function () {
                    const passwordInput = this.previousElementSibling;
                    const isPasswordVisible = passwordInput.type === 'text';
                    passwordInput.type = isPasswordVisible ? 'password' : 'text';
                    this.setAttribute('data-feather', isPasswordVisible ? 'eye' : 'eye-off');
                    feather.replace();
                });
            });
        });
    </script>
</body>
</html>
