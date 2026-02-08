<?php

include "../koneksi.php";

session_start();


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - Caerio AI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: #4b5563;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            min-height: 100vh;
            padding: 2rem 0;
            position: relative;
        }

        /* Background pattern */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%230891b2' fill-opacity='0.03'%3E%3Cpath d='M50 50c0-13.8-11.2-25-25-25s-25 11.2-25 25 11.2 25 25 25 25-11.2 25-25zm25 0c0-13.8-11.2-25-25-25s-25 11.2-25 25 11.2 25 25 25 25-11.2 25-25z'/%3E%3C/g%3E%3C/svg%3E") repeat;
        }

        .login-container {
            background: white;
            padding: 4rem;
            border-radius: 32px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 480px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            animation: fadeInUp 0.8s ease;
        }

        .logo {
            text-align: center;
            margin-bottom: 3rem;
        }

        .logo h1 {
            font-family: 'Work Sans', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: #0891b2;
            letter-spacing: -0.02em;
            margin-bottom: 0.5rem;
        }

        .logo p {
            color: #6b7280;
            font-size: 1rem;
        }

        .login-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .login-header h2 {
            font-family: 'Work Sans', sans-serif;
            font-size: 2rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: #6b7280;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.8rem;
            font-weight: 600;
            color: #1f2937;
            font-size: 0.95rem;
        }

        .form-group input {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Open Sans', sans-serif;
            background: #f9fafb;
        }

        .form-group input:focus {
            outline: none;
            border-color: #0891b2;
            background: white;
            box-shadow: 0 0 0 3px rgba(8, 145, 178, 0.1);
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 2rem;
        }

        .forgot-password a {
            color: #0891b2;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #0ea5e9;
        }

        .login-button {
            width: 100%;
            background: linear-gradient(135deg, #0891b2, #0ea5e9);
            color: white;
            padding: 18px;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(8, 145, 178, 0.3);
            margin-bottom: 2rem;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(8, 145, 178, 0.4);
        }

        .divider {
            text-align: center;
            margin: 2rem 0;
            position: relative;
            color: #9ca3af;
            font-size: 0.9rem;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e5e7eb;
            z-index: 1;
        }

        .divider span {
            background: white;
            padding: 0 1rem;
            position: relative;
            z-index: 2;
        }

        .register-link {
            text-align: center;
            margin-top: 2rem;
        }

        .register-link p {
            color: #6b7280;
            font-size: 0.95rem;
        }

        .register-link a {
            color: #0891b2;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .register-link a:hover {
            color: #0ea5e9;
        }

        .back-home {
            position: absolute;
            top: 2rem;
            left: 2rem;
            z-index: 3;
        }

        .back-home a {
            color: #0891b2;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.3s ease;
        }

        .back-home a:hover {
            color: #0ea5e9;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem 0;
            }
            
            .login-container {
                padding: 2.5rem;
                margin: 1rem auto;
                border-radius: 24px;
            }

            .logo h1 {
                font-size: 2rem;
            }

            .login-header h2 {
                font-size: 1.5rem;
            }

            .back-home {
                top: 1rem;
                left: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="back-home">
        <a href="../index.php">← Back to Home</a>
    </div>

    <div class="login-container">
        <div class="logo">
            <h1>Change Password</h1>
        </div>

        <?php 

        if(isset($_POST['submit'])){
            $pin = $_POST['pin'];
            $newpassword = $_POST['newpassword'];
            $confirmnewpassword = $_POST['confirmnewpassword'];

            $pin1 = mysqli_real_escape_string($koneksi, $pin);
            $newpassword1 = sha1(mysqli_real_escape_string($koneksi, $newpassword));
            $confirmnewpassword1 = sha1(mysqli_real_escape_string($koneksi, $confirmnewpassword));

            $takedata = mysqli_query($koneksi, "SELECT * FROM user WHERE pin = '$pin1'");
            if(mysqli_num_rows($takedata) > 0){
               
                if($newpassword1 == $confirmnewpassword1){


                    $updatepassword = mysqli_query($koneksi, "UPDATE user set password = '$newpassword1' WHERE pin = '$pin1'");

                    if($updatepassword){
                        ?>
                        <script>
                            alert("Success to update password");
                            setTimeout(function(){
                                window.location.href = "login.php";
                            }, 1000);
                        </script>
                        <?php  
                    }else{
                        ?>
                        <script>
                            alert("Failed to update password. Try again");
                            setTimeout(function(){
                                window.location.href = "forgotpassword.php";
                            }, 1000);
                        </script>
                        <?php  
                    }

                    }else{
                        ?>
                        <script>
                            alert("password not match. Try again");
                            setTimeout(function(){
                                window.location.href = "forgotpassword.php";
                            }, 1000);
                        </script>
                        <?php  
                    }

            }else{
                ?>
                <script>
                    alert("PIN wrong input. Try again");
                    setTimeout(function(){
                        window.location.href = "forgopassword.php";
                    }, 1000);
                </script>
                <?php  
            }
        }


         ?>


        <form id="loginForm" method="POST">
            <div class="form-group">
                <label for="pin">PIN</label>
                <input type="text" id="pin" name="pin" maxlength="6" minlength="6" required>
            </div>

            <div class="form-group">
                <label for="newpassword">New Password</label>
                <input type="password" id="newpassword" name="newpassword" maxlength="50" minlength="1" required>
            </div>

            <div class="form-group">
                <label for="confirmpassword">Confirm New Password</label>
                <input type="password" id="confirmpassword" name="confirmnewpassword" maxlength="50" minlength="1" required>
            </div>

            <button type="submit" name="submit" class="login-button">Change Password</button>
        </form>

       
    </div>

  
</body>
<script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>
