<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Statistik</title>
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
            <a href="statistics.php" class="nav-btn active">Statistik</a>
            <a href="try-detection.php" class="nav-btn">Try Detection</a>
        </div>
    </div>

    <!-- Main Container -->
    <div class="container">
        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total User</div>
                <div class="stat-value">8</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Downloads</div>
                <div class="stat-value">12</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">User Aktif</div>
                <div class="stat-value">6</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Try Detection Aktif</div>
                <div class="stat-value">5</div>
            </div>
        </div>

    </div>

    <script src="script.js"></script>
</body>
</html>