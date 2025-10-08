<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Éditer l'Enseignant</h1>

<form method="POST" action="index.php?module=enseignants&action=edit&id=<?= $enseignant['id'] ?>">
    <label>Nom :</label><br>
    <input type="text" name="nom" value="<?= htmlspecialchars($enseignant['nom']) ?>" required><br><br>

    <label>Prénom :</label><br>
    <input type="text" name="prenom" value="<?= htmlspecialchars($enseignant['prenom']) ?>" required><br><br>

    <label>Email :</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($enseignant['email']) ?>"><br><br>

    <label>Téléphone :</label><br>
    <input type="text" name="telephone" value="<?= htmlspecialchars($enseignant['telephone']) ?>"><br><br>

    <label>Matière :</label><br>
    <input type="text" name="matiere" value="<?= htmlspecialchars($enseignant['matiere']) ?>"><br><br>

    <button type="submit">Enregistrer</button>
</form>

<?php include __DIR__ . "/../layout/footer.php"; ?>
