<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de scolarité</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/VraiProjet/public/css/style.css">
</head>
<body>

<header class="navbar">
    <nav>
        <ul class="nav-menu">
            <li><a href="index.php?module=classes"><i class="fa-solid fa-school"></i> Classes</a></li>
            <li><a href="index.php?module=enseignants"><i class="fa-solid fa-chalkboard-teacher"></i> Enseignants</a></li>
            <li><a href="index.php?module=stages"><i class="fa-solid fa-briefcase"></i> Stages</a></li>
            <li><a href="index.php?module=conseil"><i class="fa-solid fa-users"></i> Conseil</a></li>
            <li><a href="index.php?module=diplomes"><i class="fa-solid fa-certificate"></i> Diplômes</a></li>
            <li><a href="index.php?module=evaluation"><i class="fa-solid fa-clipboard-check"></i> Évaluation</a></li>
            <li><a href="index.php?module=devoirs"><i class="fa-solid fa-book"></i> Devoirs</a></li>
        </ul>

        <!-- Section Profil -->
        <div class="profile-section">
            <img src="/VraiProjet/public/images/avatar.png" alt="Avatar" class="profile-avatar">
            <div class="profile-menu">
                <ul>
                    <li><a href="index.php?module=profil"><i class="fa-solid fa-user"></i> Mon Profil</a></li>
                    <li><a href="index.php?module=parametres"><i class="fa-solid fa-gear"></i> Paramètres</a></li>
                    <li><a href="index.php?module=logout"><i class="fa-solid fa-right-from-bracket"></i> Déconnexion</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<!-- Loader -->
<div id="page-loader">
    <div class="loader-circle"></div>
</div>

<script type="module" src="/VraiProjet/public/js/main.js"></script>

<main class="main-content">
