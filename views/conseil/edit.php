<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Éditer le Conseil</h1>

<form method="POST" action="index.php?module=conseil&action=edit&id=<?= $conseil['id'] ?>">
    <label>Titre :</label><br>
    <input type="text" name="titre" value="<?= htmlspecialchars($conseil['titre']) ?>" required><br><br>

    <label>Date :</label><br>
    <input type="date" name="date_conseil" value="<?= htmlspecialchars($conseil['date_conseil']) ?>" required><br><br>

    <label>Description :</label><br>
    <textarea name="description"><?= htmlspecialchars($conseil['description']) ?></textarea><br><br>

    <label>Classe :</label><br>
    <select name="classe_id">
        <option value="">-- Aucun --</option>
        <?php foreach($classes as $classe): ?>
            <option value="<?= $classe['id'] ?>" <?= ($conseil['classe_id'] == $classe['id'])?'selected':'' ?>>
                <?= htmlspecialchars($classe['nom']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Enregistrer</button>
</form>

<?php include __DIR__ . "/../layout/footer.php"; ?>
