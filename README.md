# Projet PHP – Architecture MVC

## Présentation du projet

Ce projet a été développé par **Bryan** et **Ny Avo Steeve** dans le cadre d’un apprentissage avancé du développement web en **PHP** en suivant le modèle architectural **MVC (Modèle – Vue – Contrôleur)**.  
L’objectif est de fournir une base claire, modulable et maintenable pour la création d’applications web structurées et performantes.

---

## Objectifs du projet

- Appliquer rigoureusement la structure MVC pour séparer les responsabilités.
- Créer un code organisé, réutilisable et facile à maintenir.
- Mettre en place un système de routage dynamique.
- Intégrer une base de données relationnelle avec PDO.
- Proposer une interface claire via un moteur de vues léger.

---

## Structure du projet

```bash
project/
│
├── app/
│   ├── controllers/       # Contrôleurs (logique applicative)
│   ├── models/            # Modèles (interaction avec la base de données)
│   ├── views/             # Vues (affichage des pages)
│   └── core/              # Classes principales (Router, Controller, Model...)
│
├── config/
│   └── config.php         # Paramètres de connexion et constantes
│
├── public/
│   ├── index.php          # Point d’entrée principal de l’application
│   ├── css/               # Feuilles de style
│   ├── js/                # Scripts JavaScript
│   └── images/            # Ressources graphiques
│
├── vendor/                # Dépendances externes (si Composer est utilisé)
│
└── README.md
```

---

## Fonctionnement général

1. **Router** : analyse l’URL et détermine le contrôleur et l’action à exécuter.  
2. **Contrôleur** : récupère les données nécessaires auprès du modèle et choisit la vue à afficher.  
3. **Modèle** : interagit avec la base de données et renvoie les informations au contrôleur.  
4. **Vue** : affiche les données préparées dans un format lisible par l’utilisateur.

Ce découpage garantit une structure claire et évolutive du code.

---

## Technologies utilisées

- **Langage :** PHP 8+  
- **Base de données :** MySQL / MariaDB  
- **Serveur :** Apache ou Nginx  
- **Frontend :** HTML5, CSS3, JavaScript  
- **Gestionnaire de dépendances :** Composer (facultatif)

---

## Installation et exécution

1. Cloner le dépôt :
   ```bash
   git clone https://github.com/nom-utilisateur/nom-du-projet.git
   ```

2. Configurer les paramètres de connexion à la base de données dans :
   ```bash
   config/config.php
   ```

3. Importer le fichier SQL (si fourni) dans votre SGBD.

4. Démarrer un serveur PHP local :
   ```bash
   php -S localhost:8000 -t public
   ```

5. Ouvrir le projet dans votre navigateur :
   ```bash
   http://localhost:8000
   ```

---

## Auteurs

- **Bryan**  
- **Ny Avo Steeve**  

---

## Licence

Ce projet est publié à des fins éducatives et de démonstration.  
Toute reproduction ou réutilisation doit mentionner les auteurs originaux.
