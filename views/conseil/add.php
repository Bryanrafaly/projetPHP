<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Ajouter un Conseil</h1>

<form method="POST" action="index.php?module=conseil&action=add">
    <label>Titre :</label><br>
    <input type="text" name="titre" required><br><br>

    <label>Date :</label><br>
    <input type="date" name="date_conseil" required><br><br>

    <label>Description :</label><br>
    <textarea name="description"></textarea><br><br>

    <label>Classe :</label><br>
    <select name="classe_id">
        <option value="">-- Aucun --</option>
        <?php foreach($classes as $classe): ?>
            <option value="<?= $classe['id'] ?>"><?= htmlspecialchars($classe['nom']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Ajouter</button>
</form>

<?php include __DIR__ . "/../layout/footer.php"; ?>
