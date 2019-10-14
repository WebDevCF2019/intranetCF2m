<?php
class index
{
    public function __construct()
    {
        parent::__construct();
    }
    public static function file_upload()
    {
          $dossier = 'img/';
          $fichier = basename($_FILES['avatar']['name']);
          $taille_maxi = 100000;
          $taille = filesize($_FILES['avatar']['tmp_name']);
          $extensions = array('.png', '.gif', '.jpg', '.jpeg');
          $extension = strrchr($_FILES['avatar']['name'], '.'); 
          //Début des vérifications de sécurité...
          if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
          {
               $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
          }
          if($taille>$taille_maxi)
          {
               $erreur = 'Le fichier est trop gros...';
          }
          if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
          {
               //On formate le nom du fichier ici...
               $fichier = strtr($fichier, 
                    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
               $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
               if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier))
				{
 
					$_SESSION['mess'] = 'Fiche enregistrée !';
				$size = GetImageSize( $dossier . $fichier );
					$width = $size[ 0 ];
					$height = $size[ 1 ];
					$dest_h = 176;
					$dest_w = 230;
					$miniature = ImageCreateTrueColor( $dest_w, $dest_h);
					$image = ImageCreateFromJpeg( $dossier . $fichier );
					ImageCopyResampled( $miniature, $image, 0, 0, 0, 0, $dest_w, $dest_h, $width, $height );
					ImageJpeg( $miniature, $dossier . 'thumb_' . $fichier, 100 );
				}
				else
				{
					$_SESSION['mess'] = 'Echec de l\'upload de l\'image !';
                    }
               }
          }
     }