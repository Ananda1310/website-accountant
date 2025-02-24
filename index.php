<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dudul</title>
<!-- AOS CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<!-- feather icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  <style>
    :root {
    --primary: #b6895b;
    --bg:#010101;

}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;  
}

html {
    scroll-behavior: smooth;
}
body {
    font-family: 'Poppins', sans-serif;
    background-color: var(--bg);
    color: #fff;
    
}
body::-webkit-scrollbar {
    display: none; /* Sembunyikan scrollbar di Chrome, Edge, dan Safari */
}

/* navbar */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.2rem 6%;
    background-color: rgb(1, 1, 1, 0.8 );
    border-bottom: 1px solid #513c28;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 999999999999;
}

.navbar .navbar-logo {
    font-size: 2rem;
    font-weight: 700;
    color: #fff;
    font-style: italic;
}


.navbar .navbar-logo span {
    color: var(--primary);
    
}

.navbar .navbar-nav a {
    color: #fff;
    display: inline-block;
    font-size: 1.3rem;
    margin: 0.7rem 4rem;
}

.navbar .navbar-nav a::after {
    content: '';
    display: block;
    padding-bottom: 0.5rem;
    border-bottom: 0.2rem solid #fff;
    transform: scaleX(0);
    transition: 0.3s linear;
}
.navbar .navbar-nav a:hover::after {
    transform: scaleX(0.8);
    
}
.navbar .navbar-nav .btn-login {
    height: 30px;
    width: 80px;
}

.navbar .navbar-extra a {
    color: #fff;
    margin: 0 0.5rem;
}
.navbar .navbar-extra {
    z-index: 9999;
}
.navbar .navbar-extra .btn-login {
    width:95px;
    height:35px;
    border-radius:6px;
    margin-left: 20rem;
    color: white;
    outline: none;
    background:transparent;
    border:1px solid;
    border-color: #fff;
}
.navbar .navbar-extra .btn-login:hover {
    background-color: #fff;
    color:black;
    transition: 0.5s ease;
}
.navbar .navbar-extra a:hover {
    color: var(--primary);
}

#hamburger-menu {
    display: none;
}
/* hero section */
@keyframes cihuy {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateY(0%);
    }
}
.hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    background-image: url("./background/Situs\ Web\ Hitam\ dan\ Putih\ Fotografis\ Layanan\ Akuntansi.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    position: relative;
    
}
.hero::after {
    content: '';
    display: block;
    position: absolute;
    width: 100%;
    height: 30%;
    bottom: 0;
    background: linear-gradient(0deg, rgba(1,1,3,1)8%, rgba(255,255,255, 0) 50%);
}

.hero .content {
    padding: 1.4rem 7%;
    max-width: 60rem;
    
}

.hero .content h1 {
    font-size: 5em;
    color: #fff;
    text-shadow: 1px 1px 3px rgba(1 , 1,3, 0.5);
    line-height: 1.2;
    animation: cihuy 1.5s ease-in-out;
}

.hero .content h1 span {
    color: var(--primary)
}
 .hero .content p {
    font-size: 1.6rem;
    margin-top: 1rem;
    line-height: 1.4;
    font-weight: 100;
        text-shadow: 1px 1px 3px rgba(1 , 1,3, 0.5);
        mix-blend-mode: difference;
        animation: cihuy 1.8s ease-in-out;
 }  
 @keyframes anu {
   0% {
    opacity: 0;
    transform: translateY(100%);
   }
   100% {
    opacity: 1;
    transform: translateY(0);
   }
 }
 .hero .content .cta {
    margin-top: 4rem;
    display: inline-block;
    padding: 1rem 3rem;
    font-size: 1.4rem;
    color: black;
    background: #fff;
    border-radius: 0.5rem;
    box-shadow: 1px 1px 3px rgba(1,1,3,0.5);
    animation: anu 3s ease-out forwards;
 }

 /* about */
 .about, .menu, .contact {
    padding:10rem 1.4% ;

 }
 .about h2, .menu h2, .contact h2 {
    text-align: center;
    font-size: 4rem;
    margin-bottom: 8rem;
     animation: anu 4s ease-out forwards;
 }
 .about h2 span, .contact h2 span{
    color: var(--primary);
 }
 .menu h2 span {
    color:grey;
 }

 .about .row {
    display: flex;

 }
 .about .row .about-img {
    flex:  1 1 45rem;
 }
 .about .row .about-img img {
    width:  80%;
 }
 .about .row .content {
    flex: 1 1 35rem;
    padding: 0 1rem;
 }

 .about .row .content h3 {
    font-size: 3em;
    margin-bottom: 1rem;
 }
.about .row .content p {
    margin-bottom: 5rem;
    font-size: 1.5rem;
    font-weight: 100;
    line-height: 2;
}

/* menu dek */
.menu h1 .contact h2{
    margin-bottom: 1rem;    
     animation: anu 30s ease-out forwards;
}
.menu .row .content {
    flex: 1 1 40rem;
    padding: 2rem;
    text-align: left;
}

.menu .row .content h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.menu .row .content p {
    font-size: 1.4rem;
    line-height: 1.6;
    text-align: center;
}



/* footre */
footer {
    background-color: var(--primary);
    text-align: center;
    padding: 0rem 0rem 1rem;
    margin-top: 3rem;
    
}
footer .socials {
    padding:1rem 0;
}

footer .socials a {
    color: #fff;
    margin:1rem;
}
footer .socials a:hover ,
footer .links a:hover{
    color: var(--bg);
}

footer .links {
    margin-bottom: 1.4rem;
}


footer .links a {
    color: #fff;
    padding: 0.7rem 1rem;
}
footer .credit {
    font-size: 1rem;

}
footer .credit a {
    color: var(--bg);
    font-weight: 400;
}

/* contact */
.contact .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 2rem;
}


.contact .row .layanan-img {
    flex: 1 1 40rem;
    display: flex;
    justify-content: center;
}

.contact .row .layanan-img img {
    max-width: 100%;
    height: auto;
}

.contact .row .content {
    flex: 1 1 40rem;
    padding: 2rem;
    text-align: left;
}

.contact .row .content h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.contact .row .content p {
    font-size: 1.6rem;
    line-height: 2.2;
    text-align: left;
}


/* media queries */


/* laptop */
@media (max-width: 1366px) {
    html {
        font-size: 75%;
    }
    
}
@media (max-width: 1366px) {
.menu .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 2rem;
}


.menu .row .layanan-img {
    flex: 1 1 40rem;
    display: flex;
    justify-content: center;
}

.menu .row .layanan-img img {
    max-width: 100%;
    height: auto;
}

.menu .row .content {
    flex: 1 1 40rem;
    padding: 2rem;
    text-align: left;
}

.menu .row .content h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.menu .row .content p {
    font-size: 1.6rem;
    line-height: 2.2;
    text-align: left;
}
}
/* tablet*/
@media (max-width: 758px) {
    html {
        font-size: 62.5%;
    }
.navbar .navbar-extra .btn-login {
    width:95px;
    height:35px;
    border-radius:6px;
    margin-left: 20rem;
    color: white;
    outline: none;
    background:transparent;
    border:1px solid;
    border-color: #fff;
    display: none;
}
.navbar .navbar-extra .btn-login:hover {
    background-color: #fff;
    color:black;
    transition: 0.5s ease;
    display: none;
}
    .menu .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 2rem;
}


.menu .row .layanan-img {
    flex: 1 1 40rem;
    display: flex;
    justify-content: center;
}

.menu .row .layanan-img img {
    max-width: 100%;
    height: auto;
}

.menu .row .content {
    flex: 1 1 40rem;
    padding: 2rem;
    text-align: center;
}

.menu .row .content h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.menu .row .content p {
    font-size: 1.4rem;
    line-height: 1.6;
    text-align: center;
}

    #hamburger-menu {
        display: inline-block;
    }

    .navbar .navbar-nav{
        position: absolute;
        top: 100%;
        right: -100%;
        background: #fff;
        width: 30rem;
        height: 100vh;
        transition: 0.3s;
    }
    .navbar .navbar-nav.active {
        right: 0;
    }

    .navbar .navbar-nav a {
        color: var(--bg);
        display: block;
        margin: 1.5rem;
        padding: 0.5rem;
        font-size: 2rem;
    }

    .navbar .navbar-nav a::after {
        transform-origin: 0 0;
    }
      .navbar .navbar-nav a:hover::after {
        transform: scaleX(0.2);
    }
}
.about .row {
    flex-wrap: wrap;

}
.about .row .about-img img{
    height: 26rem;
    object-fit: cover;
    object-position: center;
}

.about .row .content {
    padding: 0;
}
.about .row .content h3 {
    margin-top: 1rem;
    font-size: 2rem;
}
.about .row .content h3 {
    font-size: 1.6rem;
}
.about .row .about-img {
    flex: 1 1 40rem;
    display: flex;
    justify-content: center;
}

.about .row .about-img img {
    max-width: 100%;
    height: auto;
}

.about .row .content {
    flex: 1 1 40rem;
    padding: 2rem;
    text-align: center;
}

.about .row .content h3 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.about .row .content p {
    font-size: 1.4rem;
    line-height: 1.6;
    text-align: center;
}
/*  */
.contact .row {
    flex-wrap: wrap;
}
.contact .row .map {
    height: 30rem;
}
.contact .row form {
    padding-top: 0;
}
/* hp */
@media (max-width: 450px) {
    html {
        font-size: 55%;
    }
    .menu .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 2rem;
}

.menu .row .layanan-img {
    flex: 1 1 40rem;
    display: flex;
    justify-content: center;
}

.menu .row .layanan-img img {
    max-width: 100%;
    height: auto;
}

.menu .row .content {
    flex: 1 1 40rem;
    padding: 2rem;
    text-align: center;
}

.menu .row .content h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.menu .row .content p {
    font-size: 1.4rem;
    line-height: 1.6;
    text-align: center;
}

}
  </style>

</head>
<body>
<!-- navbar start -->
<nav class="navbar">
  <a href="#" class="navbar-logo">AccuSoft</a>

  <div class="navbar-nav">
    <a href="#home">Menu</a>
    <a href="#about">Tentang</a>
    <a href="#menu">Layanan</a>
    <a href="#contact">Kontak</a>
  </div>
 <div class="navbar-extra">
        <form action="login.php">
            <button class="btn-login" type="submit">logout</button>
        </form>
      <!-- <a href="#"id="search"><i><i data-feather="search"></i></i></a>
      <a href="#"id="shopping-cart"><i><i data-feather="shopping-cart"></i></i></a> -->
      <a href="#"id="hamburger-menu"><i><i data-feather="menu"></i></i></a>
  </div>
</nav>


<!-- navbar end -->

<!-- hero sction start -->
<section class="hero" id="home">
    <main class="content">
        <h1>Jasa Akuntansi Perawang</h1>
        <p>Solusi akuntansi terpercaya untuk bisnis Anda. Kami membantu mengelola keuangan dengan mudah dan efisien.</p>
        <a href="pre-order.php" class="cta">Pre-Order Sekarang</a>
    </main>
</section>

<!-- hero sction end -->

 <!-- about sections start -->
<section id="about" class="about">
    <h2>Tentang Kami</h2>

<div class="row">
    <div class="about-img">
        <img src="./background/cihuy1.png">
    </div>
    <div class="content">
        <h3>Profil Perusahaan</h3>
        <p>perusahaan jasa akuntansi terpercaya di Perawang yang berkomitmen membantu bisnis dan individu dalam mengelola keuangan dengan transparan, akurat, dan efisien. Kami menyediakan layanan pembukuan, laporan keuangan, pajak, serta konsultasi keuangan yang disesuaikan dengan kebutuhan klien.</p>
    </div>
</div>
</section>
<!-- about sections end -->


<!-- menu section start -->
<section id="menu" class="menu">
    <h2>Layanan Kami</h2>
    <div class="row">
        <div class="layanan-img">
            <img src="./background/cihuy3.png" style="width: 80%;">
        </div>
    <div class="content">
        <h1>01 Persiapan Pajak</h1>
        <P>Kami menyiapkan segala hal yang Anda butuhkan untuk retur pajak Anda</P>
         <h1>02 Paket Startup</h1>
        <P>Kami membangun model keuangan yang dapat Anda tawarkan kepada investor</P>
         <h1>03 Manajemen Harta</h1>
        <P>Kami memberikan layanan saran investasi yang bijaksana</P>
    </div>
</div>
</section>


</section>

<!-- menu section end -->
 <!-- kontak section start -->
<section id="contact" class="contact">
   <h2><span>Kontak</span> Kami</h2>
   <div class="row">
        <div class="layanan-img">
            <img src="./background/foto.jpg" style="width: 80%;">
        </div>
    <div class="content">
        <h1>Alamat Surat</h1>
        <P>Jl. Raya Perawang No.D3 , Perawang, Riau 28772</P>
         <h1>Nomor Telepon</h1>
        <P>+62 888-2221-106</P>
         <h1>Email Perusahaan</h1>
        <P>accusoftcompany@gmail.com</P>
    </div>
</div>
   
</section>
 <!-- kontak section end -->

 <!-- footer -->
  <footer>
    <div class="socials">
      <a href="https://instagram.com/anandsyh13"><i data-feather="instagram"></i></a>
      <a href="https://wa.me/628882221106" target="_blank"><i data-feather="phone"></i></a>
       <a href="https://linkedin.com/in/anandasyahfitra13" target="blank"><i data-feather="linkedin"></i></a>
    </div>

    <div class="links">
      <a href="#home">Home</a>
      <a href="#about">Tentang Kami</a>
      <a href="#menu">Menu</a>
      <a href="#contact">Kontak</a>
    </div>

    <div class="credit">
      <p>Created by <a href="https://instagram.com/anandsyh13"target="blank";>Ananda Syahfitra</a>. | &copy; 2025</p>
    </div>
  </footer>
    <!-- feather icons  -->
      <script>
      feather.replace();
    </script> 

    <!-- js -->
     <script src="js/script.js">

     </script>
     <!-- AOS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init(); // Inisialisasi AOS
</script>

</body>
</html>
