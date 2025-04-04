<?php include 'views/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="card-title"><?= isset($artwork) ? 'Edit Artwork' : 'Add New Artwork' ?></h1>
        <a href="index.php?page=artwork&action=index" class="btn btn-secondary">Back to List</a>
    </div>
    
    <form action="index.php?page=artwork&action=<?= isset($artwork) ? 'update' : 'store' ?>" method="POST">
        <?php if (isset($artwork)): ?>
            <input type="hidden" name="id" value="<?= $artwork['id'] ?>">
        <?php endif; ?>
        
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="<?= isset($artwork) ? htmlspecialchars($artwork['title']) : '' ?>" required>
        </div>
        
        <div class="form-group">
            <label for="artist">Artist</label>
            <input type="text" id="artist" name="artist" class="form-control" value="<?= isset($artwork) ? htmlspecialchars($artwork['artist']) : '' ?>" required>
        </div>
        
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" id="year" name="year" class="form-control" value="<?= isset($artwork) ? $artwork['year'] : '' ?>" min="1" required>
        </div>
        
        <div style="display: flex; gap: 1rem;">
            <div class="form-group" style="flex: 1;">
                <label for="width">Width (cm)</label>
                <input type="number" id="width" name="width" class="form-control" value="<?= isset($artwork) ? $artwork['width'] : '' ?>" min="1" required>
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label for="height">Height (cm)</label>
                <input type="number" id="height" name="height" class="form-control" value="<?= isset($artwork) ? $artwork['height'] : '' ?>" min="1" required>
            </div>
        </div>
        
        <div class="form-group">
            <label for="warehouse_id">Warehouse (optional)</label>
            <select id="warehouse_id" name="warehouse_id" class="form-control">
                <option value="">-- Not assigned --</option>
                <?php foreach ($warehouses as $warehouse): ?>
                    <option value="<?= $warehouse['id'] ?>" <?= isset($artwork) && $artwork['warehouse_id'] == $warehouse['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($warehouse['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn"><?= isset($artwork) ? 'Update Artwork' : 'Add Artwork' ?></button>
        </div>
    </form>
</div>

<?php include 'views/footer.php'; ?>

