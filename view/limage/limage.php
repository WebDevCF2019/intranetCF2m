<form method="POST" action="upload.php" enctype="multipart/form-data">
     <!-- On limite le fichier à 100Ko -->
     <input type="file" name="MAX_FILE_SIZE" value="100000">
     Fichier : <input type="file" name="avatar" accept="img/png, img/jpeg, img/gif">
     <input type="submit" name="envoyer" value="Envoyer le fichier">

</form>
