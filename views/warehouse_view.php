<?php include 'views/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="card-title">Warehouse: <?= htmlspecialchars($warehouse['name']) ?></h1>
        <div>
            <a href="index.php?page=warehouse&action=index" class="btn btn-secondary">Back to List</a>
            <a href="index.php?page=warehouse&action=edit&id=<?= $warehouse['id'] ?>" class="btn">Edit Warehouse</a>
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
                                <a href="index.php?page=artwork&action=edit&id=<?= $artwork['id'] ?>" class="btn btn-sm">Edit</a>
                                <form action="index.php?page=artwork&action=update" method="POST" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $artwork['id'] ?>">
                                    <input type="hidden" name="title" value="<?= htmlspecialchars($artwork['title']) ?>">
                                    <input type="hidden" name="artist" value="<?= htmlspecialchars($artwork['artist']) ?>">
                                    <input type="hidden" name="year" value="<?= $artwork['year'] ?>">
                                    <input type="hidden" name="width" value="<?= $artwork['width'] ?>">
                                    <input type="hidden" name="height" value="<?= $artwork['height'] ?>">
                                    <input type="hidden" name="warehouse_id" value="">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to remove this artwork from the warehouse?')">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<?php include 'views/footer.php'; ?>

