<?php include 'views/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="card-title">Artworks</h1>
        <a href="index.php?page=artwork&action=add" class="btn">Add New Artwork</a>
    </div>
    
    <?php if (empty($artworks)): ?>
        <p>No artworks found.</p>
    <?php else: ?>
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
                                <a href="index.php?page=warehouse&action=view&id=<?= $artwork['warehouse_id'] ?>">
                                    <?= htmlspecialchars($artwork['warehouse_name']) ?>
                                </a>
                            <?php else: ?>
                                <em>Not assigned</em>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="index.php?page=artwork&action=edit&id=<?= $artwork['id'] ?>" class="btn btn-sm">Edit</a>
                            <a href="index.php?page=artwork&action=delete&id=<?= $artwork['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this artwork?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php include 'views/footer.php'; ?>

