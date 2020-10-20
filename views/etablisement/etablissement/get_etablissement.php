<?php

 $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = "dbvic";
            
               $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT id,nom_etab,localisation_lng,localisation_lat,id_commune,id_natur_etab,id_etat_ph FROM etabissement;";

$rs = $db->query($sql);
if (!$rs) {
    echo "An SQL error occured.\n";
    exit;
}

$rows = array();
while($r = $rs->fetch(PDO::FETCH_ASSOC)) {
    $rows[] = $r;
}
print json_encode($rows);
$db = NULL;
?>