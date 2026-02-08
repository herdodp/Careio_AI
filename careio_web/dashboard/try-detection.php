<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Try Detection</title>
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
            <a href="downloads.php" class="nav-btn">Downloads</a>
            <a href="statistics.php" class="nav-btn">Statistik</a>
            <a href="try-detection.php" class="nav-btn active">Try Detection</a>
        </div>
    </div>

    <!-- Main Container -->
    <div class="container">
        <!-- Try Detection Table -->
        <div class="card">
            <h2 class="card-title">Pengguna Fitur Try Detection</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Tanggal Penggunaan</th>
                            <th>Jumlah Percobaan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data dummy - nanti bisa diganti dengan PHP loop -->
                        <tr>
                            <td>1</td>
                            <td>ahmad_123</td>
                            <td>ahmad@email.com</td>
                            <td>07 Feb 2025 10:15</td>
                            <td>12</td>
                            <td><span class="badge badge-success">Aktif</span></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>