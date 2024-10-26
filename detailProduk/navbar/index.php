<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script  src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <style>
        .error-message {
            color: red;
            font-size: 0.875em;
            margin-left: 10px;
        }

        .popup {
            transition: transform 0.3s ease-in-out;
        }

        .popup.hidden {
            transform: scale(0.8);
            opacity: 0;
        }

        .popup.visible {
            transform: scale(1);
            opacity: 1;
        }
    </style>
    <style>
        dialog[open] {
            animation: appear .15s cubic-bezier(0, 1.8, 1, 1.8);
        }

        dialog::backdrop {
            background: linear-gradient(45deg, rgba(0, 0, 0, 0.5), rgba(54, 54, 54, 0.5));
            backdrop-filter: blur(3px);
        }


        @keyframes appear {
            from {
                opacity: 0;
                transform: translateX(-3rem);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .cart-item {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total {
            padding: 10px;
            font-weight: bold;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <header class="bg-white p-4">
        <nav class="flex justify-between items-center w-full  mx-auto">
            <div class="flex items-center">
                <img class="w-16 items-start cursor-pointer" src="../Image/Technology.png" alt="...">
                <a href="">
                    <b>WebCraft Studio</b>
                </a>
            </div>
            <div
                class="z-40 nav-links duration-500 md:static absolute bg-white md:min-h-fit min-h-[30vh] left-0 top-[-100%] md:w-auto  w-full flex items-center px-5">
                <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                    <li>
                        <a class="hover:text-gray-500" href="../index.php#">Beranda</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="../index.php#3">Produk</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="../index.php#2">Testimoni</a>
                    </li>
                </ul>
            </div>
            <div class="flex items-center gap-6">
                <!-- Card Icon -->
                <section class="flex justify-center items-start">
                    <button onclick="document.getElementById('myModal').showModal()" id="btn" class="text-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l3-8H6.4M7 13l-1.35 5.4a1 1 0 001 1.2h12.72a1 1 0 001-1.2L17 13m-10 0V7h10m-6 11a2 2 0 11-4 0 2 2 0 014 0m6 0a2 2 0 11-4 0 2 2 0 014 0" />
                        </svg>
                    </button>
                    <!-- Element to display coding package count -->
                    <div id="packageCount">
                        <b>0</b>
                    </div>
                </section>

                <!-- Modal -->
                <dialog id="myModal" class="h-auto w-11/12 md:w-1/2 p-5 bg-white rounded-md">
                    <div id="cart" class="flex flex-col w-full h-auto">
                        <!-- Header -->
                        <div class="flex w-full h-auto justify-center items-center">
                            <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                                Checkout Sekarang!
                            </div>
                            <div onclick="document.getElementById('myModal').close();" class="m-2 absolute right-0 top-0 w-1/12 h-auto justify-center cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </div>
                            <!-- Header End -->
                        </div>
                        <!-- Modal Content -->
                        <div class="flex mt-3 mb-3 flex-col w-full py-10 px-2 justify-center items-center bg-white rounded text-center text-black shadow shadow-md">
                            <ul id="cartItems" class="list-disc list-inside space-y-2">
                                <!-- Cart items will be dynamically added here -->
                            </ul>
                            <div id="emptyMessage" class="text-center">Jangan lupa, Isi dulu ya itemsnya</div>
                            <!-- End of Modal Content -->
                            <div id="resultDisplay" style="margin-top: 20px;">
                                <!-- Hasil perhitungan akan ditampilkan di sini -->
                            </div>
                        </div>
                        <div id="addons" class="mt-3">
                            <label>
                                <b>Khusus paket visual & audio</b> <br>

                                <input type="checkbox" id="fileMasterCheckbox" />
                                <label for="fileMasterCheckbox">Add File Master (+Rp50.000)</label>

                            </label>
                            <br>
                            <label>
                                <b>Khusus paket design grafis (Katalog) </b>
                                <br>
                                <input type="checkbox" id="extraPageCheckbox" />
                                <!-- <label for="extraPageCheckbox">Add Extra Pages</label> -->
                                <label for="extraPagesInput">Jumlah Halaman Ekstra: (1 halaman = Rp.15.000)</label>
                                <br>
                                <input class="mt-2 mb-2 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" id="extraPagesInput" name="extraPages" min="0" value="0" disabled />
                                <div id="extraPagesDisplay"></div>
                            </label>
                            <br>
                            <b>Khusus paket design grafis (Sertifikat)</b>

                            <div>
                                <p>
                                    <b>
                                        Jika nama lebih dari 20, harga per 10 nama ialah Rp10.000 (berlaku kelipatan)
                                    </b>
                                </p>
                                <label for="applyExtraNames">
                                    <input type="checkbox" id="applyExtraNames" name="applyExtraNames">

                                </label>
                                <label for="extraNamesInput">
                                    Number of Extra Names:
                                </label>
                                <br>
                                <input class="mt-2 mb-2 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" id="extraNamesInput" name="extraNames" min="0" value="0">
                                <br>
                                <div id="extraNamesDisplay"></div>
                            </div>
                            <!-- UI/UX Design Section -->
                            <label>
                                <b>Khusus paket design grafis (UI/UX design)</b>
                                <br>


                                <input type="radio" id="uiuxBasic" name="uiuxOption" value="80000">
                                <label for="uiuxBasic"> 1 Page Mobile App/Websites (Basic): Rp.80.000</label>
                                <br>

                                <input type="radio" id="uiuxStandard" name="uiuxOption" value="360000">
                                <label for="uiuxStandard"> 1 Page Mobile App/Websites (Standard): Rp.360.000</label>
                                <br>

                                <input type="radio" id="uiuxExclusive" name="uiuxOption" value="576000">
                                <label for="uiuxExclusive">1 Page Mobile App/Websites (Exclusive): Rp.576.000 </label>
                                <br>

                        </div>

                        <!-- Number of Pages for UI/UX -->
                        <div>
                            <label for="">Masukan jumlah halaman:</label>
                            <br>
                            <input class="mt-2 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" id="uiuxPagesInput" placeholder="Jumlah Halaman" min="0" value="0">
                            <br>
                            <div id="uiuxCostDisplay"></div>
                        </div>

                        </label>
                    </div>
                    <!-- info user -->
                    <div class="flex flex-col w-full py-5 px-2">
                        <b>Jangan Lupa memasukan data kalian ya!</b>
                        <form id="checkoutForm">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="name" placeholder="masukan nama" name="name" required>
                                <span id="nameError" class="error-message"></span><br>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="masukan alamat" type="text" id="address" name="address" required>
                                <span id="addressError" class="error-message"></span><br>
                            </div>
                            <div class="form-group">
                                <label for="telephone">Nomer Telepon</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="masukan nomer telpon" type="tel" id="telephone" name="telephone" required>
                                <span id="telephoneError" class="error-message"></span><br>

                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="masukan email" type="email" id="email" name="email" required>
                                <span id="emailError" class="error-message"></span><br>
                            </div>

                            <div class="mt-3 mb-3">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                                <textarea id="message" rows="4" class="block p-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="masukan pesan atau deskripsi: Contoh: saya ingin mempunyai design logo dengan tema cafe kopi..."></textarea>
                                <span id="messageError" class="error-message"></span><br>
                            </div>
                            <div class="flex justify-between">
                           <button id="checkout" class="w-1/2 mb-4 mt-4 py-3 px-10 bg-gray-800 text-white rounded text shadow-xl">Checkout</button>
                            <button id="cancelCheckout" class="w-1/2 mb-4 mt-4 py-3 px-10 bg-red-800 text-white rounded text shadow-xl">
                                Batal Checkout
                            </button>
                           </div>


                        </form>
                    </div>


                    <div class="total text-center text-lg">
                        <p id="totalAmount">Total: Rp0</p>
                    </div>
                    <!-- info user -->
                </dialog>
                <!-- end -->
                <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
            </div>


    </header>
    <script>
        const navLinks = document.querySelector('.nav-links')

        function onToggleMenu(e) {
            e.name = e.name === 'menu' ? 'close' : 'menu'
            navLinks.classList.toggle('top-[9%]')
        }
    </script>
    <script src="cart.js"></script>
</body>

</html>