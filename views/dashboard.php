<?php include 'views/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="card-title">Dashboard</h1>
    </div>
    
    <div class="dashboard-stats">
        <div class="stat-card">
            <h3><?= $artworkCount ?></h3>
            <p>Total Artworks</p>
        </div>
        
        <div class="stat-card">
            <h3><?= $warehouseCount ?></h3>
            <p>Total Warehouses</p>
        </div>
        
        <div class="stat-card">
            <h3><?= $unassignedCount ?></h3>
            <p>Unassigned Artworks</p>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Quick Actions</h2>
        </div>
        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <a href="index.php?page=artwork&action=add" class="btn">Add New Artwork</a>
            <a href="index.php?page=warehouse&action=add" class="btn">Add New Warehouse</a>
            <a href="index.php?page=artwork&action=index" class="btn btn-secondary">View All Artworks</a>
            <a href="index.php?page=warehouse&action=index" class="btn btn-secondary">View All Warehouses</a>
        </div>
    </div>
</div>

<?php include 'views/footer.php'; ?>

