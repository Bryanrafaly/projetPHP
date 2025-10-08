<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Module Évaluation</h1>

<form method="GET" action="index.php" style="margin-bottom:15px;">
    <input type="hidden" name="module" value="evaluation">

    <select name="classe_id">
        <option value="">-- Choisir une classe --</option>
        <?php foreach($classes as $c): ?>
            <option value="<?= $c['id'] ?>" <?= ($_GET['classe_id']??'')==$c['id']?'selected':'' ?>><?= htmlspecialchars($c['nom']) ?></option>
        <?php endforeach; ?>
    </select>

    <input type="text" name="matiere" placeholder="Matière" value="<?= htmlspecialchars($_GET['matiere']??'') ?>">

    <button type="submit">🔍 Filtrer</button>
    <a href="index.php?module=evaluation&action=add" class="btn">➕ Ajouter</a>
</form>

<?php if (!empty($evaluations)): ?>
    <table border="1" cellpadding="5">
        <tr>
            <th>Élève</th>
            <th>Matière</th>
            <th>Note</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        <?php foreach($evaluations as $e): ?>
        <tr>
            <td><?= htmlspecialchars($e['eleve_nom'].' '.$e['eleve_prenom']) ?></td>
            <td><?= htmlspecialchars($e['matiere']) ?></td>
            <td><?= htmlspecialchars($e['note']) ?></td>
            <td><?= htmlspecialchars($e['date_eval']) ?></td>
            <td>
                <a href="index.php?module=evaluation&action=edit&id=<?= $e['id'] ?>">✏️ Editer</a> |
                <a href="index.php?module=evaluation&action=delete&id=<?= $e['id'] ?>" onclick="return confirm('Supprimer cette évaluation ?');">🗑️ Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Aucune évaluation trouvée.</p>
<?php endif; ?>

<?php include __DIR__ . "/../layout/footer.php"; ?>
