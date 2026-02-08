<?php

include "../koneksi.php";

session_start();


if(!isset($_SESSION['username'])){
    header("location:../user/login.php");
}

if(isset($_SESSION["username"])){
    $usernamesession = $_SESSION['username'];
}



 ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Data User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <h1>📊 Dashboard Admin</h1>
            <button class="logout-btn" onclick="handleLogout()">
                Logout
            </button>
        </div>
    </div>

    <!-- Navigation -->
    <div class="nav">
        <div class="nav-content">
            <a href="dashboard.php" class="nav-btn active">Data User</a>
            <a href="downloads.php" class="nav-btn">Downloads</a>
            <a href="statistics.php" class="nav-btn">Statistik</a>
            <a href="try-detection.php" class="nav-btn">Try Detection</a>
        </div>
    </div>

    <!-- Main Container -->
    <div class="container">
        <!-- Section: Data User -->
        <div class="card">
            <h2 class="card-title">Data User Terdaftar</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fullname</th>
                            <th>Username</th>
                            <th>Category</th>
                            <th>Join</th>
                        </tr>
                    </thead>
                    <tbody>
                       

                       <?php 

                       $takedatauser = mysqli_query($koneksi, "SELECT * FROM user");
                       if(mysqli_num_rows($takedatauser)>0){
                            while($datauser = mysqli_fetch_array($takedatauser)){
                                $iduser = $datauser['id_user'];
                                $fullname = $datauser['fullname'];
                                $username = $datauser['username'];
                                $category = $datauser['category'];
                                $createdat = $datauser['created_at'];

                                ?>

                                <tr>
                                    <td><?php echo $iduser; ?></td>
                                    <td><?php echo $fullname; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $category; ?></td>
                                    <td><?php echo $createdat; ?></td>
                                </tr>

                                <?php 

                            }
                       }

                        ?>

                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>