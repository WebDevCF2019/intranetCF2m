<?php
// constantes de connexion à la DB

define("DB_HOST", "localhost");
define("DB_NAME", "intranetV4");
define("DB_LOGIN", "root");
define("DB_PWD", "");
define("DB_PORT", "3306");
define("DB_CHARSET", "utf8");

define("DB_HOST","127.0.0.1");
define("DB_NAME","intranetv4");
define("DB_LOGIN","root");
define("DB_PWD","");
define("DB_PORT","3306");
define("DB_CHARSET","utf8");


// default development mode, change to true for product mode
define("PRODUCT",false);

/*
 *  chemins d'upload
 */
// racine du dossier d'upload
define("UPLOAD_RACINE", "img\upload\\");

// pour envoyer un fichier à télécharger (.doc, .pdf , etc...)
define("UPLOAD_FILE",UPLOAD_RACINE."download\\");

// chemin pour les images originales
define("IMG_ORIGIN",UPLOAD_RACINE."origin\\");

// chemin pour les images redimensionnées (avec les proportions)	
define("IMG_MEDIUM",UPLOAD_RACINE."medium\\");	


// chemin pour les images coupées et redimesionnées (carrées)
define("IMG_ORIGIN",UPLOAD_RACINE."thumb/");

// chemin pour les images coupées et redimesionnées (carrées)	
define("IMG_THUMB",UPLOAD_RACINE."thumb\\");

