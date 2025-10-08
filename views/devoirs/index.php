<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Module Devoirs</h1>

<a href="index.php?module=devoirs&action=add" class="btn">➕ Ajouter un devoir</a>

<?php if(!empty($devoirs)): ?>
    <?php foreach($devoirs as $devoir): ?>
        <h3><?= htmlspecialchars($devoir['titre']) ?> (<?= htmlspecialchars($devoir['matiere']) ?>) - Classe : <?= htmlspecialchars($devoir['classe_nom']) ?> - Date : <?= htmlspecialchars($devoir['date_devoir']) ?></h3>

        <?php 
        $notes = $this->devoirModel->getNotes($devoir['id']); 
        if(!empty($notes)):
        ?>
            <table border="1" cellpadding="5" style="margin-bottom:20px;">
                <tr>
                    <th>Élève</th>
                    <th>Note</th>
                </tr>
                <?php foreach($notes as $n): ?>
                <tr>
                    <td><?= htmlspecialchars($n['nom'].' '.$n['prenom']) ?></td>
                    <td><?= htmlspecialchars($n['note']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aucune note pour ce devoir.</p>
        <?php endif; ?>

        <a href="index.php?module=devoirs&action=delete&id=<?= $devoir['id'] ?>" onclick="return confirm('Supprimer ce devoir ?');">🗑️ Supprimer</a>
        <hr>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun devoir trouvé.</p>
<?php endif; ?>

<?php include __DIR__ . "/../layout/footer.php"; ?>
