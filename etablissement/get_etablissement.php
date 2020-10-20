<?php

 $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = "dbvic";
            
               $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT e.id , e.nom_etab, e.localisation_lng,e.localisation_lat,e.id_commune,e.id_natur_etab,e.id_etat_ph,c.nom_commune, n.libelle_nat_etab, et.libelle_eta_ph, d.nom_daira ,w.nom_wilaya FROM etabissement e,wilaya w,daira d,commune c,nature_etablisement n,etat_physique et WHERE e.id_natur_etab=n.id and e.id_etat_ph=et.id and e.id_commune=c.id and d.id=c.id_daira and w.id=d.id_wilaya;";


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