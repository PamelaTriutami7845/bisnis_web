<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>web & mobile</title>
</head>
<style>
        .slider {
            overflow: hidden;
            position: relative;
            width: 100%;
            max-width: 600px;
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
<body>
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

<div class="bg-gray-100 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="rounded-lg bg-transparent mb-4">
                <div class="slider">
            <div class="slides">
                            <div class="slide">
                                <img src="./Image/desk1.png" alt="Image 1">
                            </div>
                            <div class="slide">
                                <img src="./Image/desk2.png" alt="Image 2">
                            </div>
                            <div class="slide">
                                <img src="./Image/ipad.png" alt="Image 3">
                            </div>
                            <div class="slide">
                                <img src="./Image/mobile.png" alt="Image 3">
                            </div>
            </div>
            <button class="nav-button prev">&lt;</button>
            <button class="nav-button next">&gt;</button>
        </div>
                </div>
                <div class="flex justify-center mx-2 mb-4">
                    <div class="w-10/12 px-2">
                  <a href="#1">
                  <button class="w-full bg-gray-900  text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">Paket Coding </button>
                  </a>
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-black mb-2">Pengembangan Aplikasi websites & Mobile</h2>
                <span class="font-bold text-black">Product Description:</span>
                <p class="text-black text-sm mb-4">
                Kami menawarkan layanan pengembangan aplikasi mobile dan website yang dirancang untuk memberikan pengalaman pengguna yang luar biasa dan memenuhi kebutuhan bisnis Anda. Dengan teknologi terkini dan pendekatan yang inovatif, kami siap membantu Anda menciptakan solusi digital yang efektif dan efisien.
                Jenis Aplikasi:
                <br>
                1.Aplikasi Ojek Online <br>
                2.Food Delivery <br>
                3.Aplikasi Kesehatan <br>
                4.landing Page <br>
                5. dll <br>

                Manfaat: <br>
                ✔ Gratis Domain & Hosting <br>
                ✔ Gratis Maintenance selamanya <br>
                ✔ Gratis email domain <br>
                ✔ Design Custom responsive <br>
                ✔ Layanan After Sales <br>
</p>
            </div>
        </div>
    </div>
    <?php include './Paketcoding.php'; ?>
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
