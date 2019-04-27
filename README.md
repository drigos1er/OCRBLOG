# Bienvenue dans mon Blog 

Ceci est mon Blog personnel développé en PHP orienté objet me basant sur le design pattern MVC.


# Installation de mon application

1. Télécharger le projet  sur : https://github.com/drigos1er/OCRBLOG

Le projet se présente selon l’organisation suivante :
	Un fichier index.php servant de routeur à notre projet contenant les différentes redirections aux pages du projet.
	Un dossier config contenant un fichier de paramètres de connexion à la base de données.
	Un dossier connexion qui contient une classe qui initie la connexion à la base de données.
	Un dossier public contenant les fichiers images, CSS, JavaScript….
	Un dossier src contenant les codes du projet à savoir les différents Controller, les Modèles, les Vues de notre application.
	Un dossier vendor contenant les différentes bibliothèques externes (twig…) utilisés dans notre projet.
	Un dossier db contenant le script de création de la base de données

2. Installer PHP 7, MySQL   et le serveur Apache sur votre machine et exécuter ces différents services

3. Créer la base de donnée blogocbd à partir du fichier de création de la base de donnée(blogocbd.sql) situé à la racine du dossier.

4. Ouvrir le fichier config/Config.php et entrer les configuration d’accès à votre base de données.

5. Vous pouvez accéder au blog en à partir de l’adresse : [l’adresse de votre serveur ou localhost]/[le nom du répertoire du projet]



