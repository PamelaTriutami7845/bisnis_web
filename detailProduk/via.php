<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title> Visual & Audio</title>
</head>
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

<div class=" py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[460px] flex justify-center text-center rounded-lg bg-white mb-4">
                    <video width="460px"  controls>
                    <source src="./Image/Animasi.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="flex justify-center mx-2 mb-4">
                    <div class="w-10/12 px-2">
                        <a href="#1">
                        <button class="w-full bg-gray-900  text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">Paket Visual & Audio</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold mb-2">Visual & Audio</h2>
                <span class="font-bold text-black">Product Description:</span>
                <p class="text-black text-sm mb-4">
                Kami menyediakan layanan audio dan visual berkualitas tinggi untuk berbagai kebutuhan bisnis dan pribadi seperti editing video,tim kami siap membantu Anda menciptakan konten yang menarik dan profesional.
                <br>
                Jenis Jenis: <br>
                        - Video ads <br>
                        - youtube Vlog <br>
                        - teasure & after movie event <br>
                        - Reels & tiktok video <br>
                        - Video Explainer <br>
                        - intro video <br>
                        - motion video <br>
                        - ETC,By Request <br>
                        Benefit yang anda dapat : <br>
                        1. Hasil video .Mp4 FHD 1080p <br>
                        2. Hasil editing detail <br>
                        3. Free revisi minor sebanyak 2x <br>
                </p>
            </div>
        </div>
    </div>
    <?php include './Paketvisual.php'; ?>
</div>
<?php include '../footer/index.php'; ?>
</body>
</html>