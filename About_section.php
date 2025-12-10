<style>
  /* About Section */
  .about-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #fff5f8 100%);
    min-height: 100vh;
    padding: 80px 40px;
    background: #ffecefff;
  }

  .about-container {
    max-width: 1200px;
    margin: 0 auto;
  }

  .about-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
    margin-bottom: 80px;
  }

  .about-image-box {
    position: relative;
  }

  .about-image-main {
    width: 100%;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
  }

  .about-image-main img {
    width: 100%;
    height: 450px;
    object-fit: cover;
  }

  .about-badge {
    position: absolute;
    bottom: -30px;
    left: 50%;
    transform: translateX(-50%);
    background: white;
    padding: 20px 40px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    text-align: center;
  }

  .about-badge h3 {
    font-size: 28px;
    color: #e91e63;
    margin: 0;
    font-weight: bold;
  }

  .about-badge p {
    margin: 5px 0 0 0;
    color: #666;
    font-size: 14px;
  }

  .about-text h2 {
    font-size: 48px;
    color: #333;
    margin-bottom: 20px;
    line-height: 1.2;
  }

  .about-text h2 span {
    color: #e91e63;
  }

  .about-text p {
    color: #666;
    font-size: 16px;
    line-height: 1.8;
    margin-bottom: 15px;
  }

  .about-text .learn-more-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 15px 40px;
    background: #333;
    color: white;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s;
  }

  .about-text .learn-more-btn:hover {
    background: #e91e63;
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(233, 30, 99, 0.3);
  }

  /* Features Section */
  .features-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    margin-top: 80px;
  }

  .feature-card {
    background: white;
    padding: 40px 30px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s;
  }

  .feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
  }

  .feature-icon {
    font-size: 50px;
    margin-bottom: 20px;
  }

  .feature-card h4 {
    font-size: 20px;
    color: #333;
    margin-bottom: 10px;
    font-weight: bold;
  }

  .feature-card p {
    color: #999;
    font-size: 14px;
    margin: 0;
  }

  /* Responsive */
  @media (max-width: 968px) {
    .about-content {
      grid-template-columns: 1fr;
      gap: 40px;
    }

    .about-text h2 {
      font-size: 36px;
    }

    .features-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (max-width: 600px) {
    .features-grid {
      grid-template-columns: 1fr;
    }
  }
</style>

<!-- ABOUT SECTION -->
<section class="about-section" id="about">
  <div class="about-container">

    <!-- Main About Content -->
    <div class="about-content">
      <!-- Image Side -->
      <div class="about-image-box">
        <div class="about-image-main">
          <img src="birthday bouqet.jpeg" alt="Best Flower Sellers">
        </div>
        <div class="about-badge">
          <h3>Best Flower Sellers</h3>
          <p>Trusted by thousands</p>
        </div>
      </div>

      <!-- Text Side -->
      <div class="about-text">
        <h2>Why Choose <span>Us</span></h2>
        <p>
          Flower’s Store selalu menghadirkan bunga-bunga segar dengan rangkaian yang aesthetic dan elegan. Setiap
          bouquet dibuat dengan penuh ketelitian, mengutamakan kualitas namun tetap ramah di kantong. Kami menyediakan
          layanan custom bouquet sesuai keinginanmu, dengan pengiriman cepat dan aman agar bunga sampai tetap cantik dan
          fresh.
        </p>
        <p>
          Dengan pelayanan yang ramah dan perhatian pada detail, Flower’s Store menjadi pilihan tepat untuk
          setiap momen spesialmu—mulai dari ulang tahun, wisuda, anniversary, hingga sekadar membuat seseorang
          tersenyum.
        </p>
        <a href="#collection" class="learn-more-btn">Learn More</a>
      </div>
    </div>

    <!-- Features Grid -->
    <div class="features-grid">
      <!-- Feature 1 -->
      <div class="feature-card">
        <div class="feature-icon">🚚</div>
        <h4>Free Shoping</h4>
        <p>On All Orders</p>
      </div>

      <!-- Feature 2 -->
      <div class="feature-card">
        <div class="feature-icon">💰</div>
        <h4>10 Days Returns</h4>
        <p>Moneyback Guarantee</p>
      </div>

      <!-- Feature 3 -->
      <div class="feature-card">
        <div class="feature-icon">🎁</div>
        <h4>Offer & Gift</h4>
        <p>On All Orders</p>
      </div>

      <!-- Feature 4 -->
      <div class="feature-card">
        <div class="feature-icon">💳</div>
        <h4>Secure Payment</h4>
        <p>Protected By Paypal</p>
      </div>
    </div>

  </div>
</section>
