<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Flower'S Store</title>
    <style>
        /* ===== CONTACT SECTION ===== */
        .contact-section {
            background: linear-gradient(135deg, #fff5f8 0%, #ffe0ec 100%);
            min-height: 100vh;
            padding: 80px 40px;
        }

        .contact-section h1 {
            text-align: center;
            font-size: 48px;
            color: #e91e63;
            margin-bottom: 50px;
        }

        .contact-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .contact-form-main {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: #333;
            font-weight: 600;
            font-size: 16px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #e91e63;
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #e91e63 0%, #c2185b 100%);
            color: white;
            border: none;
            padding: 18px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #c2185b 0%, #e91e63 100%);
            transform: scale(1.03);
        }

        .submit-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }

        .contact-info {
            display: flex;
            gap: 20px;
            margin-top: 40px;
        }

        .info-item {
            flex: 1;
            text-align: center;
            padding: 25px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .info-item .icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .info-item .label {
            font-size: 14px;
            color: #666;
            margin-bottom: 8px;
        }

        .info-item .value {
            font-size: 16px;
            color: #333;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .contact-info {
                flex-direction: column;
            }
        }

        /* ===== FOOTER SECTION ===== */
        .footer {
            background: #fff;
            padding: 60px 10%;
            color: #333;
            border-top: 2px solid #ffc1d6;
            margin-top: 80px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 40px;
        }

        .footer-box h3 {
            font-size: 20px;
            color: #d63384;
            margin-bottom: 20px;
            position: relative;
        }

        .footer-box a {
            display: block;
            color: #555;
            text-decoration: none;
            margin: 8px 0;
            transition: all 0.3s ease;
        }

        .footer-box a:hover {
            color: #e91e63;
            transform: translateX(5px);
        }

        .footer-box p {
            margin: 6px 0;
            color: #555;
        }

        .payment-icons img {
            width: 45px;
            margin: 10px 5px 0 0;
            vertical-align: middle;
            transition: transform 0.3s;
        }

        .payment-icons img:hover {
            transform: scale(1.1);
        }

        .footer-credit {
            text-align: center;
            margin-top: 50px;
            font-size: 14px;
            color: #777;
            border-top: 1px solid #eee;
            padding-top: 25px;
        }

        .footer-credit span {
            color: #e91e63;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .footer {
                text-align: center;
            }

            .payment-icons img {
                margin: 8px;
            }

            .payment-icons {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 25px;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- ===== CONTACT US SECTION ===== -->
    <section class="contact-section" id="contact">
        <h1>Contact Us</h1>
        <div class="contact-container">
            <div class="contact-form-main">
                <form id="contactForm" onsubmit="handleContactSubmit(event)">
                    <div class="form-group">
                        <label for="contact-name">Nama Lengkap</label>
                        <input type="text" id="contact-name" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-email">Email</label>
                        <input type="email" id="contact-email" placeholder="nama@email.com" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-phone">Nomor Telepon</label>
                        <input type="tel" id="contact-phone" placeholder="08xx xxxx xxxx" required>
                    </div>
                    <div class="form-group">
                        <label for="contact-message">Pesan</label>
                        <textarea id="contact-message" placeholder="Tulis pesan Anda di sini..." required></textarea>
                    </div>
                    <button type="submit" class="submit-btn" id="submitBtn">Kirim Pesan</button>
                </form>
            </div>

            <div class="contact-info">
                <div class="info-item">
                    <div class="icon">📧</div>
                    <div class="label">Email</div>
                    <div class="value">info@flowershop.com</div>
                </div>
                <div class="info-item">
                    <div class="icon">📞</div>
                    <div class="label">Telepon</div>
                    <div class="value">+62 812 3456 7890</div>
                </div>
                <div class="info-item">
                    <div class="icon">📍</div>
                    <div class="label">Lokasi</div>
                    <div class="value">Jakarta, Indonesia</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FOOTER SECTION ===== -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-box">
                <h3>Quick Links</h3>
                <a href="home_shop.php">Home</a>
                <a href="home_section.php">About</a>
                <a href="collection_shop.php">Collection</a>
                <a href="review_section.php">Review</a>
                <a href="#contact">Contact</a>
            </div>

            <div class="footer-box">
                <h3>Extra Links</h3>
                <a href="#">My Account</a>
                <a href="#">My Order</a>
                <a href="#">My Favorite</a>
            </div>

            <div class="footer-box">
                <h3>Locations</h3>
                <a href="#">Indonesia</a>
                <a href="#">Japan</a>
                <a href="#">USA</a>
                <a href="#">France</a>
            </div>

            <div class="footer-box">
                <h3>Contact Info</h3>
                <p>📞 +62 857 1647 4404</p>
                <p>📧 flowershop@gmail.com</p>
                <p>📍 Jakarta, Indonesia - 10110</p>
                <div class="payment-icons">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa">
                    <img src="https://cdn-icons-png.flaticon.com/512/196/196565.png" alt="PayPal">
                </div>

            </div>
        </div>

        <div class="footer-credit">
            Created By <span>Flower'S Store Team</span> | All Rights Reserved 🌸
        </div>
    </footer>

    <script>
        function handleContactSubmit(event) {
            event.preventDefault();
            
            // Ambil data dari form
            const name = document.getElementById('contact-name').value;
            const email = document.getElementById('contact-email').value;
            const phone = document.getElementById('contact-phone').value;
            const message = document.getElementById('contact-message').value;
            
            // Disable tombol submit
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Mengirim...';
            
            // Kirim data ke server
            const formData = new FormData();
            formData.append('name', name);
            formData.append('email', email);
            formData.append('phone', phone);
            formData.append('message', message);
            
            fetch('save_contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    document.getElementById('contactForm').reset();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim pesan!');
            })
            .finally(() => {
                // Enable kembali tombol submit
                submitBtn.disabled = false;
                submitBtn.textContent = 'Kirim Pesan';
            });
        }
    </script>
</body>

</html>
