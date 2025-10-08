<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Modifier un élève</h1>

<form method="POST" action="">
    <label for="classe_id">Classe :</label>
    <select name="classe_id" id="classe_id" required>
        <?php foreach ($classes as $classe): ?>
            <option value="<?= $classe['id'] ?>" <?= $classe['id']==$eleve['classe_id']?'selected':'' ?>>
                <?= htmlspecialchars($classe['nom']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($eleve['nom']) ?>" required>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" value="<?= htmlspecialchars($eleve['prenom']) ?>" required>

    <label for="date_naissance">Date de naissance :</label>
    <input type="date" name="date_naissance" id="date_naissance" value="<?= htmlspecialchars($eleve['date_naissance']) ?>">

    <label for="adresse">Adresse :</label>
    <input type="text" name="adresse" id="adresse" value="<?= htmlspecialchars($eleve['adresse']) ?>">

    <label for="telephone">Téléphone :</label>
    <input type="text" name="telephone" id="telephone" value="<?= htmlspecialchars($eleve['telephone']) ?>">

    <button type="submit">Enregistrer</button>
</form>

<?php include __DIR__ . "/../layout/footer.php"; ?>
