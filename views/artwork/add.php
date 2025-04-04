<?php require_once 'views/layout/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="card-title">Add New Artwork</h1>
        <a href="index.php?controller=artwork&action=index" class="btn btn-secondary">Back to List</a>
    </div>
    
    <form action="index.php?controller=artwork&action=store" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="artist">Artist</label>
            <input type="text" id="artist" name="artist" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" id="year" name="year" class="form-control" min="1" required>
        </div>
        
        <div style="display: flex; gap: 1rem;">
            <div class="form-group" style="flex: 1;">
                <label for="width">Width (cm)</label>
                <input type="number" id="width" name="width" class="form-control" min="1" required>
            </div>
            
            <div class="form-group" style="flex: 1;">
                <label for="height">Height (cm)</label>
                <input type="number" id="height" name="height" class="form-control" min="1" required>
            </div>
        </div>
        
        <div class="form-group">
            <label for="warehouse_id">Warehouse (optional)</label>
            <select id="warehouse_id" name="warehouse_id" class="form-control">
                <option value="">-- Not assigned --</option>
                <?php foreach ($warehouses as $warehouse): ?>
                    <option value="<?= $warehouse['id'] ?>"><?= htmlspecialchars($warehouse['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn">Add Artwork</button>
        </div>
    </form>
</div>

<?php require_once 'views/layout/footer.php'; ?>

