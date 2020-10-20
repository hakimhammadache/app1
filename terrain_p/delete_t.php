
<?php
 $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = "dbvic";
            
               $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
             

$id = htmlspecialchars(trim($_POST['id']));


$sql = " DELETE FROM terrain  WHERE id = '$id'";

$rs = $db->query($sql);



		
?>