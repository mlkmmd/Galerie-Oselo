<?php require_once 'views/layout/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="card-title">Artworks</h1>
        <a href="index.php?controller=artwork&action=add" class="btn">Add New Artwork</a>
    </div>
    
    <?php if (empty($artworks)): ?>
        <p>No artworks found.</p>
    <?php else: ?>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Year</th>
                        <th>Dimensions</th>
                        <th>Warehouse</th>
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
                                <?php if (!empty($artwork['warehouse_id'])): ?>
                                    <a href="index.php?controller=warehouse&action=view&id=<?= $artwork['warehouse_id'] ?>">
                                        <?= htmlspecialchars($artwork['warehouse_name']) ?>
                                    </a>
                                <?php else: ?>
                                    <em>Not assigned</em>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div style="display: flex; gap: 0.5rem;">
                                    <a href="index.php?controller=artwork&action=edit&id=<?= $artwork['id'] ?>" class="btn btn-sm">Edit</a>
                                    <a href="index.php?controller=artwork&action=delete&id=<?= $artwork['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this artwork?')">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php require_once 'views/layout/footer.php'; ?>

