<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="asset/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.css">
</head>

<body>
  <?php
  $conn = mysqli_connect('localhost:3309', 'root', '', 'manageproduct') or die('Xin lỗi, database không kết nối được.');


  ?>
  <div class="container">
    <h1>Form thêm sản phẩm mới</h1>

    <form name="frmEdit" id="frmEdit" method="post" action="" class="form" enctype="multipart/form-data">
      <table class=" table">
      <tr>
        <td>ID</td>
        <td>
          <input type="text" name="ID" id="ID" class="form-control" />
        </td>
      </tr>
      <tr>
        <td>Name</td>
        <td>
          <input type="text" name="Name" id="Name" class="form-control" />
        </td>
      </tr>
      <tr>
        <td>Price</td>
        <td>
          <input type="text" name="Price" id="Price" class="form-control" />
        </td>
      </tr>
      <tr>
        <td>Image Produce</td>
        <td>
          <input type="file" name="ImageProduce" id="ImageProduce" class="form-control" />
        </td>
      </tr>
      <tr>
        <td>Amount</td>
        <td>
          <input type="text" name="Amount" id="Amount" class="form-control" />
        </td>
      </tr>
      <tr>
        <td>Genre</td>
        <td>
          <input type="text" name="Genre" id="Genre" class="form-control" />
        </td>
      </tr>
      <tr>
        <td>Produce Code</td>
        <td>
          <input type="text" name="ProduceCode" id="ProduceCode" class="form-control" />
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <button name="btnAdd" class="btn btn-primary">
            Add Product
          </button>
        </td>
      </tr>
      </table>
    </form>
  </div>

  <?php
  if (isset($_POST['btnAdd'])) {
    // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST $_POST
    $ID= $_POST["ID"];
    $Name = $_POST['Name'];
    $Price = $_POST['Price'];
    $ImageProduce = basename($_FILES['ImageProduce']['name']);
    $TargetFolders= "asset/img/product/";
    $TargetFile = $TargetFolders . $ImageProduce;

    if (move_uploaded_file($_FILES["ImageProduce"]["tmp_name"], $TargetFile)) {
      echo "<h1>File da dc upload</h1>";
    } else {
      echo "File chua dc upload";
    }

    $Amount = $_POST['Amount'];
    $Genre = $_POST['Genre'];
    $ProduceCode = $_POST['ProduceCode'];



    $errors = [];
    // 5. Thông báo lỗi cụ thể người dùng mắc phải (nếu vi phạm bất kỳ quy luật kiểm tra ràng buộc)
    // dd($errors);
    if (!empty($errors)) {
      // In ra thông báo lỗi
      // kèm theo dữ liệu thông báo lỗi
      foreach ($errors as $errorField) {
        foreach ($errorField as $error) {
          echo $error['msg'] . '<br />';
        }
      }
      return;
    }

    $sql = "INSERT INTO manageproduce (ID, Name, Price, ImageProduce, Amount, Genre, ProduceCode) 
   VALUES ('$ID', '$Name', '$Price', '$ImageProduce', '$Amount', '$Genre', '$ProduceCode');";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header('location:Change.php');
  }
  ?>

</body>

</html>