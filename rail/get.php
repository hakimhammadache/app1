
<?php
 $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = "dbvic";
            
               $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
             

$sql = "SELECT v.id, v.longueur, v.GeoJson,v.espace_gauche,v.espace_droit,c.nom_commune, et.libelle_eta_ph, d.nom_daira ,w.nom_wilaya FROM voie_ferroviaire v, wilaya w, daira d,commune c,etat_physique et WHERE v.id_etat_ph=et.id and v.id_commune=c.id and d.id=c.id_daira and w.id=d.id_wilaya;";

$rs = $db->query($sql);

$rows = array();
while($r = $rs->fetch(PDO::FETCH_ASSOC)) {
    $rows[] = $r;
}
print json_encode($rows);

$db = NULL;

		
?>