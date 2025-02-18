<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABOUT ME</title>
    <!-- Menghubungkan ke file CSS Bootstrap untuk styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling untuk tampilan identitas */
        .profile-card {
            background-color: #ffe4e1; /* Latar belakang pink muda untuk kartu profil */
            border-radius: 20px; /* Sudut kartu profil menjadi membulat */
            padding: 30px; /* Padding di dalam kartu */
            text-align: center; /* Menyusun teks di tengah */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15); /* Bayangan lembut di sekitar kartu */
            transition: transform 0.3s ease-in-out; /* Efek transisi halus saat hover */
            max-width: 400px; /* Membatasi lebar kartu profil */
            margin: 20px auto; /* Memusatkan kartu di halaman */
        }

        .profile-card:hover {
            transform: scale(1.05); /* Membesarkan kartu sedikit saat hover */
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2); /* Bayangan lebih kuat saat hover */
        }

        /* Styling untuk gambar profil */
        .profile-img {
            width: 120px;
            height: 120px;
            object-fit: cover; /* Memastikan gambar memenuhi lingkaran tanpa distorsi */
            border-radius: 50%; /* Membuat gambar berbentuk lingkaran */
            border: 5px solid #ff66b3; /* Border berwarna pink di sekitar gambar */
            box-shadow: 0 0 15px rgba(255, 102, 179, 0.5); /* Pencahayaan lembut pink di sekitar gambar */
            margin-bottom: 20px; /* Spasi di bawah gambar */
        }

        /* Styling untuk nama profil */
        .profile-name {
            font-size: 1.8em; /* Ukuran teks lebih besar untuk nama */
            font-family: 'Comic Sans MS', cursive, sans-serif; /* Font yang santai dan kasual */
            color: #ff66b3; /* Warna pink untuk nama */
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold; /* Membuat nama menjadi tebal */
        }

        /* Styling untuk peran di profil */
        .profile-role {
            color: #ff3385; /* Warna pink sedikit lebih gelap untuk teks peran */
            font-size: 1.2em;
            font-weight: 600; /* Teks semi-tebal untuk peran */
        }

        /* Styling untuk bio di profil */
        .profile-bio {
            font-style: italic; /* Menjadikan teks bio miring */
            color: #ff4d94; /* Warna pink berbeda untuk bio */
            margin-top: 10px;
        }

        /* Styling untuk tombol */
        .profile-btn {
            background-color: #ff66b3; /* Warna latar belakang tombol */
            color: white; /* Warna teks tombol putih */
            border: none;
            border-radius: 30px; /* Sudut tombol membulat */
            padding: 12px 30px; /* Padding tombol */
            margin-top: 15px; /* Spasi di atas tombol */
            font-weight: bold; /* Teks tombol tebal */
            font-size: 1.1em; /* Ukuran font sedikit lebih besar */
            transition: background-color 0.3s ease, transform 0.3s ease; /* Efek transisi halus saat hover */
            text-decoration: none; /* Menghilangkan garis bawah dari link */
            display: inline-block; /* Membuat tombol tampil sebagai elemen inline-block */
        }

        .profile-btn:hover {
            background-color: #ff3385; /* Warna tombol menjadi lebih gelap saat hover */
            transform: scale(1.1); /* Efek pembesaran sedikit saat hover */
        }

        /* Styling untuk tombol kembali */
        .btn-back {
            background-color: #ff66b3; /* Warna latar belakang tombol kembali sama dengan tombol profil */
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 30px;
            margin-top: 15px;
            font-weight: bold;
            font-size: 1.1em;
            transition: background-color 0.3s ease, transform 0.3s ease; /* Efek hover untuk tombol kembali */
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover {
            background-color: #ff3385; /* Warna tombol kembali lebih gelap saat hover */
            transform: scale(1.1); /* Efek pembesaran saat hover */
        }

        /* Efek animasi sparkle */
        .sparkle {
            font-size: 1.5em; /* Ukuran emoji sparkle lebih besar */
            color: #ffccff; /* Warna sparkle dengan pink lembut */
            animation: sparkle 1.5s infinite; /* Animasi berulang untuk efek sparkle */
        }

        @keyframes sparkle {
            0% { transform: rotate(0deg); } /* Rotasi sparkle dari 0 derajat */
            50% { transform: rotate(20deg); } /* Rotasi sedikit saat mencapai 50% */
            100% { transform: rotate(0deg); } /* Rotasi kembali ke posisi semula */
        }
    </style>
</head>
<body>
    <div class="container my-5 d-flex justify-content-center">
        <div class="profile-card">
            <!-- Foto Profil -->
            <img src="images/hanny2.jpeg" alt=" " class="profile-img"> <!-- Gambar profil -->
            <!-- Nama -->
            <div class="profile-name">hanny arsy s</div> <!-- Nama profil -->
            <!-- Peran -->
            <div class="profile-role">Web Developer & Designer</div> <!-- Peran di profil -->
            <!-- Bio -->
            <p class="profile-bio">membuat website sambil tersenyum :)</p> <!-- Bio profil -->
            <!-- Tombol Instagram -->
            <a href="https://www.instagram.com/hannyyarsy?igsh=N3pkbzViYWp1YmFs" target="_blank" class="profile-btn">Follow Me on Instagram</a> <!-- Tombol untuk Instagram -->
            <!-- Tombol GitHub -->
            <a href="https://github.com/hannyyyyy" target="_blank" class="profile-btn">GitHub</a> <!-- Tombol untuk GitHub -->
            <!-- Tombol Kembali -->
            <a href="javascript:history.back()" class="btn-back">Kembali</a> <!-- Tombol untuk kembali ke halaman sebelumnya -->
            <!-- Efek Sparkle -->
            <div class="sparkle">✨</div> <!-- Efek sparkle animasi -->
        </div>
    </div>

    <!-- Bootstrap JS (Opsional untuk elemen interaktif seperti modal, tooltip) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
