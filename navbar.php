<!-- ====== NAVBAR.PHP FIXED ====== -->
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  html {
    scroll-behavior: smooth;
  }

  /* Header Navbar */
  header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: #ffb3d9;
    padding: 15px 40px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .logo {
    font-size: 28px;
    font-weight: bold;
    color: #000;
  }

  .logo .dot {
    color: #e91e63;
  }

  nav ul {
    display: flex;
    list-style: none;
    gap: 30px;
  }

  nav ul li a {
    text-decoration: none;
    color: #000;
    font-weight: 500;
    transition: color 0.3s;
  }

  nav ul li a:hover {
    color: #e91e63;
  }

  .icons {
    display: flex;
    align-items: center;
    gap: 20px;
  }

  .icons a {
    text-decoration: none;
    color: #e91e63;
    font-weight: 500;
    cursor: pointer;
  }

  .icons a:hover {
    color: #c2185b;
  }

  #auth-buttons {
    display: flex;
    gap: 15px;
  }

  .user-profile {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    position: relative;
  }

  .user-profile img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: 2px solid #e91e63;
  }

  .user-profile span {
    color: #000;
    font-weight: 600;
  }

  /* Profile Dropdown */
  .profile-dropdown {
    display: none;
    position: absolute;
    top: 60px;
    right: 0;
    background: white;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    min-width: 220px;
    overflow: hidden;
    z-index: 1001;
  }

  .profile-dropdown.show {
    display: block;
  }

  .profile-info {
    padding: 15px;
    border-bottom: 1px solid #f0f0f0;
  }

  .profile-info p {
    margin: 5px 0;
    font-size: 14px;
  }

  .profile-info .name {
    font-weight: bold;
    color: #333;
  }

  .profile-info .email {
    color: #666;
    font-size: 12px;
  }

  .role-badge {
    display: inline-block;
    margin-top: 10px;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: bold;
  }

  .role-badge.admin {
    background: #e91e63;
    color: white;
  }

  .role-badge.user {
    background: #ffb3d9;
    color: #c2185b;
  }

  .profile-dropdown button {
    width: 100%;
    padding: 12px;
    border: none;
    background: white;
    color: #e91e63;
    font-weight: 600;
    cursor: pointer;
  }

  .profile-dropdown button:hover {
    background: #fff0f5;
  }

  /* Modal AUTH */
  .modal-auth {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 2000;
    justify-content: center;
    align-items: center;
  }

  .modal-auth.show {
    display: flex;
  }

  .modal-auth-content {
    background: white;
    border-radius: 20px;
    padding: 40px;
    max-width: 450px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;
    position: relative;
  }

  .modal-auth-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
  }

  .modal-auth-header h2 {
    color: #e91e63;
    font-size: 28px;
  }

  .auth-close-btn {
    background: none;
    border: none;
    font-size: 30px;
    color: #999;
    cursor: pointer;
    transition: color 0.3s;
    line-height: 1;
    padding: 5px;
  }

  .auth-close-btn:hover {
    color: #e91e63;
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

  .form-group input {
    width: 100%;
    padding: 12px;
    border: 2px solid #ffb3d9;
    border-radius: 10px;
    font-size: 14px;
  }

  .form-group input:focus {
    outline: none;
    border-color: #e91e63;
  }

  .role-selector {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 20px;
  }

  .role-option {
    padding: 20px;
    border: 2px solid #ffb3d9;
    border-radius: 10px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s;
  }

  .role-option:hover {
    border-color: #e91e63;
    background: #fff5f8;
  }

  .role-option.selected {
    border-color: #e91e63;
    background: #fff5f8;
  }

  .photo-upload {
    text-align: center;
    margin-bottom: 20px;
  }

  .photo-preview {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin: 0 auto 15px;
    object-fit: cover;
    border: 3px solid #e91e63;
  }

  .upload-btn {
    display: inline-block;
    padding: 10px 20px;
    background: #ffb3d9;
    color: #c2185b;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 600;
  }

  .upload-btn:hover {
    background: #e91e63;
    color: white;
  }

  .submit-btn {
    width: 100%;
    padding: 15px;
    background: #e91e63;
    color: white;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
  }

  .submit-btn:hover {
    background: #c2185b;
  }

  .switch-mode {
    text-align: center;
    margin-top: 20px;
  }

  .switch-mode a {
    color: #e91e63;
    text-decoration: underline;
    cursor: pointer;
    font-weight: 600;
  }

  .demo-account {
    margin-top: 20px;
    padding: 15px;
    background: #fff5f8;
    border-radius: 10px;
    border: 2px solid #ffb3d9;
  }

  .demo-account p {
    font-size: 12px;
    color: #c2185b;
    margin: 5px 0;
  }

  @media (max-width: 768px) {
    header {
      flex-wrap: wrap;
      padding: 15px 20px;
    }

    nav ul {
      gap: 15px;
    }

    nav ul li a {
      font-size: 14px;
    }
  }
</style>

<header>
  <div class="logo">Flower store<span class="dot">.</span></div>
  <nav>
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#collection">Collection</a></li>
      <li><a href="#review">Review</a></li>
      <li><a href="#contact">Contact Us</a></li>
    </ul>
  </nav>

  <div class="icons">
    <a class="user" onclick="openCart()">🛒 <span id="cart-count"
        style="display:none; background:#e91e63; color:white; border-radius:50%; padding:2px 6px; font-size:12px;">0</span></a>
    <div id="auth-buttons"><a onclick="openAuthModal('login')">Login</a></div>
    <div id="user-profile" class="user-profile" style="display:none;" onclick="toggleDropdown(event)">
      <img id="profile-photo" src="" alt="Profile">
      <span id="profile-name"></span>
      <div id="profile-dropdown" class="profile-dropdown">
        <div class="profile-info">
          <p class="name" id="dropdown-name"></p>
          <p class="email" id="dropdown-email"></p>
          <span class="role-badge" id="dropdown-role"></span>
        </div>
        <button onclick="logout()">Logout</button>
      </div>
    </div>
  </div>
</header>

<!-- MODAL KERANJANG -->
<div id="cartModal"
  style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:3000; justify-content:center; align-items:center;">
  <div style="background:white; padding:20px; border-radius:15px; width:400px; max-height:80vh; overflow-y:auto;">
    <h2 style="margin-bottom:15px; text-align:center; color:#e91e63;">🛒 Keranjang Kamu</h2>
    <div id="cartItems"></div>
    <button onclick="closeCart()"
      style="margin-top:20px; background:#e91e63; color:white; border:none; padding:10px 15px; border-radius:8px; cursor:pointer; width:100%;">Tutup</button>
  </div>
</div>

<!-- MODAL LOGIN/REGISTER -->
<div id="auth-modal" class="modal-auth">
  <div class="modal-auth-content">
    <div class="modal-auth-header">
      <h2 id="modal-title">Login</h2>
      <button class="auth-close-btn" id="auth-close-button">×</button>
    </div>

    <div id="login-form">
      <div class="form-group">
        <label>Email</label>
        <input type="email" id="login-email" placeholder="example@email.com">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" id="login-password" placeholder="••••••••">
      </div>
      <button class="submit-btn" onclick="handleLogin()">Login 🌸</button>

      <div class="demo-account">
        <p><strong>Demo Account:</strong></p>
        <p>Admin: admin@flowershop.com / admin123</p>
        <p>User: user@flowershop.com / user123</p>
      </div>
    </div>

    <div id="register-form" style="display:none;">
      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" id="register-name" placeholder="Masukkan nama lengkap">
      </div>

      <label style="display:block;margin-bottom:10px;font-weight:600;">Pilih Role</label>
      <div class="role-selector">
        <div class="role-option selected" id="role-user" onclick="selectRole('user')">
          <div class="icon">👤</div>
          <div class="label">Customer</div>
        </div>
        <div class="role-option" id="role-admin" onclick="selectRole('admin')">
          <div class="icon">👑</div>
          <div class="label">Admin</div>
        </div>
      </div>

      <div class="photo-upload">
        <img id="photo-preview" class="photo-preview" src="" style="display:none;">
        <label class="upload-btn">
          📷 Upload Foto
          <input type="file" id="photo-input" accept="image/*" style="display:none;" onchange="handlePhotoUpload()">
        </label>
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" id="register-email" placeholder="example@email.com">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" id="register-password" placeholder="••••••••">
      </div>
      <button class="submit-btn" onclick="handleRegister()">Register 🌺</button>
    </div>

    <div class="switch-mode">
      <a id="switch-link" onclick="switchMode()">Belum punya akun? Register disini</a>
    </div>
  </div>
</div>

<script>
  let currentUser = null;
  let currentMode = 'login';
  let selectedRole = 'user';
  let uploadedPhoto = null;

  // Cek session saat halaman load
  window.addEventListener('DOMContentLoaded', () => {
    checkSession();
    initEventListeners();
  });

  function checkSession() {
    console.log('🔍 Checking session...');
    fetch('check_session.php', {
      credentials: 'include'  // ✅ PENTING: Kirim cookie session
    })
      .then(response => response.json())
      .then(data => {
        console.log('Session response:', data);
        if (data.loggedIn) {
          currentUser = data.user;
          updateNavbar();

          // ✅ TRIGGER EVENT ke collection
          window.dispatchEvent(new CustomEvent('userSessionLoaded', {
            detail: { user: data.user }
          }));
        }
      })
      .catch(error => console.error('Error checking session:', error));
  }

  function openAuthModal(mode) {
    currentMode = mode;
    const modal = document.getElementById('auth-modal');
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';

    if (mode === 'login') {
      document.getElementById('modal-title').textContent = 'Login';
      document.getElementById('login-form').style.display = 'block';
      document.getElementById('register-form').style.display = 'none';
      document.getElementById('switch-link').textContent = 'Belum punya akun? Register disini';
    } else {
      document.getElementById('modal-title').textContent = 'Register';
      document.getElementById('login-form').style.display = 'none';
      document.getElementById('register-form').style.display = 'block';
      document.getElementById('switch-link').textContent = 'Sudah punya akun? Login disini';
      selectRole('user');
    }
  }

  function closeAuthModal() {
    const modal = document.getElementById('auth-modal');
    modal.classList.remove('show');
    clearForms();
    document.body.style.overflow = 'auto';
  }

  function switchMode() {
    openAuthModal(currentMode === 'login' ? 'register' : 'login');
  }

  function selectRole(role) {
    selectedRole = role;
    document.getElementById('role-user').classList.remove('selected');
    document.getElementById('role-admin').classList.remove('selected');
    document.getElementById('role-' + role).classList.add('selected');
  }

  function handlePhotoUpload() {
    const file = document.getElementById('photo-input').files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = e => {
        uploadedPhoto = e.target.result;
        const preview = document.getElementById('photo-preview');
        preview.src = e.target.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    }
  }

  function handleLogin() {
    const email = document.getElementById('login-email').value.trim();
    const password = document.getElementById('login-password').value;

    if (!email || !password) {
      alert('Isi email dan password!');
      return;
    }

    const formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);

    fetch('login.php', {
      method: 'POST',
      credentials: 'include',  // ✅ Kirim cookie session
      body: formData
    })
      .then(response => response.json())
      .then(data => {
        console.log('Login response:', data);
        if (data.success) {
          currentUser = data.user;
          updateNavbar();
          closeAuthModal();
          alert(data.message);

          // ✅ TRIGGER EVENT ke collection
          window.dispatchEvent(new CustomEvent('userLoggedIn', {
            detail: { user: data.user }
          }));
        } else {
          alert(data.message);
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat login!');
      });
  }

  function handleRegister() {
    const name = document.getElementById('register-name').value;
    const email = document.getElementById('register-email').value;
    const password = document.getElementById('register-password').value;

    if (!name || !email || !password) {
      alert('Mohon lengkapi semua field!');
      return;
    }

    const formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('role', selectedRole);
    if (uploadedPhoto) formData.append('photo', uploadedPhoto);

    fetch('register.php', {
      method: 'POST',
      credentials: 'include',  // ✅ Kirim cookie session
      body: formData
    })
      .then(response => response.json())
      .then(data => {
        alert(data.message);
        if (data.success) {
          window.location.href = 'home_shop.php';
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat registrasi!');
      });
  }

  function updateNavbar() {
    if (currentUser) {
      document.getElementById('auth-buttons').style.display = 'none';
      document.getElementById('user-profile').style.display = 'flex';
      document.getElementById('profile-photo').src = currentUser.photo;
      document.getElementById('profile-name').textContent = `Halo ${currentUser.role}, ${currentUser.name}`;
      document.getElementById('dropdown-name').textContent = currentUser.name;
      document.getElementById('dropdown-email').textContent = currentUser.email;
      const roleBadge = document.getElementById('dropdown-role');
      roleBadge.textContent = currentUser.role === 'admin' ? '👑 Admin' : '🌸 Customer';
      roleBadge.className = 'role-badge ' + currentUser.role;
    } else {
      document.getElementById('auth-buttons').style.display = 'flex';
      document.getElementById('user-profile').style.display = 'none';
    }
  }

  function toggleDropdown(e) {
    if (e) e.stopPropagation();
    document.getElementById('profile-dropdown').classList.toggle('show');
  }

  function logout() {
    if (confirm('Yakin ingin logout?')) {
      fetch('logout.php', {
        method: 'POST',
        credentials: 'include'  // ✅ Kirim cookie session
      })
        .then(response => response.json())
        .then(data => {
          currentUser = null;
          updateNavbar();
          alert(data.message);

          // ✅ TRIGGER EVENT ke collection
          window.dispatchEvent(new Event('userLoggedOut'));
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Terjadi kesalahan saat logout!');
        });
    }
  }

  function clearForms() {
    document.querySelectorAll('#auth-modal input').forEach(i => i.value = '');
    uploadedPhoto = null;
    document.getElementById('photo-preview').style.display = 'none';
  }

  function initEventListeners() {
    const authCloseBtn = document.getElementById('auth-close-button');
    const authModal = document.getElementById('auth-modal');

    if (authCloseBtn) {
      authCloseBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        e.preventDefault();
        closeAuthModal();
      });
    }

    if (authModal) {
      authModal.addEventListener('click', (e) => {
        if (e.target === authModal) {
          closeAuthModal();
        }
      });
    }

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && authModal && authModal.classList.contains('show')) {
        closeAuthModal();
      }
    });

    document.addEventListener('click', (e) => {
      const dropdown = document.getElementById('profile-dropdown');
      const userProfile = document.getElementById('user-profile');
      if (dropdown && userProfile && !userProfile.contains(e.target)) {
        dropdown.classList.remove('show');
      }
    });
  }

  // === KERANJANG ===
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  function updateCartIcon() {
    const cartCount = document.getElementById("cart-count");
    if (!cartCount) return;
    cartCount.textContent = cart.length;
    cartCount.style.display = cart.length > 0 ? "inline-block" : "none";
  }

  function addToCart(flowerName, flowerPrice, flowerImage) {
    const product = { name: flowerName, price: flowerPrice, image: flowerImage };
    cart.push(product);
    localStorage.setItem("cart", JSON.stringify(cart));
    updateCartIcon();
    alert(`${flowerName} berhasil ditambahkan ke keranjang! 🛒`);
  }

  function openCart() {
    const modal = document.getElementById("cartModal");
    const list = document.getElementById("cartItems");
    list.innerHTML = "";

    if (cart.length === 0) {
      list.innerHTML = "<p style='text-align:center;'>Keranjang kamu masih kosong 🥀</p>";
    } else {
      cart.forEach((item, index) => {
        list.innerHTML += `
          <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:10px; border-bottom:1px solid #ddd; padding-bottom:10px;">
            <img src="${item.image}" alt="${item.name}" width="50" height="50" style="border-radius:8px;">
            <div style="flex:1; margin-left:10px;">
              <p><b>${item.name}</b></p>
              <p>${item.price}</p>
            </div>
            <button onclick="removeFromCart(${index})" style="border:none; background:none; color:#e91e63; font-size:18px; cursor:pointer;">❌</button>
          </div>
        `;
      });
    }

    modal.style.display = "flex";
  }

  function removeFromCart(index) {
    cart.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    updateCartIcon();
    openCart();
  }

  function closeCart() {
    document.getElementById("cartModal").style.display = "none";
  }

  document.addEventListener("DOMContentLoaded", updateCartIcon);
</script>
