<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Ajouter un élève</h1>

<form method="POST" action="index.php?module=classes&action=addEleve">
    <label for="classe_id">Classe :</label>
    <select name="classe_id" id="classe_id" required>
        <?php foreach ($classes as $classe): ?>
            <option value="<?= $classe['id'] ?>"><?= htmlspecialchars($classe['nom']) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" required>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" required>

    <label for="date_naissance">Date de naissance :</label>
    <input type="date" name="date_naissance" id="date_naissance">

    <label for="adresse">Adresse :</label>
    <input type="text" name="adresse" id="adresse">

    <label for="telephone">Téléphone :</label>
    <input type="text" name="telephone" id="telephone">

    <button type="submit">Ajouter</button>
</form>

<?php include __DIR__ . "/../layout/footer.php"; ?>
