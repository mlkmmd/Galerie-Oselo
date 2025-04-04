<?php require_once 'views/layout/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="card-title">Warehouses</h1>
        <a href="index.php?controller=warehouse&action=add" class="btn">Add New Warehouse</a>
    </div>
    
    <?php if (empty($warehouses)): ?>
        <p>No warehouses found.</p>
    <?php else: ?>
        <div style="overflow-x: auto;">
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
                                <a href="index.php?controller=warehouse&action=view&id=<?= $warehouse['id'] ?>">
                                    <?= $warehouse['artwork_count'] ?> artwork(s)
                                </a>
                            </td>
                            <td>
                                <div style="display: flex; gap: 0.5rem;">
                                    <a href="index.php?controller=warehouse&action=edit&id=<?= $warehouse['id'] ?>" class="btn btn-sm">Edit</a>
                                    <a href="index.php?controller=warehouse&action=delete&id=<?= $warehouse['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this warehouse? All artworks will be unassigned.')">Delete</a>
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

