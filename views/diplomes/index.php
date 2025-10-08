<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Module Diplômes</h1>

<form method="GET" action="index.php" style="margin-bottom:15px;">
    <input type="hidden" name="module" value="diplomes">

    <input type="text" name="q" placeholder="Rechercher un élève..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">

    <select name="type">
        <option value="">-- Type --</option>
        <option value="Bac" <?= ($_GET['type'] ?? '')=='Bac'?'selected':'' ?>>Bac</option>
        <option value="Licence" <?= ($_GET['type'] ?? '')=='Licence'?'selected':'' ?>>Licence</option>
        <option value="BTS" <?= ($_GET['type'] ?? '')=='BTS'?'selected':'' ?>>BTS</option>
    </select>

    <select name="annee">
        <option value="">-- Année --</option>
        <?php for($y=date('Y'); $y>=2000; $y--): ?>
            <option value="<?= $y ?>" <?= ($_GET['annee'] ?? '')==$y?'selected':'' ?>><?= $y ?></option>
        <?php endfor; ?>
    </select>

    <button type="submit">🔍 Filtrer</button>
    <a href="index.php?module=diplomes&action=add" class="btn" style="margin-left:10px;">➕ Ajouter</a>
</form>

<?php if (!empty($diplomes)): ?>
    <table border="1" cellpadding="5">
        <tr>
            <th>Élève</th>
            <th>Type</th>
            <th>Année</th>
            <th>Fichier</th>
            <th>Actions</th>
        </tr>
        <?php foreach($diplomes as $d): ?>
        <tr>
            <td><?= htmlspecialchars($d['eleve_nom'].' '.$d['eleve_prenom']) ?></td>
            <td><?= htmlspecialchars($d['type']) ?></td>
            <td><?= htmlspecialchars($d['annee']) ?></td>
            <td>
                <?php if($d['fichier']): ?>
                    <a href="uploads/<?= htmlspecialchars($d['fichier']) ?>" target="_blank">📄 Télécharger</a>
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
            <td>
                <a href="index.php?module=diplomes&action=edit&id=<?= $d['id'] ?>">✏️ Editer</a> |
                <a href="index.php?module=diplomes&action=delete&id=<?= $d['id'] ?>" onclick="return confirm('Supprimer ce diplôme ?');">🗑️ Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Aucun diplôme trouvé.</p>
<?php endif; ?>

<?php include __DIR__ . "/../layout/footer.php"; ?>
