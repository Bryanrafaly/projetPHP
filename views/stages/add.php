<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Ajouter un Stage</h1>

<form method="POST" action="index.php?module=stages&action=add">
    <label>Titre :</label><br>
    <input type="text" name="titre" required><br><br>

    <label>Entreprise :</label><br>
    <input type="text" name="entreprise" required><br><br>

    <label>Description :</label><br>
    <textarea name="description"></textarea><br><br>

    <label>Date début :</label><br>
    <input type="date" name="date_debut"><br><br>

    <label>Date fin :</label><br>
    <input type="date" name="date_fin"><br><br>

    <label>Élève :</label><br>
    <select name="eleve_id">
        <option value="">-- Aucun --</option>
        <?php foreach($eleves as $eleve): ?>
            <option value="<?= $eleve['id'] ?>">
                <?= htmlspecialchars($eleve['nom'] . ' ' . $eleve['prenom']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Ajouter</button>
</form>

<?php include __DIR__ . "/../layout/footer.php"; ?>
