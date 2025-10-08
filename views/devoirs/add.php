<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Ajouter un Devoir</h1>

<form method="POST" action="index.php?module=devoirs&action=add">
    <label>Classe :</label><br>
    <select name="classe_id" required>
        <option value="">-- Sélectionner une classe --</option>
        <?php foreach($classes as $c): ?>
            <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nom']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Titre du devoir :</label><br>
    <input type="text" name="titre" required><br><br>

    <label>Matière :</label><br>
    <input type="text" name="matiere" required><br><br>

    <label>Date :</label><br>
    <input type="date" name="date_devoir" value="<?= date('Y-m-d') ?>" required><br><br>

    <h3>Notes des élèves :</h3>
    <?php
    if (!empty($_POST['classe_id'])) {
        $eleves = $this->eleveModel->getByClasse($_POST['classe_id']);
        foreach($eleves as $eleve):
    ?>
        <?= htmlspecialchars($eleve['nom'].' '.$eleve['prenom']) ?> :
        <input type="number" step="0.01" min="0" max="20" name="notes[<?= $eleve['id'] ?>]"><br>
    <?php endforeach; } ?>

    <br>
    <button type="submit">Ajouter le devoir</button>
</form>

<?php include __DIR__ . "/../layout/footer.php"; ?>
