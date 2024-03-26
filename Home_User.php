<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="Home.css" />
  <link rel="stylesheet" href="asset/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.css" />
</head>

<body>
  <?php
  session_start();
  ob_start();
  $showChangeButton = false; // Biến để kiểm tra xem có hiển thị nút Change hay không

  if (isset($_SESSION['s_user']) && is_array($_SESSION['s_user']) && count($_SESSION['s_user']) > 0) {
    $user = $_SESSION['s_user'];
    if ($user['Role'] == 1) {
      $showChangeButton = true; // Nếu là admin, hiển thị nút Change
    }
  }
  $username = $_SESSION['s_user']['Username'];
  ob_end_flush(); // Kết thúc quá trình đầu ra bộ đệm
  ?>

  <header class="header">
    <div id="sideBar">
      <img src="asset/img/th.jpg" alt="" class="header-sideBar-logo" />
      <ul class="header-sideBar-option">
        <li class="header-sideBar-item">
          <a href="Home_Admin.php" class="header-sideBar-item-link">Home</a>
        </li>
        <li class="header-sideBar-item">
          <a href="" class="header-sideBar-item-link">About us</a>
        </li>
        <li class="header-sideBar-item">
          <a href="Menu.php" class="header-sideBar-item-link">Menu</a>
        </li>
        <!-- <li class="header-sideBar-item">
          <a href="Change.php" class="header-sideBar-item-link">Change</a>
        </li> -->
        <?php if ($showChangeButton) : ?>
          <li class="header-sideBar-item">
            <a href="Change.php" class="header-sideBar-item-link">Change</a>
          </li>
        <?php endif; ?>
        <li class="header-sideBar-item">
          <a href="" class="header-sideBar-item-link">Cart</a>
        </li>
      </ul>
      <div class="header-sideBar-option">
        <a href="Login.php" class="header-sideBar-option-login">
          <i class="fa-solid fa-user"></i>
          <h2><?php echo $username; ?></h2>
          Login
        </a>
      </div>
    </div>
  </header>
</body>

</html>