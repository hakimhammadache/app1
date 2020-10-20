 <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = "dbvic";
            //On essaie de se connecter
            try{
                $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connexion réussite';
            }

            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
?>
	<?php 

		$GeoJson=$_POST['hasil'];
        $surface=$_POST['surface'];  


		$db->exec("INSERT INTO terrain (GeoJson,superficie) VALUES ('$GeoJson','$surface');");
if ($db) {
  echo "ok";

}
$db = NULL;
?>