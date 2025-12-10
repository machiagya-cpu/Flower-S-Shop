<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Flower's Store</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Beri padding top pada body agar konten tidak tertutup navbar */
        body {
            padding-top: 80px;
        }

        /* Section styling */
        section {
            min-height: 100vh;
            padding: 80px 40px;
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>

    <!-- HOME SECTION -->
    <section class="Flower" id="home">
        <div class="Flower-text">
            <h1>Flower's Shop</h1>
            <h2>Natural & Beautiful Flowers</h2>
            <p>Selamat datang di Flower's Store — ruang kecil penuh warna, wangi, dan kehangatan.
                Di sini, setiap bunga punya ceritanya sendiri, tumbuh dari keindahan, dan dikirim dengan penuh cinta.
                Temukan rangkaian yang aesthetic, manis, dan penuh vibes positif — spesial buat kamu atau seseorang yang
                kamu sayang.</p>
            <button onclick="location.href='#collection'">Shop Now</button>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <?php include('About_section.php'); ?>

    <!-- COLLECTION SECTION -->
    <?php include('collection_shop.php'); ?>

    <!-- REVIEW SECTION - TAMBAHKAN BARIS INI 👇 -->
    <?php include('review_section.php'); ?>

    <!-- CONTACT SECTION -->
    <?php include('contactus.php'); ?>

</body>

</html>
