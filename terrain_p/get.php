
<?php
 $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = "dbvic";
            
               $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
             

$sql = "SELECT t.id, t.superficie, t.GeoJson, c.nom_commune, et.ibelle_etat, d.nom_daira ,w.nom_wilaya FROM terrain t,wilaya w,daira d,commune c,etat_terrain et WHERE t.id_etat=et.id and t.id_commune=c.id and d.id=c.id_daira and w.id=d.id_wilaya;";

$rs = $db->query($sql);

$rows = array();
while($r = $rs->fetch(PDO::FETCH_ASSOC)) {
    $rows[] = $r;
}
print json_encode($rows);

$db = NULL;

		
?>