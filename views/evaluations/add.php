<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Ajouter une Évaluation</h1>

<form method="POST" action="index.php?module=evaluation&action=add">
    <label>Élève :</label><br>
    <select name="eleve_id" required>
        <option value="">-- Sélectionner un élève --</option>
        <?php foreach($eleves as $eleve): ?>
            <option value="<?= $eleve['id'] ?>">
                <?= htmlspecialchars($eleve['nom'].' '.$eleve['prenom']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Matière :</label><br>
    <input type="text" name="matiere" required><br><br>

    <label>Note :</label><br>
    <input type="number" step="0.01" min="0" max="20" name="note" required><br><br>

    <label>Date :</label><br>
    <input type="date" name="date_eval" value="<?= date('Y-m-d') ?>" required><br><br>

    <button type="submit">Ajouter</button>
</form>

<?php include __DIR__ . "/../layout/footer.php"; ?>
