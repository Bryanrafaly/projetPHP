<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Module Enseignants</h1>

<!-- Barre de recherche et bouton Ajouter -->
<form method="GET" action="index.php" style="margin-bottom:15px;">
    <input type="hidden" name="module" value="enseignants">
    <input type="text" name="q" placeholder="Rechercher un enseignant..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
    <button type="submit">🔍 Rechercher</button>
    <a href="index.php?module=enseignants&action=add" class="btn" style="margin-left:10px;">➕ Ajouter un enseignant</a>
</form>

<!-- Liste des enseignants -->
<?php if (!empty($enseignants)): ?>
    <table border="1" cellpadding="5">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Matière</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($enseignants as $ens): ?>
            <tr>
                <td><?= htmlspecialchars($ens['nom']) ?></td>
                <td><?= htmlspecialchars($ens['prenom']) ?></td>
                <td><?= htmlspecialchars($ens['email']) ?></td>
                <td><?= htmlspecialchars($ens['telephone']) ?></td>
                <td><?= htmlspecialchars($ens['matiere']) ?></td>
                <td>
                    <a href="index.php?module=enseignants&action=edit&id=<?= $ens['id'] ?>">✏️ Editer</a>
                    |
                    <a href="index.php?module=enseignants&action=delete&id=<?= $ens['id'] ?>" onclick="return confirm('Supprimer cet enseignant ?');">🗑️ Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Aucun enseignant trouvé.</p>
<?php endif; ?>

<?php include __DIR__ . "/../layout/footer.php"; ?>
