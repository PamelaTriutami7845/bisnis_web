document.addEventListener("DOMContentLoaded", () => {

  // Function to retrieve the cart from localStorage
  function getCart() {
    return JSON.parse(localStorage.getItem("cart")) || [];
  }

  // Function to save the cart to localStorage
  function saveCart(cart) {
    localStorage.setItem("cart", JSON.stringify(cart));
  }
  
  function displayCart() {
    let cart = getCart();
    
    let cartItemsDiv = document.getElementById("cartItems");
    let emptyMessage = document.getElementById("emptyMessage");
    let checkoutButton = document.getElementById("checkout");
    let extraNamesInput = document.getElementById("extraNamesInput");
    let extraPagesInput = document.getElementById("extraPagesInput");
    let applyExtraNamesCheckbox = document.getElementById("applyExtraNames");
    let extraPageCheckbox = document.getElementById("extraPageCheckbox");
    let fileMasterCheckbox = document.getElementById("fileMasterCheckbox");
    let uiuxRadios = document.getElementsByName("uiuxOption");
    let uiuxPagesInput = document.getElementById("uiuxPagesInput");

    // Retrieve and parse input values
    let extraNamesCount = parseInt(extraNamesInput.value, 10);
    let extraPagesCount = parseInt(extraPagesInput.value, 10);
    let uiuxPagesCount = parseInt(uiuxPagesInput.value, 10);

    // Default to 0 if the values are not numbers
    if (isNaN(extraNamesCount)) extraNamesCount = 0;
    if (isNaN(extraPagesCount)) extraPagesCount = 0;
    if (isNaN(uiuxPagesCount)) uiuxPagesCount = 0;

    // Clear the current cart display
    cartItemsDiv.innerHTML = "";

    // Check if the cart is empty
    if (cart.length === 0) {
      emptyMessage.style.display = "block";
      checkoutButton.style.display = "none";
      updateCartIcon(0);
      updatePackageCount(0);
      return;
    } else {
      emptyMessage.style.display = "none";
      checkoutButton.style.display = "block";
    }

    // Calculate the total price and quantity
    let total = 0;
    let totalQuantity = 0;
    let packageCount = 0;

    for (let item of cart) {
      let itemLi = document.createElement("li");
      itemLi.classList.add(
        "cart-item",
        "py-2",
        "px-4",
        "border-b",
        "border-gray-200",
        "flex",
        "justify-between",
        "items-center"
      );
      itemLi.innerHTML = `
                <div>
                    <p class="text-bold text-black font-sans font-medium">${
                      item.name
                    }</p>
                    <p class="text-black font-sans">${item.price.toLocaleString(
                      "id-ID"
                    )} x ${item.quantity}</p>
                </div>
            `;

      let removeButton = document.createElement("button");
      removeButton.classList.add(
        "mb-4",
        "mt-4",
        "py-3",
        "px-6",
        "bg-red-800",
        "text-red",
        "rounded",
        "text",
        "shadow-xl"
      );
      removeButton.textContent = "Remove";
      removeButton.onclick = () => removeFromCart(item.id);

      removeButton.style.border = "none";
      removeButton.style.cursor = "pointer";
      removeButton.style.fontWeight = "bold";

      itemLi.appendChild(removeButton);
      cartItemsDiv.appendChild(itemLi);

      // Calculate total price and quantity
      total += item.price * item.quantity;
      totalQuantity += item.quantity;
      packageCount += item.quantity;
    }
    let result = "<h3>Rincian Biaya:</h3>";
    // Add UI/UX option cost based on selected option and number of pages
    let uiuxCost = 0;
    for (let radio of uiuxRadios) {
      if (radio.checked) {
        uiuxCost = parseInt(radio.value, 10) * uiuxPagesCount;
        total += uiuxCost;
        result += `<p>Pilihan UI/UX: Rp${parseInt(radio.value).toLocaleString()} x ${uiuxPagesCount} halaman = Rp${uiuxCost.toLocaleString()}</p>`;
            break;
      }
    }
    // Handle extra names cost
    if (applyExtraNamesCheckbox.checked) {
      let roundedAdditionalNames = Math.ceil(extraNamesCount / 10) * 10;
      let extraCharge = (roundedAdditionalNames / 10) * 10000;
      total += extraCharge;
      result += `<p>Nama Ekstra: ${extraNamesCount} nama, biaya tambahan = Rp${extraCharge.toLocaleString()}</p>`;
    }

    // Handle extra pages cost if checkbox is checked
    if (extraPageCheckbox.checked) {
      let extraPageCharge = extraPagesCount * 15000;
      total += extraPageCharge;
      result += `<p>Halaman Tambahan: ${extraPagesCount} halaman, biaya tambahan = Rp${extraPageCharge.toLocaleString()}</p>`;
    }
    let fileMasterCost = 50000;
    // Handle file master cost if checkbox is checked
    if (fileMasterCheckbox.checked) {
      total += fileMasterCost;
      result += `<p>File Master: Rp${fileMasterCost.toLocaleString()}</p>`;
    }

   // Tampilkan hasil ke elemen resultDisplay
   document.getElementById("resultDisplay").innerHTML = result;

    let totalDiv = document.getElementById("totalAmount");
    totalDiv.textContent = `Total: Rp${total.toLocaleString()}`;

    // Update the cart icon with the total quantity
    updateCartIcon(totalQuantity);

    // Update the package count display
    updatePackageCount(packageCount);
  }

  window.addToCart = function (id, name, price) {
    let cart = getCart();
    let found = false;

    for (let item of cart) {
      if (item.id === id) {
        item.quantity += 1;
        found = true;
        break;
      }
    }

    if (!found) {
      cart.push({ id, name, price, quantity: 1 });
    }

    saveCart(cart);
    displayCart();
    alert(`"${name}" ditambahkan ke keranjang!`);
  };

  function removeFromCart(id) {
    let cart = getCart();
    cart = cart.filter((item) => item.id !== id);
    saveCart(cart);
    displayCart();
  }

  function updateCartIcon(quantity) {
    let cartIconCount = document.getElementById("cartIconCount");
    if (cartIconCount) {
      cartIconCount.textContent = quantity;
      cartIconCount.style.display = quantity > 0 ? "block" : "none";
    }
  }

  function updatePackageCount(count) {
    let packageCountElement = document.getElementById("packageCount");
    if (packageCountElement) {
      packageCountElement.textContent = `${count}`;
      packageCountElement.classList.add(
        "font-sans",
        "text-black",
        "text-lg",
        "font-semibold"
      );
    }
  }

  // validasi input user dan deskripsi

  // Seleksi elemen form
  const form = document.getElementById("checkoutForm");
  const nameInput = document.getElementById("name");
  const addressInput = document.getElementById("address");
  const telephoneInput = document.getElementById("telephone");
  const emailInput = document.getElementById("email");
  const messageInput = document.getElementById("message");

  // Fungsi validasi email
  function validateEmail(email) {
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailRegex.test(email);
  }

  // Fungsi validasi telepon (contoh sederhana untuk 12 digit)
  function validateTelephone(telephone) {
    const telephoneRegex = /^\d{12}$/;
    return telephoneRegex.test(telephone);
  }

  // Fungsi validasi form
  function validateForm() {
    const name = nameInput.value.trim();
    const address = addressInput.value.trim();
    const telephone = telephoneInput.value.trim();
    const email = emailInput.value.trim();
    const message = messageInput.value.trim();

    let isValid = true;

    document.getElementById("nameError").textContent = "";
    document.getElementById("addressError").textContent = "";
    document.getElementById("telephoneError").textContent = "";
    document.getElementById("emailError").textContent = "";
    document.getElementById("messageError").textContent = "";

    if (name === "") {
      document.getElementById("nameError").textContent = "masukan nama anda";
      isValid = false;
    }
    if (address === "") {
      document.getElementById("addressError").textContent =
        "masukan alamat anda";
      isValid = false;
    }
    if (telephone === "") {
      document.getElementById("telephoneError").textContent =
        "masukan nomer telepon";
      isValid = false;
    } else if (!validateTelephone(telephone)) {
      document.getElementById("telephoneError").textContent =
        "nomer telepon salah,masukan 12 digit angka";
      isValid = false;
    }
    if (email === "") {
      document.getElementById("emailError").textContent = "masukan email anda";
      isValid = false;
    } else if (!validateEmail(email)) {
      document.getElementById("emailError").textContent =
        "email yang anda masukan salah";
      isValid = false;
    }
    if (message === "") {
      document.getElementById("messageError").textContent = "masukan deskripsi";
      isValid = false;
    }

    return isValid;
  }



  

  function sendToWhatsApp() {
    const name = nameInput.value.trim();
    const address = addressInput.value.trim();
    const telephone = telephoneInput.value.trim();
    const email = emailInput.value.trim();
    const message = messageInput.value.trim();

    // Retrieve cart items
    let cart = getCart();
    let cartItemsMessage = cart
      .map((item) => {
        return `${item.name} x ${item.quantity} (${item.price.toLocaleString(
          "id-ID"
        )} each)`;
      })
      .join("%0A");

    // Checkboxes and additional options
    let extraNamesMessage = applyExtraNamesCheckbox.checked
      ? `Extra Names: ${extraNamesInput.value} (biaya tambahan mungkin berlaku)`
      : "";
    let extraPagesMessage = extraPageCheckbox.checked
      ? `Extra Pages: ${extraPagesInput.value} (biaya tambahan mungkin berlaku)`
      : "";
    let fileMasterMessage = fileMasterCheckbox.checked
      ? "File Master: Yes (additional Rp50,000)"
      : "";

    // Declare the uiuxOptionMessage variable
    let uiuxOptionMessage = '';

    const uiuxRadios = document.querySelectorAll('input[name="uiuxOption"]');
    // console.log("Total UI/UX radios found:", uiuxRadios.length);
    
    let isAnyRadioChecked = false;
    for (let radio of uiuxRadios) {
        // console.log(`Radio ID: ${radio.id}, Checked: ${radio.checked}`);
        if (radio.checked) {
            isAnyRadioChecked = true;
            const label = document.querySelector(`label[for="${radio.id}"]`);
            if (label) {
                uiuxOptionMessage = `UI/UX Option: ${label.textContent} for ${uiuxPagesInput.value} pages`;
            } else {
                console.error('Label element not found for the selected radio button.');
            }
            break;
        }
    }
    // console.log("Is any radio button checked:", isAnyRadioChecked);
    // console.log('UI/UX Option Message:', uiuxOptionMessage);

    // Format pesan WhatsApp
    const whatsappMessage =
      `Halo, saya ingin memesan dengan detail berikut:\n` +
      `Nama: ${name}\n` +
      `Alamat: ${address}\n` +
      `Telepon: ${telephone}\n` +
      `Email: ${email}\n` +
      `Deskripsi: ${message}\n` +
      `Produk yang Dipesan:\n${cartItemsMessage}\n` +
      `${extraNamesMessage}\n` +
      `${extraPagesMessage}\n` +
      `${fileMasterMessage}\n` +
      `${uiuxOptionMessage}`;

    // Ganti dengan nomor WhatsApp tujuan
    const whatsappNumber = "6282131698871";

    // URL WhatsApp dengan pesan pre-filled
    const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(
      whatsappMessage
    )}`;

    // Redirect ke WhatsApp
    window.location.href = whatsappURL;
}


  // Seleksi tombol checkout
  const checkoutButton = document.getElementById("checkout");

  // Tambahkan event listener pada tombol checkout
  checkoutButton.addEventListener("click", (e) => {
    e.preventDefault();
    // Jalankan validasi form
    if (!validateForm()) {
      alert("tolong masukan data yang kosong");
    } else {
      // Kirim data ke WhatsApp
      sendToWhatsApp();
    }
  });

  // Fungsi validasi telepon (contoh sederhana untuk 10 digit)
  function validateTelephone(telephone) {
    const telephoneRegex = /^\d{12}$/;
    return telephoneRegex.test(telephone);
  }

  // end

  let extraNamesInput = document.getElementById("extraNamesInput");
  if (extraNamesInput) {
    extraNamesInput.addEventListener("input", displayCart);
   
  }

  let extraPagesInput = document.getElementById("extraPagesInput");
  if (extraPagesInput) {
    extraPagesInput.addEventListener("input", displayCart);
   
  }

  let applyExtraNamesCheckbox = document.getElementById("applyExtraNames");
  if (applyExtraNamesCheckbox) {
    applyExtraNamesCheckbox.addEventListener("change", displayCart);
   
  }

  let extraPageCheckbox = document.getElementById("extraPageCheckbox");
  if (extraPageCheckbox) {
    extraPageCheckbox.addEventListener("change", () => {
      let extraPagesInput = document.getElementById("extraPagesInput");
      extraPagesInput.disabled = !extraPageCheckbox.checked;
      displayCart();
     
    });
  }

  let fileMasterCheckbox = document.getElementById("fileMasterCheckbox");
  if (fileMasterCheckbox) {
    fileMasterCheckbox.addEventListener("change", displayCart);
   
  }

  let uiuxRadios = document.getElementsByName("uiuxOption");
  for (let radio of uiuxRadios) {
    radio.addEventListener("change", displayCart);
   
  }

  let uiuxPagesInput = document.getElementById("uiuxPagesInput");
  if (uiuxPagesInput) {
    uiuxPagesInput.addEventListener("input", displayCart);
  }


// Fungsi untuk mereset pilihan dan mengosongkan keranjang
function resetCheckout() {
    // Kosongkan keranjang
    localStorage.removeItem("cart");
  
    // Kosongkan nilai input tambahan
    document.getElementById("extraNamesInput").value = "";
    document.getElementById("extraPagesInput").value = "";
    document.getElementById("uiuxPagesInput").value = "";
  
    // Uncheck all checkboxes
    document.getElementById("applyExtraNames").checked = false;
    document.getElementById("extraPageCheckbox").checked = false;
    document.getElementById("fileMasterCheckbox").checked = false;
  
    // Uncheck UI/UX options
    let uiuxRadios = document.getElementsByName("uiuxOption");
    for (let radio of uiuxRadios) {
      radio.checked = false;
    }
  
    // Disable extra pages input
    document.getElementById("extraPagesInput").disabled = true;
  
    // Kosongkan input form pengguna
    document.getElementById("name").value = "";
    document.getElementById("address").value = "";
    document.getElementById("telephone").value = "";
    document.getElementById("email").value = "";
    document.getElementById("message").value = "";
  
    // Clear localStorage for extra options
    localStorage.removeItem("extraNames");
    localStorage.removeItem("extraPages");
    localStorage.removeItem("applyExtraNames");
    localStorage.removeItem("extraPageCheckbox");
    localStorage.removeItem("fileMasterCheckbox");
    localStorage.removeItem("uiuxOption");
    localStorage.removeItem("uiuxPages");
  
    // Tampilkan ulang keranjang yang kosong
    displayCart();
   

  // Ensure the checkout button remains visible
  let checkoutButton = document.getElementById("checkout");
  if (checkoutButton) {
    checkoutButton.style.display = "block";
  }

  }

  // Tambahkan event listener untuk tombol "Batal Checkout"
  const cancelCheckoutButton = document.getElementById("cancelCheckout");
  cancelCheckoutButton.addEventListener("click", (e) => {
    e.preventDefault();
    resetCheckout();
  });

  displayCart();
});

