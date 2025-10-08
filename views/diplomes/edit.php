<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Éditer le Diplôme</h1>

<form method="POST" action="index.php?module=diplomes&action=edit&id=<?= $diplome['id'] ?>" enctype="multipart/form-data">
    <label>Élève :</label><br>
    <select name="eleve_id" required>
        <option value="">-- Sélectionner un élève --</option>
        <?php foreach($eleves as $eleve): ?>
            <option value="<?= $eleve['id'] ?>" <?= ($diplome['eleve_id']==$eleve['id'])?'selected':'' ?>>
                <?= htmlspecialchars($eleve['nom'].' '.$eleve['prenom']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Type de diplôme :</label><br>
    <select name="type" required>
        <option value="">-- Sélectionner --</option>
        <option value="Bac" <?= ($diplome['type']=='Bac')?'selected':'' ?>>Bac</option>
        <option value="Licence" <?= ($diplome['type']=='Licence')?'selected':'' ?>>Licence</option>
        <option value="BTS" <?= ($diplome['type']=='BTS')?'selected':'' ?>>BTS</option>
    </select><br><br>

    <label>Année :</label><br>
    <input type="number" name="annee" min="2000" max="<?= date('Y') ?>" value="<?= $diplome['annee'] ?>" required><br><br>

    <label>Fichier PDF :</label><br>
    <?php if(!empty($diplome['fichier'])): ?>
        <a href="uploads/<?= htmlspecialchars($diplome['fichier']) ?>" target="_blank">📄 Fichier actuel</a><br>
    <?php endif; ?>
    <input type="file" name="fichier" accept=".pdf"><br><br>

    <button type="submit">Enregistrer</button>
</form>

<?php include __DIR__ . "/../layout/footer.php"; ?>
