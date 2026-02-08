<?php 

include "../koneksi.php";



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Caerio AI</title>
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
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

        .register-container {
            background: white;
            padding: 4rem;
            border-radius: 32px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 520px;
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

        .register-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .register-header h2 {
            font-family: 'Work Sans', sans-serif;
            font-size: 2rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .register-header p {
            color: #6b7280;
            font-size: 1rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 2rem;
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

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Open Sans', sans-serif;
            background: #f9fafb;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #0891b2;
            background: white;
            box-shadow: 0 0 0 3px rgba(8, 145, 178, 0.1);
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin: 0;
            transform: scale(1.2);
        }

        .checkbox-group label {
            margin: 0;
            font-size: 0.9rem;
            line-height: 1.5;
            color: #6b7280;
        }

        .checkbox-group a {
            color: #0891b2;
            text-decoration: none;
            font-weight: 500;
        }

        .checkbox-group a:hover {
            color: #0ea5e9;
        }

        .register-button {
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

        .register-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(8, 145, 178, 0.4);
        }

        .register-button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
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

        .login-link {
            text-align: center;
            margin-top: 2rem;
        }

        .login-link p {
            color: #6b7280;
            font-size: 0.95rem;
        }

        .login-link a {
            color: #0891b2;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
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

        .password-strength {
            margin-top: 0.5rem;
            font-size: 0.85rem;
        }

        .strength-weak { color: #ef4444; }
        .strength-medium { color: #f59e0b; }
        .strength-strong { color: #10b981; }

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
            
            .register-container {
                padding: 2.5rem;
                margin: 1rem auto;
                border-radius: 24px;
            }

            .logo h1 {
                font-size: 2rem;
            }

            .register-header h2 {
                font-size: 1.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
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
        <a href="login.php">← Back to Login page</a>
    </div>

    <div class="register-container">
        <div class="logo">
            <h1>Register</h1>
            <p>Join the future of AI-powered oral healthcare</p>
        </div>


        <?php 

        function generateRandomID($length = 16) {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $charLength = strlen($characters);
            $randomID = '';

            for ($i = 0; $i < $length; $i++) {
                $randomID .= $characters[random_int(0, $charLength - 1)];
            }

            return $randomID;
        }

        if(isset($_POST['submit'])){
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $category = $_POST['category'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
            $pin = $_POST['pin'];

            $fullname1 = mysqli_real_escape_string($koneksi, $fullname);
            $username1 = mysqli_real_escape_string($koneksi, $username);
            $category1 = mysqli_real_escape_string($koneksi, $category);
            $password1 = sha1(mysqli_real_escape_string($koneksi, $password));
            $pin1 = mysqli_real_escape_string($koneksi, $pin);

            if($password == $confirmpassword){

                $iduser = generateRandomID();

                $insertdata = mysqli_query($koneksi, "INSERT INTO user (id_user, fullname, username, category, password, pin) VALUES ('$iduser', '$fullname1', '$username', '$category1', '$password1', '$pin1')");

                if($insertdata){
                    ?>
                    <script>
                        setTimeout(function(){
                            alert("Success registration.");
                            window.location.href = "login.php";
                        }, 1000);
                    </script>
                    <?php  
                }else{
                     ?>
                    <script>
                        setTimeout(function(){
                            alert("Failed registration. Try again.");
                            window.location.href = "register.php";
                        }, 1000);
                    </script>
                    <?php  
                }

            }else{
                ?>
                <script>
                    alert("Password not match. Try again");
                </script>
                <?php  
            }


        }


         ?>


        <form id="registerForm" method="POST">

            <div class="form-row">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Insert fullname" maxlength="50" required>
                </div>

                 <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Insert Username" maxlength="20" required>
                </div>
            </div>


            <div class="form-group">
                <label for="category">You are a : </label>
                <select id="category" name="category" required>
                    <option value="student">Student</option>
                    <option value="worker">Worker</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Insert Password" maxlength="50" required>
            </div>

            <div class="form-group">
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" id="confirpassword" name="confirmpassword" placeholder="Insert Confirm Password" maxlength="50" required>
            </div>

            <div class="form-group">
                <label for="pin">PIN</label>
                <input type="text" id="pin" name="pin" placeholder="ex:123456" maxlength="6" minlength="6" required>
            </div>

            <button type="submit" name="submit" class="register-button">Create Account</button>
        </form>


        <div class="divider">
            <span>or</span>
        </div>

        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>

</body>
<script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>
