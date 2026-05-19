<?php
    session_start();
    
    // Redirect if already logged in
    if(isset($_SESSION["u_id"])){
        header("Location: index.php");
        exit;
    }

    if(isset($_POST["submit"])){
        include("db_config.php");
        $mobile   = $_POST["mobile"] ?? '';
        $password = $_POST["password"] ?? '';
        
        $query = "select * from users where mobile = ?";
        $result = $con->execute_query($query,[$mobile]);
        if($result && $result->num_rows>0){
            $row = $result->fetch_assoc();
            echo password_verify($password,$row["password"]);
            
            if(password_verify($password,$row["password"])){
                $_SESSION["u_id"] =  $row["id"];
                header("Location: index.php");
                exit;
            }
            else{
                ?>
                <script>
                    alert("incorrect password");
                    window.location.href = "login.php";
                </script>
                <?php
                exit;
                }
        }
        else{
            ?><script>
                alert("You are not registered");
                window.location.href = "register.php";
            </script> <?php
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Stay - Sign In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', Arial, sans-serif;
        }

        body {
            background: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .auth-container {
            background: #fff;
            width: 100%;
            max-width: 450px;
            padding: 40px 30px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .auth-header h2 {
            font-size: 28px;
            color: #111;
            margin-bottom: 8px;
        }

        .auth-header p {
            font-size: 14px;
            color: #666;
        }

        .form-group {
            margin-bottom: 22px;
            position: relative;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 16px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 15px 14px 45px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: purple;
            box-shadow: 0 0 0 3px rgba(128, 0, 128, 0.1);
        }

        .auth-btn {
            width: 100%;
            padding: 14px;
            background: purple;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 10px;
        }

        .auth-btn:hover {
            background: #4a004a;
        }

        .auth-footer {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #555;
        }

        .auth-footer a {
            color: purple;
            text-decoration: none;
            font-weight: 600;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 480px) {
            .auth-container {
                padding: 30px 20px;
            }
            .auth-header h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

<div class="auth-container">
    <div class="auth-header">
        <h2>Welcome Back</h2>
        <p>Sign in to manage your bookings</p>
    </div>

    <form action="" method="POST">
        <div class="form-group">
            <label for="mobile">Mobile Number</label>
            <div class="input-wrapper">
                <i class="fa-solid fa-phone"></i>
                <input type="tel" id="mobile" name="mobile" placeholder="Enter registered mobile number" required>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-wrapper">
                <i class="fa-solid fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
        </div>

        <button type="submit" name="submit" class="auth-btn">Sign In</button>
    </form>

    <div class="auth-footer">
        Don't have an account yet? <a href="register.php">Register Now</a>
    </div>
</div>

</body>
</html>