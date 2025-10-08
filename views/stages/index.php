<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Module Stages</h1>

<!-- Barre de recherche et bouton Ajouter -->
<form method="GET" action="index.php" style="margin-bottom:15px;">
    <input type="hidden" name="module" value="stages">
    <input type="text" name="q" placeholder="Rechercher un stage ou un élève..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
    <button type="submit">🔍 Rechercher</button>
    <a href="index.php?module=stages&action=add" class="btn" style="margin-left:10px;">➕ Ajouter un stage</a>
</form>

<!-- Liste des stages -->
<?php if (!empty($stages)): ?>
    <table border="1" cellpadding="5">
        <tr>
            <th>Titre</th>
            <th>Entreprise</th>
            <th>Description</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Élève</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($stages as $stage): ?>
            <tr>
                <td><?= htmlspecialchars($stage['titre']) ?></td>
                <td><?= htmlspecialchars($stage['entreprise']) ?></td>
                <td><?= htmlspecialchars($stage['description']) ?></td>
                <td><?= htmlspecialchars($stage['date_debut']) ?></td>
                <td><?= htmlspecialchars($stage['date_fin']) ?></td>
                <td><?= htmlspecialchars($stage['eleve_nom'] ?? '-') ?> <?= htmlspecialchars($stage['eleve_prenom'] ?? '') ?></td>
                <td>
                    <a href="index.php?module=stages&action=edit&id=<?= $stage['id'] ?>">✏️ Editer</a>
                    |
                    <a href="index.php?module=stages&action=delete&id=<?= $stage['id'] ?>" onclick="return confirm('Supprimer ce stage ?');">🗑️ Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Aucun stage trouvé.</p>
<?php endif; ?>

<?php include __DIR__ . "/../layout/footer.php"; ?>
