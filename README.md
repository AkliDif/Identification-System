## System d'identification sécurisé


### Introduction
Ce projet a pour but de créer un système d'identification sécurisé. Il est composé de deux parties :
- Un serveur qui gère les utilisateurs et les authentifications
- Un client qui permet à l'utilisateur de s'authentifier

### Serveur
Le serveur utilisé dans ce projet est un serveur Apache. Il est configuré pour utiliser le protocole HTTPS. Les utilisateurs sont stockés dans une base de données MariaDB.

### Client
Le client est un site Web créer avec du HTML, du CSS et du PHP. Il permet à l'utilisateur de s'authentifier en envoyant ses identifiants au serveur.

### Utilisation (Ubuntu 20.04 LTS)
Pour utiliser ce projet, il faut :
- Installer Apache, PHP et MariaDB
    ```
    sudo apt update
    sudo apt install apache2
    sudo apt install php libapache2-mod-php php-mysql
    sudo apt install mariadb-server
    ```
- Créer une base de données et une table pour stocker les utilisateurs
    La table doit être de la forme :
    ```
    CREATE TABLE users (
        username VARCHAR(255) NOT NULL PRIMARY KEY,
        password VARCHAR(255) NOT NULL
    );
    ```
- Configurer le serveur Apache pour utiliser le protocole HTTPS (voir [ici](https://www.digitalocean.com/community/tutorials/how-to-create-a-self-signed-ssl-certificate-for-apache-in-debian-10))
- Modifier la directive dans le fichier `/etc/apache2/apache2.conf` de :
    ```
    <Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride None
        Require all granted
    </Directory>
    ```
    à :
    ```
    <Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    ```
- Placer le fichier index.php dans le dossier /var/www/html du serveur Apache
- Modifier le mot de passe et l'utilisateur de la base de données dans le fichier `/var/www/html/inc/init.inc.php`