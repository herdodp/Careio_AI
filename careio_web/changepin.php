<?php 

include "koneksi.php";
session_start();



if(!isset($_SESSION['username'])){
    header("location:user/login.php");
}



if(isset($_SESSION['username'])){
    $usernamesession = $_SESSION['username'];
}



if(isset($_POST['submit'])){

    $newpin = $_POST['newpin'];
    $repeatnewpin = $_POST['repeatnewpin'];


    //sanitize 1
    $newpin1 = mysqli_real_escape_string($koneksi, $newpin);
    $repeatnewpin1 = mysqli_real_escape_string($koneksi, $repeatnewpin);



    //cek match pin
    if($newpin1 == $repeatnewpin1){

        $insertdata = mysqli_query($koneksi, "UPDATE user SET pin = '$newpin1' WHERE username = '$usernamesession'");

        if($insertdata){
            ?>
            <script>
                
                setTimeout(function(){
                    alert("Berhasil menguban PIN. kembali ke halaman utama dalam 2 detik");
                    window.location.href = "index.php";
                }, 1000);

            </script>
            <?php 
        }



    }else{
        ?>
        <script>
            setTimeout(function(){
                alert("PIN Tidak sesuai. Ulangi lagi");
                window.location.href = "index.php";
            }, 1000);
        </script>
        <?php  
    }


    

}


 ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <title>Profile - Caerio AI</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #e8f4f8 0%, #f0f8ff 100%);
            min-height: 100vh;
        }

        /* Header */
        header {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            padding: 1.2rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .logo-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #ff6b9d 0%, #c471ed 50%, #12c2e9 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            font-size: 1.2rem;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: bold;
            color: #12c2e9;
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            align-items: center;
            list-style: none;
        }

        .nav-links a {
            color: #e0e0e0;
            text-decoration: none;
            transition: color 0.3s;
            font-size: 1rem;
        }

        .nav-links a:hover {
            color: #12c2e9;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .user-greeting {
            background: #12c2e9;
            color: white;
            padding: 0.65rem 1.5rem;
            border-radius: 25px;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .logout-btn {
            color: #ff6b6b;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
            font-size: 1rem;
        }

        .logout-btn:hover {
            color: #ff5252;
        }

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 2rem;
        }

        .page-title {
            font-size: 2.5rem;
            color: #1a1a1a;
            margin-bottom: 2rem;
            font-weight: 800;
        }

        .profile-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 2.5rem;
            margin-bottom: 3rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .profile-avatar {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6b9d 0%, #c471ed 50%, #12c2e9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            color: white;
            font-weight: bold;
            box-shadow: 0 8px 25px rgba(18, 194, 233, 0.3);
            flex-shrink: 0;
        }

        .profile-info h1 {
            font-size: 2.2rem;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .profile-role {
            color: #12c2e9;
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .profile-bio {
            color: #666;
            font-size: 1rem;
            line-height: 1.6;
        }

        .section-title {
            font-size: 1.5rem;
            color: #1a1a1a;
            margin-bottom: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-title::before {
            content: '';
            width: 4px;
            height: 24px;
            background: linear-gradient(135deg, #ff6b9d 0%, #c471ed 50%, #12c2e9 100%);
            border-radius: 2px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .info-item {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 1.5rem;
            border-radius: 12px;
            border-left: 4px solid #12c2e9;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .info-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .info-label {
            color: #666;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .info-value {
            color: #1a1a1a;
            font-size: 1.1rem;
            font-weight: 500;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: linear-gradient(135deg, #12c2e9 0%, #0fa3c7 100%);
            padding: 2rem;
            border-radius: 15px;
            color: white;
            text-align: center;
            box-shadow: 0 5px 20px rgba(18, 194, 233, 0.3);
            transition: transform 0.3s;
        }

        .stat-card:nth-child(2) {
            background: linear-gradient(135deg, #c471ed 0%, #a855d4 100%);
            box-shadow: 0 5px 20px rgba(196, 113, 237, 0.3);
        }

        .stat-card:nth-child(3) {
            background: linear-gradient(135deg, #ff6b9d 0%, #e74c84 100%);
            box-shadow: 0 5px 20px rgba(255, 107, 157, 0.3);
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
            font-weight: 500;
        }

        .activity-list {
            list-style: none;
        }

        .activity-item {
            background: #f8f9fa;
            padding: 1.2rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            border-left: 3px solid #12c2e9;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background 0.3s;
        }

        .activity-item:hover {
            background: #e9ecef;
        }

        .activity-text {
            color: #1a1a1a;
            font-size: 1rem;
        }

        .activity-date {
            color: #666;
            font-size: 0.9rem;
        }

        .btn-edit {
            background: linear-gradient(135deg, #12c2e9 0%, #0fa3c7 100%);
            color: white;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(18, 194, 233, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(18, 194, 233, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #12c2e9;
            border: 2px solid #12c2e9;
            padding: 1rem 2.5rem;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            margin-left: 1rem;
        }

        .btn-secondary:hover {
            background: #12c2e9;
            color: white;
        }

        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .info-grid,
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .page-title {
                font-size: 2rem;
            }

            .activity-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <?php 

    if(isset($_SESSION['username'])){
        ?>

        <!-- open navbar before login -->
        <header>
            <nav>
               <div style="display: flex; flex-direction: row; align-items: center; background-color: black; border-radius: 10px; border:none; padding-top: 5px; padding-bottom: 5px; padding-left: 10px; padding-right: 10px;">
                    <img src="img/logo.png" style="width: 70px; height: 70px; margin-right: 10px;">
                    <a href="index.php" class="logo" style="text-decoration: none;">Caerio AI</a>
                </div>
                <ul class="nav-links" id="navLinks">
                    <li style="margin-left: 10px;"><a href="index.php">Home</a></li>
                    <li style="margin-left: 10px;"><a href="index.php#about">About</a></li>
                    <li style="margin-left: 10px;"><a href="index.php#download">Download Model</a></li>
                    <li style="margin-left: 10px;"><a href="trydetection.php"><b>Try it !</b></a></li>
                    <li style="margin-left: 10px;"><a href="profil.php" class="nav-cta">Hi, <?php echo $_SESSION['username']; ?></a> <a href="user/logout.php" style="text-decoration: none; color: red; font-weight: bolder;">Logout</a></li>
                    
                </ul>
                <div class="mobile-menu" id="mobileMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>
        </header>
         <!-- close navbar before login -->


        <?php  
   }else{
        ?>

        <!-- open navbar before login -->
        <header>
            <nav>
                <div style="display: flex; flex-direction: row; align-items: center; background-color: black; border-radius: 10px; border:none; padding-top: 5px; padding-bottom: 5px; padding-left: 10px; padding-right: 10px;">
                    <img src="img/logo.png" style="width: 70px; height: 70px; margin-right: 10px;">
                    <a href="#home" class="logo">Caerio AI</a>
                </div>
                <ul class="nav-links" id="navLinks">
                    <li style="margin-left: 10px;"><a href="index.php">Home</a></li>
                    <li style="margin-left: 10px;"><a href="index.php#about">About</a></li>
                    <li style="margin-left: 10px;"><a href="index.php#download">Download Model</a></li>
                    <li style="margin-left: 10px;"><a href="trydetection.php"><b>Try it !</b></a></li>
                    <li style="margin-left: 10px;"><a href="user/login.php" class="nav-cta">Login/Register</a></li> 
                </ul>
                <div class="mobile-menu" id="mobileMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>
        </header>
        <!-- close navbar before login -->


        <?php  
    }
     ?>

    <!-- Main Content -->

    <?php 

    $datauser = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$usernamesession'");
   
        while($data = mysqli_fetch_array($datauser)){
            $pindb = $data['pin'];
        }
    

     ?>

     <form method="POST">
         
     
    <div class="container">
        <h1 class="page-title">Change PIN</h1>

        <!-- Profile Card -->
        <div class="profile-card">
    

            <!-- Personal Information -->
            <h2 class="section-title">Informasi Pribadi</h2>
            <div class="info-grid">


                <div class="info-item">
                    <div class="info-label">Current PIN</div>
                    <div class="info-value"><?php echo $pindb; ?></div>
                </div>

                <div class="info-item">
                    <div class="info-label">Insert New PIN</div>
                    <div class="info-value"><input type="text" name="newpin" required></div>
                </div>

                <div class="info-item">
                    <div class="info-label">Repeat New PIN</div>
                    <div class="info-value"><input type="text" name="repeatnewpin" required></div>
                </div>



            </div>


        

            <!-- Action Buttons -->
            <div class="button-group">
                <input type="submit" name="submit" value="Change PIN" class="btn-edit">
            </div>

            </form>



    

        </div>
    </div>
</body>
</html>