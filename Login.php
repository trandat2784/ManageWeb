<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .boxcenter {
            width: 500px;
            margin: 0 auto;
        }

        button {
            background-color: orange;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 2px 0 2px 0;
        }

        img.avatar {
            width: 90%;
            HEIGHT: 80%;
            border-radius: 5%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="boxcenter">
        <h2 style="text-align:center">Form đăng nhập</h2>

        <form action="login.php" method="post">
            <div class="imgcontainer">
                <img src="../picture/utt.jpg" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Tên đăng nhập</b></label>
                <input type="text" placeholder="Enter Username" name="Username" required>

                <label for="psw"><b>Mật khẩu</b></label>
                <input type="password" placeholder="Enter Password" name="Password" required>
                <button type="submit" name="login">ĐĂNG NHẬP</button>

            </div>
            <p style="text-align:center;"><a href="Home_Default.php">Quay về trang xem không cần đăng nhập</a></p>
    </div>
    </form>
    </div>



    <?php
    session_start();
    if (isset($_POST["login"])) {
        $Username = $_POST["Username"];
        $Password = $_POST["Password"];
        $conn = mysqli_connect('localhost:3309', 'root', '', 'manageproduct');
        $sqlselect = "select * from `login`  WHERE Username='" . $Username . "' and Password = '" . $Password . "';";
        $resultSelect = mysqli_query($conn, $sqlselect);
        $user = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
        if (!empty($user)) {
            if ($user['Role'] == '1') {
                //$tb="Tài khoản này có quyền admin";
                $_SESSION['s_user'] = $user;
                header('location: Home_User.php');
            } else {
                //$tb="Tài khoản này có quyền sinh viên";
                $_SESSION['s_user'] = $user;
                header('location: Home_User.php');
            }
        } else {
            $tb = "Tài khoản này không tồn tại";
        }

    }
    ?>

</body>

</html>