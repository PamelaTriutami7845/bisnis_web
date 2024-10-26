<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>WebCraft Studio</title>
</head>

<body>
    <div class="">
        <?php include './navbar/index.php'; ?>
    </div>

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

    <!-- component -->
    <div class="relative flex flex-col items-center max-w-screen-xl px-4 mx-auto md:flex-row sm:px-6 p-8" id="1">
        <div class="flex items-center py-5 md:w-1/2 md:pb-20 md:pt-10 md:pr-10">
            <div class="">
                <h2
                    class="text-4xl font-extrabold leading-10 tracking-tight text-gray-800 sm:text-5xl sm:leading-none md:text-6xl">
                    SELAMAT DATANG
                    <span class="font-bold text-3xl text-blue-500">DI WEBCRAFT STUDIO</span>

                </h2>
                <p class=" mx-auto mt-3 text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Mitra terpercaya Anda dalam mewujudkan visi digital. Kami adalah perusahaan yang berspesialisasi dalam desain kreatif dan pengembangan aplikasi website serta mobile. Dengan tim profesional yang berpengalaman, kami menggabungkan estetika visual dengan teknologi mutakhir untuk menciptakan solusi yang menarik, fungsional, dan user-friendly. Dari konsep hingga peluncuran, kami bekerja sama dengan Anda untuk memastikan setiap proyek mencerminkan identitas dan tujuan bisnis Anda. Mari bersama menjelajahi potensi digital dan menghadirkan pengalaman luar biasa bagi pengguna Anda.
                </p>
                <div class="mt-5 sm:flex md:mt-8">
                    <div class="rounded-md shadow"><a href="#3"
                            class="flex items-center justify-center w-full px-8 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue md:py-4 md:text-lg md:px-10">
                            Getting started
                        </a></div>
                    <!-- <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                    <a href="#"
                        class="flex items-center justify-center w-full px-8 py-3 text-base font-medium leading-6 text-blue-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-blue-600 focus:outline-none focus:shadow-outline-blue md:py-4 md:text-lg md:px-10">
                        Contribute
                    </a>
                </div> -->
                </div>
            </div>
        </div>
        <div class="flex items-center py-5 md:w-1/2 md:pb-20 md:pt-10 md:pl-10">
            <div class="relative w-full p-3 rounded  md:p-8">
                <div class="rounded-lg bg-white text-black ">
                    <img src="./Image/pic.jpeg" alt="" width="200%">
                </div>
            </div>
        </div>
    </div>
    <!-- testimoni -->
    <div class="" id="2">
        <?php include './testimoni/index.php'; ?>
    </div>
    <!-- produk -->
    <div class="" id="3">
        <?php include './produk/index.php'; ?>
    </div>

    <?php include './footer/index.php'; ?>
    </div>
</body>

</html>