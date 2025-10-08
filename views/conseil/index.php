<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Module Conseil</h1>

<form method="GET" action="index.php" style="margin-bottom:15px;">
    <input type="hidden" name="module" value="conseil">
    <input type="text" name="q" placeholder="Rechercher un conseil ou une classe..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
    <button type="submit">🔍 Rechercher</button>
    <a href="index.php?module=conseil&action=add" class="btn" style="margin-left:10px;">➕ Ajouter un conseil</a>
</form>

<?php if (!empty($conseils)): ?>
    <table border="1" cellpadding="5">
        <tr>
            <th>Titre</th>
            <th>Date</th>
            <th>Description</th>
            <th>Classe</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($conseils as $c): ?>
            <tr>
                <td><?= htmlspecialchars($c['titre']) ?></td>
                <td><?= htmlspecialchars($c['date_conseil']) ?></td>
                <td><?= htmlspecialchars($c['description']) ?></td>
                <td><?= htmlspecialchars($c['classe_nom'] ?? '-') ?></td>
                <td>
                    <a href="index.php?module=conseil&action=edit&id=<?= $c['id'] ?>">✏️ Editer</a>
                    |
                    <a href="index.php?module=conseil&action=delete&id=<?= $c['id'] ?>" onclick="return confirm('Supprimer ce conseil ?');">🗑️ Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Aucun conseil trouvé.</p>
<?php endif; ?>

<?php include __DIR__ . "/../layout/footer.php"; ?>
