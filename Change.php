<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="Home.css" />
  <link rel="stylesheet" href="Shop.css" />
  <link rel="stylesheet" href="Change.css" />
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
      'Amount' => $row['Amount'],
      'ImageProduce' => $row['ImageProduce'],
      'ProduceCode' => $row['ProduceCode'],
      'Genre' => $row['Genre']
    );
    $rowNum++;
  }
  ?>

  <header id="header">
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
          <a href="Menu.php" class="header-sideBar-item-link">Menu</a>
        </li>
        <li class="header-sideBar-item">
          <a href="Change.php" class="header-sideBar-item-link">Change</a>
        </li>
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

  <div class="content-change">

    <a href="add.php" class="content-change-header-title">
      <i class="fa-solid fa-plus icon-add "></i>
      New
    </a>



    <div class="content-change-title">
      <p class="content-change-ID">ID</p>
      <p class="content-change-img">Image</p>
      <p class="content-change-name">Name</p>
      <p class="content-change-price">Price</p>
      <p class="content-change-amount">Amount</p>
      <p class="content-change-genre">Genre</p>
      <p class="content-change-ProduceCode">Produce Code</p>
      <p class="content-change-info">Change</p>
      <p class="content-change-delete">Delete</p>
    </div>
    <div class="content-change-product">

      <?php foreach ($data as $row) : ?>

        <div class="content-change-product-item">
          <h3 class="content-change-product-item-ID"><?php echo $row['ID']; ?></h3>
          <img src="asset/img/product/<?php echo  $row["ImageProduce"] ?>" alt="" class="content-change-product-item-image" />
          <p class="content-change-product-item-name"><?php echo $row['Name']; ?></p>
          <p class="content-change-product-item-price"><?php echo $row['Price']; ?></p>
          <p class="content-change-product-item-amount"><?php echo $row['Amount']; ?></p>
          <p class="content-change-product-item-genre"><?php echo $row['Genre']; ?></p>
          <p class="content-change-product-item-produceCode"><?php echo $row['ProduceCode']; ?></p>
          <a href="edit.php?ID=<?php echo $row["ID"]; ?>">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
          <a href="delete.php?ID=<?php echo $row['ID']; ?>" class=" content-change-delete-product">
            <i class="fa-solid fa-trash"></i>
          </a>
        </div>
      <?php endforeach; ?>
    </div>


  </div>
</body>

</html>