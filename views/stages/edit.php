<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Éditer le Stage</h1>

<form method="POST" action="index.php?module=stages&action=edit&id=<?= $stage['id'] ?>">
    <label>Titre :</label><br>
    <input type="text" name="titre" value="<?= htmlspecialchars($stage['titre']) ?>" required><br><br>

    <label>Entreprise :</label><br>
    <input type="text" name="entreprise" value="<?= htmlspecialchars($stage['entreprise']) ?>" required><br><br>

    <label>Description :</label><br>
    <textarea name="description"><?= htmlspecialchars($stage['description']) ?></textarea><br><br>

    <label>Date début :</label><br>
    <input type="date" name="date_debut" value="<?= htmlspecialchars($stage['date_debut']) ?>"><br><br>

    <label>Date fin :</label><br>
    <input type="date" name="date_fin" value="<?= htmlspecialchars($stage['date_fin']) ?>"><br><br>

    <label>Élève :</label><br>
    <select name="eleve_id">
        <option value="">-- Aucun --</option>
        <?php foreach($eleves as $eleve): ?>
            <option value="<?= $eleve['id'] ?>" <?= ($stage['eleve_id'] == $eleve['id'])?'selected':'' ?>>
                <?= htmlspecialchars($eleve['nom'] . ' ' . $eleve['prenom']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Enregistrer</button>
</form>

<?php include __DIR__ . "/../layout/footer.php"; ?>
