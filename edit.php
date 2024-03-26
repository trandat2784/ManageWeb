<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php
    $conn = mysqli_connect('localhost:3309', 'root', '', 'manageproduct') or die('Xin lỗi, database không kết nối được.');
    $ID = $_GET['ID'];
    $sqlSelect = "SELECT * FROM `manageproduce` WHERE ID='" . $ID . "';";
    $resultSelect = mysqli_query($conn, $sqlSelect);
    $row = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

    if (empty($row)) {
        echo "Giá trị id: $ID  không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }
    ?>
    <!-- readonly -->

    <form name="frmEdit" id="frmEdit" method="post" action="" class="form" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id" id="ID" class="form-control" value="<?php echo $row['ID'] ?>" /></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="Name" id="Name" class="form-control" value="<?php echo $row['Name'] ?>" /></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="Price" id="Price" class="form-control" value="<?php echo $row['Price'] ?>" /></td>
            </tr>
            <tr>
                <td>Image Produce</td>
                <td><input type="file" name="ImageProduce" id="ImageProduce" class="form-control" value="<?php echo $row['ImageProduce'] ?>" /></td>
            </tr>
            <tr>
                <td>Amount</td>
                <td><input type="text" name="Amount" id="Amount" class="form-control" value="<?php echo $row['Amount'] ?>" /></td>
            </tr>
            <tr>
                <td>Genre</td>
                <td><input type="text" name="Genre" id="Genre" class="form-control" value="<?php echo $row['Genre'] ?>" /></td>
            </tr>
            <tr>
                <td>Produce Code</td>
                <td><input type="text" name="ProduceCode" id="ProduceCode" class="form-control" value="<?php echo $row['ProduceCode'] ?>" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button name="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Lưu dữ liệu</button>
                </td>
            </tr>
        </table>
    </form>



    <?php
    if (isset($_POST['btnSave'])) {
        // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST $_POST
        $Name = $_POST['Name'];
        $Price = $_POST['Price'];
        // $ImageProduce = $_POST['ImageProduce'];
        $ImageProduce = basename($_FILES['ImageProduce']['name']);
        $TargetFolders = "asset/img/product/";
        $TargetFile = $TargetFolders . $ImageProduce;

        if (move_uploaded_file($_FILES["ImageProduce"]["tmp_name"], $TargetFile)) {
            echo "<h1>File da dc upload</h1>";
        } else {
            echo "File chua dc upload";
        }
        
        $Amount = $_POST['Amount'];
        $Genre = $_POST['Genre'];
        $ProduceCode = $_POST['ProduceCode'];

        $sql = "UPDATE manageproduce SET  Name='$Name', Price='$Price', ImageProduce='$ImageProduce',  
                Amount='$Amount' ,Genre='$Genre',ProduceCode='$ProduceCode'  WHERE ID='" . $ID . "';";

        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location:Change.php');
    }
    ?>
</body>

</html>

