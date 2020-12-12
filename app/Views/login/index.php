<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/style_l.css" />
  <title>Login Page</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form method="post" action="/" class="sign-in-form">
          <h2 class="title">Masuk</h2>
          <?php if (!empty(session()->getFlashdata('gagal'))) { ?>
            <div class="alert alert-warning">
              <?php echo session()->getFlashdata('gagal'); ?>
            </div>
          <?php } ?>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" />
          </div>
          <input type="submit" href="1.html" value="Login" class="btn solid" />
          <p class="social-text">Or Sign in with social platforms, but Comming soon!</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
        <form action="#" class="sign-up-form">
          <h2 class="title">Comming Soon!</h2>
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" />
          </div>
          <input type="submit" class="btn" value="Daftar" />
          <p class="social-text">Or Sign up with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Hi, Sobat Puskesmas Mlati II</h3>
          <p>
            Aplikasi ini digunakan untuk membantu mencatat
            kegiatan harian kamu. Belum punya akun?
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Daftar
          </button>
        </div>
        <img src="/img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Maaf,</h3>
          <p>
            Fitur ini sedang dalam perbaikan untuk daftar username dan password
            bisa menghubungi admin. Thanks!
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Kembali
          </button>
        </div>
        <img src="/img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="/js/app.js"></script>
</body>

</html>