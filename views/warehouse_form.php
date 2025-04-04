<?php include 'views/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="card-title"><?= isset($warehouse) ? 'Edit Warehouse' : 'Add New Warehouse' ?></h1>
        <a href="index.php?page=warehouse&action=index" class="btn btn-secondary">Back to List</a>
    </div>
    
    <form action="index.php?page=warehouse&action=<?= isset($warehouse) ? 'update' : 'store' ?>" method="POST">
        <?php if (isset($warehouse)): ?>
            <input type="hidden" name="id" value="<?= $warehouse['id'] ?>">
        <?php endif; ?>
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= isset($warehouse) ? htmlspecialchars($warehouse['name']) : '' ?>" required>
        </div>
        
        <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address" class="form-control" rows="3" required><?= isset($warehouse) ? htmlspecialchars($warehouse['address']) : '' ?></textarea>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn"><?= isset($warehouse) ? 'Update Warehouse' : 'Add Warehouse' ?></button>
        </div>
    </form>
</div>

<?php include 'views/footer.php'; ?>

