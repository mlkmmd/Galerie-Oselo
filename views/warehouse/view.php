<?php require_once 'views/layout/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="card-title">Warehouse: <?= htmlspecialchars($warehouse['name']) ?></h1>
        <div>
            <a href="index.php?controller=warehouse&action=index" class="btn btn-secondary">Back to List</a>
            <a href="index.php?controller=warehouse&action=edit&id=<?= $warehouse['id'] ?>" class="btn">Edit Warehouse</a>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Warehouse Details</h2>
        </div>
        <div style="margin-bottom: 1.5rem;">
            <p><strong>Name:</strong> <?= htmlspecialchars($warehouse['name']) ?></p>
            <p><strong>Address:</strong> <?= nl2br(htmlspecialchars($warehouse['address'])) ?></p>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Artworks in this Warehouse</h2>
        </div>
        
        <?php if (empty($artworks)): ?>
            <p>No artworks in this warehouse.</p>
        <?php else: ?>
            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Artist</th>
                            <th>Year</th>
                            <th>Dimensions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($artworks as $artwork): ?>
                            <tr>
                                <td><?= htmlspecialchars($artwork['title']) ?></td>
                                <td><?= htmlspecialchars($artwork['artist']) ?></td>
                                <td><?= $artwork['year'] ?></td>
                                <td><?= $artwork['width'] ?> x <?= $artwork['height'] ?> cm</td>
                                <td>
                                    <div style="display: flex; gap: 0.5rem;">
                                        <a href="index.php?controller=artwork&action=edit&id=<?= $artwork['id'] ?>" class="btn btn-sm">Edit</a>
                                        <form action="index.php?controller=artwork&action=assign" method="POST" style="display: inline;">
                                            <input type="hidden" name="artwork_id" value="<?= $artwork['id'] ?>">
                                            <input type="hidden" name="warehouse_id" value="">
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to remove this artwork from the warehouse?')">Remove</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>

