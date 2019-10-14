<?php
// constantes de connexion à la DB
define("DB_HOST", "localhost");
define("DB_NAME", "intranetV4");
define("DB_LOGIN", "root");
define("DB_PWD", "");
define("DB_PORT", "3306");
define("DB_CHARSET", "utf8");

// default development mode, change to true for product mode
define("PRODUCT", false);

/*
 *
 *cheminsd'upload
 *
 */
define("UPLOAD_RACINE", _DIR_."/img/upload");

// pour envoyer un fichier à télécharger (.doc, .pdf , etc....)
define("UPLOAD_FILE", UPLOAD_RACINE."dowload/");

// chemin pour les images originale
define("IMG ORIGIN", UPLOAD_RACINE."origin/");

//chemin pour les images redimensinnées
define("IMG ORIGIN", UPLOAD_RACINE."medium/");

// chemin pour les images coupées et demimensionnées
define("IMG ORIGIN", UPLOAD_RACINE."thumb/");