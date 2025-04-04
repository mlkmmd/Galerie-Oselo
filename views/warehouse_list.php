<?php include 'views/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="card-title">Warehouses</h1>
        <a href="index.php?page=warehouse&action=add" class="btn">Add New Warehouse</a>
    </div>
    
    <?php if (empty($warehouses)): ?>
        <p>No warehouses found.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Artworks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($warehouses as $warehouse): ?>
                    <tr>
                        <td><?= htmlspecialchars($warehouse['name']) ?></td>
                        <td><?= htmlspecialchars($warehouse['address']) ?></td>
                        <td>
                            <a href="index.php?page=warehouse&action=view&id=<?= $warehouse['id'] ?>">
                                <?= $warehouse['artwork_count'] ?> artwork(s)
                            </a>
                        </td>
                        <td>
                            <a href="index.php?page=warehouse&action=edit&id=<?= $warehouse['id'] ?>" class="btn btn-sm">Edit</a>
                            <a href="index.php?page=warehouse&action=delete&id=<?= $warehouse['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this warehouse? All artworks will be unassigned.')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php include 'views/footer.php'; ?>

