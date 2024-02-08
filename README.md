## System d'identification sécurisé


### Introduction
Ce projet a pour but de créer un système d'identification sécurisé. Il est composé de deux parties :
- Un serveur qui gère les utilisateurs et les authentifications
- Un client qui permet à l'utilisateur de s'authentifier

### Serveur
Le serveur utilisé dans ce projet est un serveur Apache. Il est configuré pour utiliser le protocole HTTPS. Les utilisateurs sont stockés dans une base de données MariaDB.

### Client
Le client est un site Web créer avec du HTML, du CSS et du PHP. Il permet à l'utilisateur de s'authentifier en envoyant ses identifiants au serveur.

### Utilisation (Linux Debian)
Pour utiliser ce projet, il faut :
- Installer un serveur Apache (Apache2 version 2.4.57)
- Installer une base de données MariaDB (MariaDB version 15.1)
- Créer une base de données et une table pour stocker les utilisateurs
    La table doit être de la forme :
    ```
    CREATE TABLE users (
        username VARCHAR(255) NOT NULL PRIMARY KEY,
        password VARCHAR(255) NOT NULL
    );
    ```
- Configurer le serveur Apache pour utiliser le protocole HTTPS (voir [ici](https://www.digitalocean.com/community/tutorials/how-to-create-a-self-signed-ssl-certificate-for-apache-in-debian-10))
- Placer le fichier `index.php` dans le dossier `/var/www/html` du serveur Apache
- Modifier le mot de passe et l'utilisateur de la base de données dans le fichier `/var/www/html/inc/init.inc.php`