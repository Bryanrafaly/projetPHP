<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Ajouter un Diplôme</h1>

<form method="POST" action="index.php?module=diplomes&action=add" enctype="multipart/form-data">
    <label>Élève :</label><br>
    <select name="eleve_id" required>
        <option value="">-- Sélectionner un élève --</option>
        <?php foreach($eleves as $eleve): ?>
            <option value="<?= $eleve['id'] ?>">
                <?= htmlspecialchars($eleve['nom'].' '.$eleve['prenom']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Type de diplôme :</label><br>
    <select name="type" required>
        <option value="">-- Sélectionner --</option>
        <option value="Bac">Bac</option>
        <option value="Licence">Licence</option>
        <option value="BTS">BTS</option>
    </select><br><br>

    <label>Année :</label><br>
    <input type="number" name="annee" min="2000" max="<?= date('Y') ?>" required><br><br>

    <label>Fichier PDF :</label><br>
    <input type="file" name="fichier" accept=".pdf"><br><br>

    <button type="submit">Ajouter</button>
</form>

<?php include __DIR__ . "/../layout/footer.php"; ?>
