<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Akademik</a>
            <div class="d-flex">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-light">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-light me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <section class="py-5">
        <div class="container text-center">
            <h1 class="display-4">Selamat Datang di Sistem Akademik</h1>
            <p class="lead">Kelola data mahasiswa, prodi, matakuliah, dan KRS dengan mudah dan cepat.</p>
            <img src="https://img.freepik.com/free-vector/university-campus-concept-illustration_114360-10331.jpg" alt="Sistem Akademik" class="img-fluid rounded shadow-sm" style="max-width: 600px;">
        </div>
    </section>

    <footer class="bg-primary text-white text-center py-3 mt-auto">
        <div class="container">
            <small>&copy; {{ date('Y') }} Sistem Akademik Mahasiswa</small>
        </div>
    </footer>

</body>
</html>
