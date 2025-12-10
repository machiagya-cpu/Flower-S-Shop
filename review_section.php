<style>
    /* Review Section */
    .review-section {
        background: linear-gradient(135deg, #fff5f8 0%, #ffe0ec 100%);
        min-height: 100vh;
        padding: 80px 40px;
    }

    .review-section h1 {
        text-align: center;
        font-size: 48px;
        color: #e91e63;
        margin-bottom: 20px;
    }

    .review-section>p {
        text-align: center;
        font-size: 18px;
        color: #666;
        margin-bottom: 50px;
    }

    /* Add Review Button */
    .add-review-btn {
        display: block;
        margin: 0 auto 40px;
        padding: 15px 40px;
        background: #e91e63;
        color: white;
        border: none;
        border-radius: 50px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(233, 30, 99, 0.3);
        transition: all 0.3s;
    }

    .add-review-btn:hover {
        background: #c2185b;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(233, 30, 99, 0.4);
    }

    /* Review Form Container */
    .review-form-container {
        max-width: 600px;
        margin: 0 auto 40px;
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        display: none;
    }

    .review-form-container.show {
        display: block;
        animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .review-form-container h3 {
        color: #e91e63;
        margin-bottom: 20px;
        font-size: 24px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #333;
        font-weight: 600;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 2px solid #ffb3d9;
        border-radius: 10px;
        font-size: 14px;
        font-family: inherit;
    }

    .form-group textarea {
        min-height: 120px;
        resize: vertical;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #e91e63;
    }

    /* Star Rating */
    .star-rating {
        display: flex;
        gap: 5px;
        font-size: 30px;
    }

    .star-rating span {
        cursor: pointer;
        color: #ddd;
        transition: color 0.2s;
    }

    .star-rating span.active,
    .star-rating span:hover {
        color: #ffc107;
    }

    /* Photo Upload */
    .photo-upload-wrapper {
        position: relative;
    }

    .photo-upload-label {
        display: inline-block;
        padding: 12px 24px;
        background: #f0f0f0;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .photo-upload-label:hover {
        background: #e0e0e0;
    }

    .photo-upload-label input {
        display: none;
    }

    .photo-preview {
        margin-top: 15px;
        position: relative;
        display: inline-block;
    }

    .photo-preview img {
        max-width: 200px;
        max-height: 200px;
        border-radius: 10px;
        object-fit: cover;
    }

    .remove-photo {
        position: absolute;
        top: -10px;
        right: -10px;
        background: #e91e63;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        cursor: pointer;
        font-size: 18px;
        line-height: 1;
    }

    /* Form Buttons */
    .form-buttons {
        display: flex;
        gap: 15px;
        margin-top: 25px;
    }

    .form-buttons button {
        flex: 1;
        padding: 15px;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s;
    }

    .submit-btn {
        background: #e91e63;
        color: white;
    }

    .submit-btn:hover {
        background: #c2185b;
    }

    .cancel-btn {
        background: #999;
        color: white;
    }

    .cancel-btn:hover {
        background: #777;
    }

    /* Reviews List */
    .reviews-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .review-card {
        background: white;
        padding: 25px;
        border-radius: 20px;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s;
    }

    .review-card:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.12);
        transform: translateY(-2px);
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .reviewer-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .reviewer-avatar {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #e91e63, #ff6090);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 20px;
    }

    .reviewer-details h4 {
        margin: 0;
        color: #333;
        font-size: 18px;
    }

    .review-date {
        color: #999;
        font-size: 13px;
        margin-top: 3px;
    }

    .review-actions {
        display: flex;
        gap: 10px;
    }

    .edit-review-btn,
    .delete-review-btn {
        padding: 8px 15px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .edit-review-btn {
        background: #2196f3;
        color: white;
    }

    .edit-review-btn:hover {
        background: #1976d2;
    }

    .delete-review-btn {
        background: #f44336;
        color: white;
    }

    .delete-review-btn:hover {
        background: #d32f2f;
    }

    .product-badge {
        display: inline-block;
        background: #fff5f8;
        color: #e91e63;
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .review-stars {
        display: flex;
        gap: 3px;
        margin-bottom: 12px;
        font-size: 20px;
        color: #ffc107;
    }

    .review-text {
        color: #555;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .review-photo img {
        max-width: 100%;
        max-height: 300px;
        border-radius: 15px;
        object-fit: cover;
    }

    .no-reviews {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 20px;
        color: #999;
        font-size: 18px;
    }

    .no-reviews-icon {
        font-size: 60px;
        margin-bottom: 15px;
    }
</style>

<section class="review-section" id="review">
    <h1>Customer Reviews</h1>
    <p>Bagikan pengalaman Anda dengan produk kami! 💐</p>

    <!-- Add Review Button -->
    <button class="add-review-btn" id="addReviewBtn" onclick="toggleReviewForm()">
        ✍️ Tulis Review
    </button>

    <!-- Review Form -->
    <div class="review-form-container" id="reviewFormContainer">
        <h3 id="formTitle">Tulis Review Baru</h3>
        <div class="form-group">
            <label>username</label>
            <input type="text" id="reviewerName" placeholder="Masukkan username " required>
        </div>

        <div class="form-group">
            <label>Pilih Produk</label>
            <select id="productSelect" required>
                <option value="">Pilih Produk</option>
            </select>
        </div>

        <div class="form-group">
            <label>Rating</label>
            <div class="star-rating" id="starRating">
                <span data-rating="1">★</span>
                <span data-rating="2">★</span>
                <span data-rating="3">★</span>
                <span data-rating="4">★</span>
                <span data-rating="5">★</span>
            </div>
            <input type="hidden" id="ratingValue" value="5">
        </div>

        <div class="form-group">
            <label>Pesan Review</label>
            <textarea id="reviewMessage" placeholder="Ceritakan pengalaman Anda..." required></textarea>
        </div>

        <div class="form-group">
            <label>Upload Foto Product</label>
            <div class="photo-upload-wrapper">
                <label class="photo-upload-label">
                    📷 Pilih Foto
                    <input type="file" id="reviewPhoto" accept="image/*" onchange="previewPhoto()">
                </label>
                <div id="photoPreview" class="photo-preview" style="display: none;">
                    <img id="previewImage" src="" alt="Preview">
                    <button class="remove-photo" onclick="removePhoto()">×</button>
                </div>
            </div>
        </div>

        <div class="form-buttons">
            <button class="cancel-btn" onclick="cancelReview()">Batal</button>
            <button class="submit-btn" onclick="submitReview()">Kirim Review</button>
        </div>
    </div>

    <!-- Reviews List -->
    <div class="reviews-container" id="reviewsContainer">
        <!-- Reviews will be loaded here -->
    </div>
</section>

<script>
    let currentEditingReviewId = null;
    let currentPhotoBase64 = null;
    let selectedRating = 5;

    // Load products untuk dropdown
    function loadProductsForReview() {
        fetch('get_products.php', {
            credentials: 'include'
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const select = document.getElementById('productSelect');
                    select.innerHTML = '<option value="">Pilih Produk</option>';
                    data.products.forEach(product => {
                        const option = document.createElement('option');
                        option.value = product.id;
                        option.textContent = product.name;
                        select.appendChild(option);
                    });
                }
            });
    }

    // Star rating handler
    document.querySelectorAll('#starRating span').forEach(star => {
        star.addEventListener('click', function () {
            selectedRating = parseInt(this.dataset.rating);
            document.getElementById('ratingValue').value = selectedRating;
            updateStarRating(selectedRating);
        });

        star.addEventListener('mouseenter', function () {
            const rating = parseInt(this.dataset.rating);
            updateStarRating(rating);
        });
    });

    document.getElementById('starRating').addEventListener('mouseleave', function () {
        updateStarRating(selectedRating);
    });

    function updateStarRating(rating) {
        document.querySelectorAll('#starRating span').forEach((star, index) => {
            if (index < rating) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }

    // Initialize stars
    updateStarRating(5);

    function toggleReviewForm() {
        const container = document.getElementById('reviewFormContainer');
        const btn = document.getElementById('addReviewBtn');

        if (!currentUserId) {
            alert('Silakan login terlebih dahulu untuk menulis review!');
            if (typeof openAuthModal === 'function') {
                openAuthModal('login');
            }
            return;
        }

        if (container.classList.contains('show')) {
            container.classList.remove('show');
            btn.textContent = '✍️ Tulis Review';
        } else {
            container.classList.add('show');
            btn.textContent = '✕ Tutup Form';
            window.scrollTo({
                top: container.offsetTop - 100,
                behavior: 'smooth'
            });
        }
    }

    function previewPhoto() {
        const file = document.getElementById('reviewPhoto').files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                currentPhotoBase64 = e.target.result;
                document.getElementById('previewImage').src = currentPhotoBase64;
                document.getElementById('photoPreview').style.display = 'inline-block';
            };
            reader.readAsDataURL(file);
        }
    }

    function removePhoto() {
        currentPhotoBase64 = null;
        document.getElementById('reviewPhoto').value = '';
        document.getElementById('photoPreview').style.display = 'none';
    }

    function submitReview() {
        const name = document.getElementById('reviewerName').value.trim();
        const productId = document.getElementById('productSelect').value;
        const rating = document.getElementById('ratingValue').value;
        const message = document.getElementById('reviewMessage').value.trim();

        if (!name || !productId || !message) {
            alert('Mohon lengkapi semua field yang wajib diisi!');
            return;
        }

        const formData = new FormData();
        const action = currentEditingReviewId ? 'update' : 'create';
        formData.append('action', action);

        // DEBUG: cek action
        console.log('Action:', action);
        console.log('Current editing ID:', currentEditingReviewId);
        if (currentEditingReviewId) {
            formData.append('review_id', currentEditingReviewId);
        }
        formData.append('name', name);
        formData.append('product_id', productId);
        formData.append('rating', rating);
        formData.append('message', message);
        if (currentPhotoBase64) {
            formData.append('photo', currentPhotoBase64);
        }

        fetch('manage_reviews.php', {
            method: 'POST',
            credentials: 'include',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    cancelReview();
                    loadReviews();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menyimpan review!');
            });
    }

    function cancelReview() {
        document.getElementById('reviewFormContainer').classList.remove('show');
        document.getElementById('addReviewBtn').textContent = '✍️ Tulis Review';
        document.getElementById('formTitle').textContent = 'Tulis Review Baru';
        document.getElementById('reviewerName').value = '';
        document.getElementById('productSelect').value = '';
        document.getElementById('reviewMessage').value = '';
        selectedRating = 5;
        updateStarRating(5);
        removePhoto();
        currentEditingReviewId = null;
    }

    function editReview(reviewId, name, productId, rating, message, photo) {
        currentEditingReviewId = reviewId;
        document.getElementById('formTitle').textContent = 'Edit Review';
        document.getElementById('reviewerName').value = name;
        document.getElementById('productSelect').value = productId;
        selectedRating = rating;
        updateStarRating(rating);
        document.getElementById('ratingValue').value = rating;
        document.getElementById('reviewMessage').value = message;

        if (photo) {
            currentPhotoBase64 = photo;
            document.getElementById('previewImage').src = photo;
            document.getElementById('photoPreview').style.display = 'inline-block';
        }

        document.getElementById('reviewFormContainer').classList.add('show');
        document.getElementById('addReviewBtn').textContent = '✕ Tutup Form';

        window.scrollTo({
            top: document.getElementById('reviewFormContainer').offsetTop - 100,
            behavior: 'smooth'
        });
    }

    function deleteReview(reviewId) {
        if (!confirm('Yakin ingin menghapus review ini?')) {
            return;
        }

        const formData = new FormData();
        formData.append('action', 'delete');
        formData.append('review_id', reviewId);

        fetch('manage_reviews.php', {
            method: 'POST',
            credentials: 'include',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    loadReviews();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus review!');
            });
    }

    function loadReviews() {
        fetch('manage_reviews.php?action=list', {
            credentials: 'include'
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    displayReviews(data.reviews);
                }
            })
            .catch(error => console.error('Error loading reviews:', error));
    }

    function displayReviews(reviews) {
        const container = document.getElementById('reviewsContainer');

        if (reviews.length === 0) {
            container.innerHTML = `
                <div class="no-reviews">
                    <div class="no-reviews-icon">🌸</div>
                    <p>Belum ada review. Jadilah yang pertama!</p>
                </div>
            `;
            return;
        }

        container.innerHTML = reviews.map(review => {
            const stars = '★'.repeat(review.rating) + '☆'.repeat(5 - review.rating);
            const date = new Date(review.created_at).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });

            let actionButtons = '';
            if (currentUserId) {
                if (currentUserRole === 'admin') {
                    // Admin hanya bisa hapus
                    actionButtons = `
                        <div class="review-actions">
                            <button class="delete-review-btn" onclick="deleteReview(${review.id})">🗑️ Hapus</button>
                        </div>
                    `;
                } else if (review.user_id == currentUserId) {
                    // User bisa edit dan hapus review sendiri
                    actionButtons = `
                        <div class="review-actions">
                            <button class="edit-review-btn" onclick="editReview(${review.id}, '${escapeHtml(review.name)}', ${review.product_id}, ${review.rating}, '${escapeHtml(review.message)}', '${review.photo || ''}')">✏️ Edit</button>
                            <button class="delete-review-btn" onclick="deleteReview(${review.id})">🗑️ Hapus</button>
                        </div>
                    `;
                }
            }

            return `
                <div class="review-card">
                    <div class="review-header">
                        <div class="reviewer-info">
                            <div class="reviewer-avatar">${review.name.charAt(0).toUpperCase()}</div>
                            <div class="reviewer-details">
                                <h4>${escapeHtml(review.name)}</h4>
                                <div class="review-date">${date}</div>
                            </div>
                        </div>
                        ${actionButtons}
                    </div>
                    <div class="product-badge">${escapeHtml(review.product_name)}</div>
                    <div class="review-stars">${stars}</div>
                    <div class="review-text">${escapeHtml(review.message)}</div>
                    ${review.photo ? `<div class="review-photo"><img src="${review.photo}" alt="Review photo"></div>` : ''}
                </div>
            `;
        }).join('');
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

    // Load on page load
    document.addEventListener('DOMContentLoaded', function () {
        loadProductsForReview();
        loadReviews();
    });

    // Reload when user logs in/out
    window.addEventListener('userLoggedIn', () => {
        loadReviews();
    });

    window.addEventListener('userLoggedOut', () => {
        loadReviews();
    });
</script>
