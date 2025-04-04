<?php require_once 'views/layout/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="card-title">Add New Warehouse</h1>
        <a href="index.php?controller=warehouse&action=index" class="btn btn-secondary">Back to List</a>
    </div>
    
    <form action="index.php?controller=warehouse&action=store" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn">Add Warehouse</button>
        </div>
    </form>
</div>

<?php require_once 'views/layout/footer.php'; ?>

