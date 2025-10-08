<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Ajouter un Enseignant</h1>

<form method="POST" action="index.php?module=enseignants&action=add">
    <label>Nom :</label><br>
    <input type="text" name="nom" required><br><br>

    <label>Prénom :</label><br>
    <input type="text" name="prenom" required><br><br>

    <label>Email :</label><br>
    <input type="email" name="email"><br><br>

    <label>Téléphone :</label><br>
    <input type="text" name="telephone"><br><br>

    <label>Matière :</label><br>
    <input type="text" name="matiere"><br><br>

    <button type="submit">Ajouter</button>
</form>

<?php include __DIR__ . "/../layout/footer.php"; ?>
