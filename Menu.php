<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="Home.css" />
  <link rel="stylesheet" href="Shop.css" />
  <link rel="stylesheet" href="asset/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.css">
</head>

<body>
  <?php
        session_start();
        ob_start();
        $showChangeButton = false; // Biến để kiểm tra xem có hiển thị nút Change hay không

        if (isset($_SESSION['s_user']) && is_array($_SESSION['s_user']) && count($_SESSION['s_user']) > 0) {
          $user = $_SESSION['s_user'];
          if ($user['Role'] == "1") {
            $showChangeButton = true; // Nếu là admin, hiển thị nút Change
          } else {
            $showChangeButton = false;
          }
        }

        $username = isset($_SESSION['s_user']['Username']) ? $_SESSION['s_user']['Username'] : '';

        if (isset($_SESSION['s_user']) && is_array($_SESSION['s_user']) && count($_SESSION['s_user']) > 0) {
          unset($_SESSION['s_user']);
        }

        ob_end_flush(); // Kết thúc quá trình đầu ra bộ đệm
  ?>


  <?php
  $conn = mysqli_connect('localhost:3309', 'root', '', 'manageproduct') or die('Xin lỗi, database không kết nối được.');
  $sql = "select * from `manageproduce` ";
  $result = mysqli_query($conn, $sql);
  $data = [];
  $rowNum = 1;
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $data[] = array(
      'rowNum' => $rowNum, // sử dụng biến tự tăng để làm dữ liệu cột STT
      'ID' => $row['ID'],
      'Name' => $row['Name'],
      'Price' => $row['Price'],
      'ImageProduce' => $row['ImageProduce'],
      'ProduceCode' => $row['ProduceCode'],
      'Genre' => $row['Genre']
    );
    $rowNum++;
  }
  ?>

  <header class="header">
    <div id="sideBar">
      <img src="asset/img/th.jpg" alt="" class="header-sideBar-logo" />
      <ul class="header-sideBar-option">
        <li class="header-sideBar-item">
          <a href="Home_User.php" class="header-sideBar-item-link">Home</a>
        </li>
        <li class="header-sideBar-item">
          <a href="" class="header-sideBar-item-link">About us</a>
        </li>
        <li class="header-sideBar-item">
          <a href="" class="header-sideBar-item-link">Menu</a>
        </li>
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
  <img src="asset/img/banner-1.jpg" alt="" class="Banner-Category" />
  <div id="content">
    <div class="content-sideBar">
      <h2 class="content-sideBar-title">Category</h2>
      <ul class="content-sideBar-option">
        <li class="content-sideBar-item">Fresh Meat</li>
        <li class="content-sideBar-item">Vegetables</li>
        <li class="content-sideBar-item">Fruits and Nut</li>
        <li class="content-sideBar-item">Ocean Foods</li>
        <li class="content-sideBar-item">Butter & Eggs</li>
      </ul>
    </div>
    <div class="content-product">
      <h2 class="content-product-title">Product</h2>

      <div class="content-product-item">

        <!-- <div class="content-product-detail">
          <img src="asset/img/product/cat-1.jpg" alt="" class="content-product-item-img" />
          <div class="content-product-describ">
            <p class="content-produce-item-category">Vegetables</p>
            <h3 class="content-produce-name">Orange</h3>
            <h3 class="content-produce-price">15$</h3>
          </div>
        </div> -->

        <?php foreach ($data as $row) : ?>
          <div class="content-product-detail">
            <img src="asset/img/product/<?php echo  $row["ImageProduce"] ?>" alt="" class="content-product-item-img" />
            <div class="content-product-describ">
              <p class="content-produce-item-category"><?php echo $row['Genre']; ?></p>
              <h3 class="content-produce-name"><?php echo $row['Name']; ?></h3>
              <h3 class="content-produce-price"><?php echo $row['Price']; ?>$</h3>
            </div>
          </div>
        <?php endforeach; ?>



      </div>

    </div>
  </div>
</body>

</html>