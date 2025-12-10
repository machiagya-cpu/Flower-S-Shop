<style>
    /* Collection Section */
    .collection {
        background: linear-gradient(135deg, #fff5f8 0%, #ffe0ec 100%);
        min-height: 100vh;
        padding: 80px 40px;
        margin-top: 60px;
    }

    .collection h1 {
        text-align: center;
        font-size: 48px;
        color: #e91e63;
        margin-bottom: 20px;
    }

    .collection>p {
        text-align: center;
        font-size: 18px;
        color: #666;
        margin-bottom: 50px;
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 15px;
        cursor: pointer;
    }

    .card h3 {
        color: #333;
        margin-bottom: 10px;
    }

    .card .price {
        color: #e91e63;
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .card button {
        width: 100%;
        padding: 12px;
        background: #e91e63;
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
    }

    .card button:hover {
        background: #c2185b;
    }

    /* Admin Edit Button */
    .admin-edit-btn {
        background: #ff9800 !important;
        color: white;
    }

    .admin-edit-btn:hover {
        background: #f57c00 !important;
    }

    /* Modal Edit Product */
    .edit-product-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: 3000;
        justify-content: center;
        align-items: center;
    }

    .edit-product-modal.show {
        display: flex;
    }

    .edit-modal-content {
        background: white;
        padding: 30px;
        border-radius: 20px;
        width: 90%;
        max-width: 500px;
        max-height: 90vh;
        overflow-y: auto;
    }

    .edit-modal-content h2 {
        color: #e91e63;
        margin-bottom: 20px;
    }

    .edit-form-group {
        margin-bottom: 15px;
    }

    .edit-form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
        color: #333;
    }

    .edit-form-group input,
    .edit-form-group textarea,
    .edit-form-group select {
        width: 100%;
        padding: 10px;
        border: 2px solid #ffb3d9;
        border-radius: 8px;
        font-size: 14px;
    }

    .edit-form-group textarea {
        min-height: 100px;
        resize: vertical;
    }

    .edit-btn-group {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .edit-btn-group button {
        flex: 1;
        padding: 12px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
    }

    .save-btn {
        background: #4caf50;
        color: white;
    }

    .cancel-btn {
        background: #999;
        color: white;
    }

    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        animation: fadeIn 0.3s;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .modal-content {
        background-color: white;
        margin: 5% auto;
        padding: 0;
        border-radius: 20px;
        width: 90%;
        max-width: 500px;
        position: relative;
        animation: slideUp 0.3s;
        max-height: 90vh;
        overflow-y: auto;
    }

    @keyframes slideUp {
        from {
            transform: translateY(100px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .modal-header {
        position: sticky;
        top: 0;
        background: white;
        padding: 20px;
        border-bottom: 1px solid #f0f0f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 10;
    }

    .modal-header h2 {
        color: #333;
        font-size: 1.3em;
        margin: 0;
    }

    .modal-close {
        font-size: 24px;
        color: #999;
        cursor: pointer;
        background: none;
        border: none;
        padding: 5px 10px;
    }

    .modal-body {
        padding: 0;
    }

    /* Product Detail Section */
    #productDetail {
        padding: 20px;
    }

    #productDetail img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    #productDetail h2 {
        color: #e91e63;
        margin-bottom: 10px;
        font-size: 1.5em;
    }

    .modal-price {
        color: #e91e63;
        font-size: 1.5em;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .modal-description {
        color: #666;
        line-height: 1.6;
        margin-bottom: 20px;
        font-size: 0.95em;
    }

    .buy-button {
        width: 100%;
        padding: 15px;
        background: #e91e63;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 1.1em;
        font-weight: bold;
        cursor: pointer;
    }

    .buy-button:hover {
        background: #c2185b;
    }

    .hidden {
        display: none;
    }

    /* Admin Info Badge */
    .admin-info {
        text-align: center;
        padding: 15px;
        background: #fff3e0;
        border-radius: 10px;
        color: #ff9800;
        font-weight: 600;
        margin-bottom: 15px;
    }

    /* Payment Modal */
    .payment-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: 4000;
        justify-content: center;
        align-items: center;
    }

    .payment-modal.show {
        display: flex;
    }

    .payment-modal-content {
        background: white;
        padding: 30px;
        border-radius: 20px;
        width: 90%;
        max-width: 600px;
        max-height: 90vh;
        overflow-y: auto;
    }

    .order-summary {
        background: #f9f9f9;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .order-summary-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid #ddd;
    }

    .order-summary-total {
        display: flex;
        justify-content: space-between;
        font-weight: bold;
        font-size: 1.2em;
        color: #e91e63;
        margin-top: 10px;
    }

    .payment-method {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        margin: 15px 0;
    }

    .payment-option {
        padding: 15px;
        border: 2px solid #ddd;
        border-radius: 10px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
    }

    .payment-option:hover {
        border-color: #e91e63;
        background: #fff5f8;
    }

    .payment-option.selected {
        border-color: #e91e63;
        background: #fff5f8;
    }

    .payment-option img {
        width: 60px;
        height: 30px;
        object-fit: contain;
        margin-bottom: 5px;
    }
</style>

<section class="collection" id="collection">
    <h1>Koleksi Bunga Kami</h1>
    <p>Pilih bunga favoritmu untuk diberikan kepada orang tersayang 🌷</p>

    <div class="card-container" id="productContainer">
        <!-- Products will be loaded dynamically -->
    </div>
</section>

<!-- Modal Detail Produk -->
<div id="flowerModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalHeaderTitle">Detail Produk</h2>
            <button class="modal-close" onclick="closeModal()">&times;</button>
        </div>

        <div class="modal-body">
            <div id="productDetail">
                <img id="modalImage" src="" alt="">
                <h2 id="modalTitle"></h2>
                <div class="modal-price" id="modalPrice"></div>
                <div class="modal-description" id="modalDescription"></div>

                <button id="buyNowButton" class="buy-button" onclick="handleBuyNow()">💳 BELI SEKARANG</button>

                <div id="adminInfo" class="admin-info hidden">
                    👑 Anda login sebagai Admin. Gunakan tombol EDIT pada card produk untuk mengelola produk.
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Product (Admin Only) -->
<div id="editProductModal" class="edit-product-modal">
    <div class="edit-modal-content">
        <h2>✏️ Edit Produk</h2>
        <form id="editProductForm" enctype="multipart/form-data">
            <input type="hidden" id="edit_product_id">

            <div class="edit-form-group">
                <label>Nama Produk</label>
                <input type="text" id="edit_product_name" required>
            </div>

            <div class="edit-form-group">
                <label>Harga</label>
                <input type="text" id="edit_product_price" placeholder="Rp140.000" required>
            </div>

            <div class="edit-form-group">
                <label>Gambar Produk</label>
                <input type="file" id="edit_product_image" accept="image/*">
                <img id="edit_preview_image" src=""
                    style="width:100%; margin-top:10px; border-radius:8px; display:none;">
            </div>

            <div class="edit-form-group">
                <label>Deskripsi</label>
                <textarea id="edit_product_description" required></textarea>
            </div>

            <div class="edit-btn-group">
                <button type="button" class="cancel-btn" onclick="closeEditModal()">Batal</button>
                <button type="submit" class="save-btn">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Pembayaran -->
<div id="paymentModal" class="payment-modal">
    <div class="payment-modal-content">
        <h2 style="color: #e91e63; margin-bottom: 20px;">💳 Pembayaran</h2>
        
        <div class="order-summary">
            <h3 style="margin-bottom: 15px;">Ringkasan Pesanan</h3>
            <div class="order-summary-item">
                <span id="summaryProductName"></span>
                <span id="summaryProductPrice"></span>
            </div>
            <div class="order-summary-item">
                <span>Ongkir</span>
                <span>Rp 15.000</span>
            </div>
            <div class="order-summary-total">
                <span>Total</span>
                <span id="summaryTotal"></span>
            </div>
        </div>

        <form id="paymentForm">
            <div class="edit-form-group">
                <label>Nama Penerima</label>
                <input type="text" id="recipient_name" required>
            </div>

            <div class="edit-form-group">
                <label>Alamat Pengiriman</label>
                <textarea id="shipping_address" required style="min-height: 80px;"></textarea>
            </div>

            <div class="edit-form-group">
                <label>Nomor Telepon</label>
                <input type="tel" id="phone_number" placeholder="08xx xxxx xxxx" required>
            </div>

            <div class="edit-form-group">
                <label>Metode Pembayaran</label>
                <div class="payment-method">
                    <div class="payment-option" onclick="selectPayment('BCA')">
                        <div style="font-weight: bold; color: #003d79;">BCA</div>
                        <div style="font-size: 12px;">Transfer Bank</div>
                    </div>
                    <div class="payment-option" onclick="selectPayment('Mandiri')">
                        <div style="font-weight: bold; color: #003d79;">Mandiri</div>
                        <div style="font-size: 12px;">Transfer Bank</div>
                    </div>
                    <div class="payment-option" onclick="selectPayment('GoPay')">
                        <div style="font-weight: bold; color: #00aa5b;">GoPay</div>
                        <div style="font-size: 12px;">E-Wallet</div>
                    </div>
                </div>
                <input type="hidden" id="payment_method" required>
            </div>

            <div class="edit-btn-group">
                <button type="button" class="cancel-btn" onclick="closePaymentModal()">Batal</button>
                <button type="submit" class="save-btn">Bayar Sekarang</button>
            </div>
        </form>
    </div>
</div>

<script>
    let currentUserRole = null;
    let currentUserId = null;
    let currentProductData = null;

    window.addEventListener('userSessionLoaded', (e) => {
        currentUserRole = e.detail.user.role;
        currentUserId = e.detail.user.id;
        console.log('✅ Collection: Session loaded, role =', currentUserRole);
        loadProducts();
    });

    window.addEventListener('userLoggedIn', (e) => {
        currentUserRole = e.detail.user.role;
        currentUserId = e.detail.user.id;
        console.log('✅ Collection: User logged in, role =', currentUserRole);
        loadProducts();
    });

    window.addEventListener('userLoggedOut', () => {
        currentUserRole = null;
        currentUserId = null;
        console.log('✅ Collection: User logged out');
        loadProducts();
    });

    document.addEventListener('DOMContentLoaded', function () {
        checkUserSession();
        loadProducts();
    });

    function checkUserSession() {
        fetch('check_session.php', {
            credentials: 'include'
        })
        .then(response => response.json())
        .then(data => {
            console.log('Check session response:', data);
            if (data.loggedIn) {
                currentUserRole = data.user.role;
                currentUserId = data.user.id;
                console.log('Collection: Initial check, role =', currentUserRole);
            }
        })
        .catch(error => console.error('Error checking session:', error));
    }

    function loadProducts() {
        fetch('get_products.php', {
            credentials: 'include'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                displayProducts(data.products);
            }
        })
        .catch(error => console.error('Error loading products:', error));
    }

    function displayProducts(products) {
        const container = document.getElementById('productContainer');
        container.innerHTML = '';

        products.forEach(product => {
            const card = document.createElement('div');
            card.className = 'card';

            const actionButton = currentUserRole === 'admin'
                ? `<button class="admin-edit-btn" onclick="event.stopPropagation(); openEditModal(${product.id}, '${escapeHtml(product.name)}', '${product.price}', '${product.image}', '${escapeHtml(product.description)}')">✏️ EDIT</button>`
                : `<button onclick="event.stopPropagation(); addToCart('${escapeHtml(product.name)}', '${product.price}', '${product.image}')">🛒 ADD TO CART</button>`;

            card.innerHTML = `
            <img src="${product.image}" alt="${product.name}" onclick="showFlowerDetail(${product.id})">
            <h3>${product.name}</h3>
            <p class="price">${product.price}</p>
            ${actionButton}
        `;

            container.appendChild(card);
        });
    }

    function showFlowerDetail(productId) {
        fetch('get_products.php', {
            credentials: 'include'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const product = data.products.find(p => p.id == productId);
                if (product) {
                    currentProductData = product;
                    document.getElementById('modalImage').src = product.image;
                    document.getElementById('modalTitle').textContent = product.name;
                    document.getElementById('modalPrice').textContent = product.price;
                    document.getElementById('modalDescription').textContent = product.description;

                    const buyButton = document.getElementById('buyNowButton');
                    const adminInfo = document.getElementById('adminInfo');

                    if (currentUserRole === 'admin') {
                        buyButton.classList.add('hidden');
                        adminInfo.classList.remove('hidden');
                    } else {
                        buyButton.classList.remove('hidden');
                        adminInfo.classList.add('hidden');
                    }

                    document.getElementById('flowerModal').style.display = 'block';
                }
            }
        });
    }

    function handleBuyNow() {
        if (!currentUserId) {
            alert('Silakan login terlebih dahulu untuk melakukan pembelian');
            closeModal();
            // Trigger modal login
            if (typeof openAuthModal === 'function') {
                openAuthModal('login');
            }
            return;
        }

        // User sudah login, tampilkan modal pembayaran
        if (currentProductData) {
            document.getElementById('summaryProductName').textContent = currentProductData.name;
            document.getElementById('summaryProductPrice').textContent = currentProductData.price;
            
            // Hitung total
            const price = parseInt(currentProductData.price.replace(/[^0-9]/g, ''));
            const shipping = 15000;
            const total = price + shipping;
            document.getElementById('summaryTotal').textContent = 'Rp ' + total.toLocaleString('id-ID');
            
            closeModal();
            document.getElementById('paymentModal').classList.add('show');
        }
    }

    function selectPayment(method) {
        // Remove selected class from all
        document.querySelectorAll('.payment-option').forEach(opt => {
            opt.classList.remove('selected');
        });
        
        // Add selected class to clicked
        event.target.closest('.payment-option').classList.add('selected');
        document.getElementById('payment_method').value = method;
    }

    function closePaymentModal() {
        document.getElementById('paymentModal').classList.remove('show');
        document.getElementById('paymentForm').reset();
        document.querySelectorAll('.payment-option').forEach(opt => {
            opt.classList.remove('selected');
        });
    }

    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const recipientName = document.getElementById('recipient_name').value;
        const shippingAddress = document.getElementById('shipping_address').value;
        const phoneNumber = document.getElementById('phone_number').value;
        const paymentMethod = document.getElementById('payment_method').value;
        
        if (!paymentMethod) {
            alert('Silakan pilih metode pembayaran!');
            return;
        }
        
        // Konfirmasi pesanan
        const price = parseInt(currentProductData.price.replace(/[^0-9]/g, ''));
        const total = price + 15000;
        
        const confirmation = confirm(
            `Konfirmasi Pesanan:\n\n` +
            `Produk: ${currentProductData.name}\n` +
            `Penerima: ${recipientName}\n` +
            `Alamat: ${shippingAddress}\n` +
            `No. Telp: ${phoneNumber}\n` +
            `Pembayaran: ${paymentMethod}\n` +
            `Total: Rp ${total.toLocaleString('id-ID')}\n\n` +
            `Lanjutkan pesanan?`
        );
        
        if (confirmation) {
            // Kirim data ke server
            const formData = new FormData();
            formData.append('product_id', currentProductData.id);
            formData.append('product_name', currentProductData.name);
            formData.append('product_price', currentProductData.price);
            formData.append('recipient_name', recipientName);
            formData.append('shipping_address', shippingAddress);
            formData.append('phone_number', phoneNumber);
            formData.append('payment_method', paymentMethod);
            formData.append('total_price', total);

            fetch('save_order.php', {
                method: 'POST',
                credentials: 'include',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(
                        '✅ Pesanan berhasil dibuat!\n\n' +
                        'Order ID: #' + data.order_id + '\n' +
                        'Silakan lakukan pembayaran ke rekening ' + data.payment_method + ' kami.\n\n' +
                        'Terima kasih!'
                    );
                    closePaymentModal();
                } else {
                    alert('❌ ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat membuat pesanan!');
            });
        }
    });

    function openEditModal(id, name, price, image, description) {
        document.getElementById('edit_product_id').value = id;
        document.getElementById('edit_product_name').value = name;
        document.getElementById('edit_product_price').value = price;
        document.getElementById('edit_product_description').value = description;

        const preview = document.getElementById('edit_preview_image');
        preview.src = image;
        preview.style.display = 'block';

        document.getElementById('editProductModal').classList.add('show');
    }

    function closeEditModal() {
        document.getElementById('editProductModal').classList.remove('show');
        document.getElementById('editProductForm').reset();
        document.getElementById('edit_preview_image').style.display = 'none';
    }

    document.getElementById('editProductForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData();
        formData.append('id', document.getElementById('edit_product_id').value);
        formData.append('name', document.getElementById('edit_product_name').value);
        formData.append('price', document.getElementById('edit_product_price').value);
        formData.append('description', document.getElementById('edit_product_description').value);

        const imageFile = document.getElementById('edit_product_image').files[0];
        if (imageFile) {
            formData.append('image', imageFile);
        }

        console.log('🔄 Submitting edit form...');
        console.log('Current role:', currentUserRole);

        fetch('update_product.php', {
            method: 'POST',
            credentials: 'include',
            body: formData
        })
        .then(response => {
            console.log('Response status:', response.status);
            return response.text();
        })
        .then(text => {
            console.log('Raw response:', text);
            try {
                const data = JSON.parse(text);
                alert(data.message);
                if (data.success) {
                    closeEditModal();
                    loadProducts();
                }
            } catch (err) {
                console.error('Parse error:', err);
                alert('Error: Respons tidak valid.\n\n' + text);
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            alert('Terjadi kesalahan saat menghubungi server!');
        });
    });

    document.getElementById('edit_product_image').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                const preview = document.getElementById('edit_preview_image');
                preview.src = event.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    function closeModal() {
        document.getElementById('flowerModal').style.display = 'none';
    }

    function escapeHtml(text) {
        const map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        return String(text).replace(/[&<>"']/g, m => map[m]);
    }

    window.onclick = function (event) {
        const modal = document.getElementById('flowerModal');
        const editModal = document.getElementById('editProductModal');
        const paymentModal = document.getElementById('paymentModal');

        if (event.target == modal) {
            closeModal();
        }
        if (event.target == editModal) {
            closeEditModal();
        }
        if (event.target == paymentModal) {
            closePaymentModal();
        }
    }
</script>
