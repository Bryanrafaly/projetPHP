<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Module Classes</h1>

<!-- Liste des classes -->
<form method="GET" action="index.php" style="margin-bottom: 15px;">
    <input type="hidden" name="module" value="classes">
    <label for="classe_id">Choisir une classe :</label>
    <select name="classe_id" id="classe_id" onchange="this.form.submit()">
        <option value="">-- Sélectionner --</option>
        <?php foreach ($classes as $classe): ?>
            <option value="<?= $classe['id'] ?>" <?= (!empty($selectedClasse) && $selectedClasse['id']==$classe['id'])?'selected':'' ?>>
                <?= htmlspecialchars($classe['nom']) ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

<?php if (!empty($selectedClasse)): ?>
    <a href="index.php?module=classes&action=addEleve&classe_id=<?= $selectedClasse['id'] ?>" 
       class="btn" style="margin-bottom: 15px; display: inline-block;">
       ➕ Ajouter un élève
    </a>
<?php endif; ?>

<form method="GET" action="index.php" style="margin-bottom: 15px;">
    <input type="hidden" name="module" value="classes">

    <?php if (!empty($selectedClasse)): ?>
        <input type="text" name="q" placeholder="Rechercher un élève..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
        <button type="submit">🔍 Rechercher</button>
    <?php endif; ?>
</form>


<?php if (!empty($eleves)): ?>
    <h2>Élèves de <?= htmlspecialchars($selectedClasse['nom']) ?></h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>Actions</th>
        </tr>
        <?php foreach ($eleves as $eleve): ?>
        <tr>
            <td><?= htmlspecialchars($eleve['nom']) ?></td>
            <td><?= htmlspecialchars($eleve['prenom']) ?></td>
            <td><?= htmlspecialchars($eleve['date_naissance']) ?></td>
            <td>
                <a href="index.php?module=classes&action=editEleve&id=<?= $eleve['id'] ?>" class="btn">✏️ Éditer</a>
                <a href="index.php?module=classes&action=deleteEleve&id=<?= $eleve['id'] ?>&classe_id=<?= $selectedClasse['id'] ?>" 
                   class="btn" style="background:#e74c3c;" 
                   onclick="return confirm('Voulez-vous vraiment supprimer cet élève ?');">🗑️ Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php elseif (!empty($_GET['classe_id'])): ?>
    <p>Aucun élève dans cette classe.</p>
<?php endif; ?>

<?php include __DIR__ . "/../layout/footer.php"; ?>
