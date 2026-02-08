<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Downloads</title>
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
            <a href="dashboard.php" class="nav-btn">Data User</a>
            <a href="downloads.php" class="nav-btn active">Downloads</a>
            <a href="statistics.php" class="nav-btn">Statistik</a>
            <a href="try-detection.php" class="nav-btn">Try Detection</a>
        </div>
    </div>

    <!-- Main Container -->
    <div class="container">
        <!-- Download Type 1 -->
        <div class="card">
            <h2 class="card-title">Download Dokumen A</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Nama File</th>
                            <th>Tanggal Download</th>
                            <th>Ukuran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data dummy - nanti bisa diganti dengan PHP loop -->

                        <tr>
                            <td>1</td>
                            <td>ahmad_123</td>
                            <td>dokumen_a_v1.pdf</td>
                            <td>05 Feb 2025 10:30</td>
                            <td>2.5 MB</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

   
    </div>

    <script src="script.js"></script>
</body>
</html>