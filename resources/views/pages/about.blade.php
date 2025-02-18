<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABOUT ME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling untuk tampilan identitas */
        .profile-card {
            background-color: #ffe4e1;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease-in-out;
            max-width: 400px;
            margin: 20px auto;
        }

        .profile-card:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #ff66b3;
            box-shadow: 0 0 15px rgba(255, 102, 179, 0.5);
            margin-bottom: 20px;
        }

        .profile-name {
            font-size: 1.8em;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            color: #ff66b3;
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .profile-role {
            color: #ff3385;
            font-size: 1.2em;
            font-weight: 600;
        }

        .profile-bio {
            font-style: italic;
            color: #ff4d94;
            margin-top: 10px;
        }

        .profile-btn {
            background-color: #ff66b3;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 30px;
            margin-top: 15px;
            font-weight: bold;
            font-size: 1.1em;
            transition: background-color 0.3s ease, transform 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .profile-btn:hover {
            background-color: #ff3385;
            transform: scale(1.1);
        }

        /* Animated sparkle effect */
        .sparkle {
            font-size: 1.5em;
            color: #ffccff;
            animation: sparkle 1.5s infinite;
        }

        @keyframes sparkle {
            0% { transform: rotate(0deg); }
            50% { transform: rotate(20deg); }
            100% { transform: rotate(0deg); }
        }
    </style>
</head>
<body>
    <div class="container my-5 d-flex justify-content-center">
        <div class="profile-card">
            <!-- Foto Profil -->
            <img src="images/hanny2.jpeg" alt=" " class="profile-img">
            <!-- Nama -->
            <div class="profile-name">hanny arsy s</div>
            <!-- Role -->
            <div class="profile-role">Web Developer & Designer</div>
            <!-- Bio -->
            <p class="profile-bio">membuat website sambil tersenyum :)</p>
            <!-- Tombol Instagram -->
            <a href="https://www.instagram.com/hannyyarsy?igsh=N3pkbzViYWp1YmFs" target="_blank" class="profile-btn">Follow Me on Instagram</a>
            <!-- Tombol GitHub -->
            <a href="https://github.com/hannyyyyy" target="_blank" class="profile-btn">GitHub</a>
            <!-- Sparkle -->
            <div class="sparkle">✨</div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
