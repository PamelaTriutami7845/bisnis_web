<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device -width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <script src="./link.js"></script>
    <title>Design Grafis</title>
</head>
<style>
        .slider {
            overflow: hidden;
            position: relative;
            width: 100%;
            max-width: 400px;
            margin: auto;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            box-sizing: border-box;
        }

        .nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 1rem;
            cursor: pointer;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }
</style>
<body id="content"> 
<?php include './navbar/index.php'; ?>

 <!-- Social Media Icons Container -->
 <div class="fixed bottom-4 left-4 z-50 flex flex-col items-center space-y-4">
        <!-- WhatsApp Icon -->
        <a href="https://wa.me/6282131698871" target="_blank" class="bg-green-500 text-white p-3 rounded-full shadow-lg hover:bg-green-400 transition-colors">
            <i class="fab fa-whatsapp text-2xl"></i>
        </a>
        <!-- Instagram Icon -->
        <a href="https://www.instagram.com/web.craftstudio?igsh=MXB6OTd0NzByNjR3cQ==" target="_blank" class="bg-pink-500 text-white p-3 rounded-full shadow-lg hover:bg-pink-400 transition-colors">
            <i class="fab fa-instagram text-2xl"></i>
        </a>
        <!-- TikTok Icon -->
        <a href="https://www.tiktok.com/@webcraft.studio?_t=8om6zg4A5nm&_r=1" target="_blank" class="bg-black text-white p-3 rounded-full shadow-lg hover:bg-gray-800 transition-colors">
            <i class="fab fa-tiktok text-2xl"></i>
        </a>
        <!-- Share Button -->
        <button onclick="shareContent()" class="bg-blue-500 text-white p-3 rounded-full shadow-lg hover:bg-blue-400 transition-colors">
            <i class="fas fa-share-alt text-2xl"></i>
        </button>
    </div>

<div class=" py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[400px] rounded-lg bg-white  mb-4">
                <div class="slider">
            <div class="slides">
                            <div class="slide">
                                <img src="./Image/4.png" alt="Image 1">
                            </div>
                            <div class="slide">
                                <img src="./Image/8.png" alt="Image 2">
                            </div>
                            <div class="slide">
                                <img src="./Image/9.png" alt="Image 3">
                            </div>
            </div>
            <button class="nav-button prev">&lt;</button>
            <button class="nav-button next">&gt;</button>
        </div>
                </div>
                <div class="flex justify-center mx-2 mb-4">
                    <div class="w-10/12 px-2">
                        <a href="#1">
                        <button class="w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-300 dark:hover:bg-gray-600">
                            Paket Design
                        </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold mb-2">Design Grafis</h2>
                <span class="font-bold text-gray-700 ">Product Description:</span>
                <p class="text-sm mb-4">
                Kami menawarkan layanan desain grafis yang kreatif dan profesional untuk membantu Anda memperkuat identitas visual bisnis Anda. <br>
                Tema Design: <br>
                1.Logo <br>
                2.UI & UX Mobile dan Websites <br>
                3.Banner Online <br>
                4.Edit Gambar dengan Photoshop <br>
                5.Digital Printing (Kartu nama,Brosur,Kartu Undangan dll) <br>
                6.Label dan Kemasan <br>
                kami siap membantu Anda menciptakan desain yang memukau dan memikat.
                </p>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold ">Harga:</span>
                        <span class="">
                            Mulai dari Rp. 75.000
                        </span>
                    </div>
                    <div>
                        <span class="font-bold">Deadline:</span>
                        <span class="">
                            Tergantung dari kesulitan projek
                        </span>
                    </div>
                </div>
               <div class="">
               <span class="font-bold text-gray-700 ">
               Mengapa harus memilih kami?
               </span>
               <p class="text-sm mb-4">
               ✔ Harga Terjangkau <br>
                ✔ Respon Cepat & Ramah <br>
                ✔ Pengerjaan Cepat <br>
                ✔ Desain 100% Original <br>
                ✔ Kualitas Resolusi Tinggi <br>
                ✔ Format File Bervariatif <br>
                ✔ Bebas Konsultasi <br>
               </p>
               </div>
               <span class="font-bold text-gray-700 ">
              Jangan ragu untuk menghubungi kami kapan saja!
               </span>
        </div>
    </div>
    <!-- paket design -->
    <?php include './Paketdesign.php'; ?>
   <!-- end pket design -->
</div>
</div>
<?php include '../footer/index.php'; ?>
</body>
</html>

<script>
    const slides = document.querySelector('.slides');
    const slide = document.querySelectorAll('.slide');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    let index = 0;

    function showSlide(n) {
        index += n;
        if (index < 0) {
            index = slide.length - 1;
        }
        if (index >= slide.length) {
            index = 0;
        }
        slides.style.transform = `translateX(-${index * 100}%)`;
    }

    prev.addEventListener('click', () => showSlide(-1));
    next.addEventListener('click', () => showSlide(1));
</script>