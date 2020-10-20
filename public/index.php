<?php
 
use Router\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('FILES', dirname(__DIR__). DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR);
define('IMG', dirname(__DIR__). DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR);

define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);


//var_dump(TRT);die();
define('DB_NAME', 'd1qgr2p37d36dj');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'tppyinxecriwpi');
define('DB_PWD', '8c6374817a8c5dd986fc2eadc0f39ff86e6aca7cc5c98eab18bac1935bf29d79');


$router = new Router($_GET['url']);




$router->get('/', 'App\Controllers\auth\AuthController@welcome');
$router->post('/login', 'App\Controllers\auth\AuthController@login');
$router->get('/hello', 'App\Controllers\auth\AuthController@hello');


$router->get('/logout', 'App\Controllers\auth\AuthController@logout');
$router->get('/commune','App\Controllers\CommuneController@index');
$router->get('/commune/:id','App\Controllers\CommuneController@show');
$router->get('/and/commune/create','App\Controllers\CommuneController@create');
$router->post('/and/commune/createsave','App\Controllers\CommuneController@createSave');
$router->get('/commune/edit/:id','App\Controllers\CommuneController@edit');
$router->post('/commune/edit/:id','App\Controllers\CommuneController@update');
$router->post('/commune/delete/:id','App\Controllers\CommuneController@destroy');


$router->get('/daira','App\Controllers\DairaController@index');
$router->get('/daira/:id','App\Controllers\DairaController@show');
$router->get('/and/daira/create','App\Controllers\DairaController@create');
$router->post('/and/daira/createsave','App\Controllers\DairaController@createSave');
$router->get('/daira/edit/:id','App\Controllers\DairaController@edit');
$router->post('/daira/edit/:id','App\Controllers\DairaController@update');
$router->post('/daira/delete/:id','App\Controllers\DairaController@destroy');

$router->get('/wilaya','App\Controllers\WilayaController@index');
$router->get('/wilaya/:id','App\Controllers\WilayaController@show');
$router->get('/and/wilaya/create','App\Controllers\WilayaController@create');
$router->post('/and/wilaya/createsave','App\Controllers\WilayaController@createSave');
$router->get('/wilaya/edit/:id','App\Controllers\WilayaController@edit');
$router->post('/wilaya/edit/:id','App\Controllers\WilayaController@update');
$router->post('/wilaya/delete/:id','App\Controllers\WilayaController@destroy');

$router->get('/typebienmobile','App\Controllers\TypeBmobilleController@index');
$router->get('/typebienmobile/:id','App\Controllers\TypeBmobilleController@show');
$router->get('/and/typebienmobile/create','App\Controllers\TypeBmobilleController@create');
$router->post('/and/typebienmobile/createsave','App\Controllers\TypeBmobilleController@createSave');
$router->get('/typebienmobile/edit/:id','App\Controllers\TypeBmobilleController@edit');
$router->post('/typebienmobile/edit/:id','App\Controllers\TypeBmobilleController@update');

$router->get('/typebienimmobile','App\Controllers\TypeBimmobilleController@index');
$router->get('/typebienimmobile/:id','App\Controllers\TypeBimmobilleController@show');
$router->get('/and/typebienimmobile/create','App\Controllers\TypeBimmobilleController@create');
$router->post('/and/typebienimmobile/createsave','App\Controllers\TypeBimmobilleController@createSave');
$router->get('/typebienimmobile/edit/:id','App\Controllers\TypeBimmobilleController@edit');
$router->post('/typebienimmobile/edit/:id','App\Controllers\TypeBimmobilleController@update');

$router->get('/EtatPhysique','App\Controllers\EtatphController@index');
$router->get('/EtatPhysique/:id','App\Controllers\TypeBimmobilleController@show');
$router->get('/and/EtatPhysique/create','App\Controllers\EtatphController@create');
$router->post('/and/EtatPhysique/createsave','App\Controllers\EtatphController@createSave');
$router->get('/EtatPhysique/edit/:id','App\Controllers\EtatphController@edit');
$router->post('/EtatPhysique/edit/:id','App\Controllers\EtatphController@update');

$router->get('/Naturetablisement','App\Controllers\NaturetabController@index');
$router->get('/Naturetablisement/:id','App\Controllers\NaturetabController@show');
$router->get('/and/Naturetablisement/create','App\Controllers\NaturetabController@create');
$router->post('/and/Naturetablisement/createsave','App\Controllers\NaturetabController@createSave');
$router->get('/Naturetablisement/edit/:id','App\Controllers\NaturetabController@edit');
$router->post('/Naturetablisement/edit/:id','App\Controllers\NaturetabController@update');

$router->get('/Typeammortisement','App\Controllers\TypeammorController@index');
$router->get('/Typeammortisement/:id','App\Controllers\TypeammorController@show');
$router->get('/and/Typeammortisement/create','App\Controllers\TypeammorController@create');
$router->post('/and/Typeammortisement/createsave','App\Controllers\TypeammorController@createSave');
$router->get('/Typeammortisement/edit/:id','App\Controllers\TypeammorController@edit');
$router->post('/Typeammortisement/edit/:id','App\Controllers\TypeammorController@update');



$router->get('/Pci','App\Controllers\PciController@index');
$router->get('/Pci/:id','App\Controllers\PciController@show');
$router->get('/and/Pci/create','App\Controllers\PciController@create');
$router->post('/and/Pci/createsave','App\Controllers\PciController@createSave');
$router->get('/Pci/edit/:id','App\Controllers\PciController@edit');
$router->post('/Pci/edit/:id','App\Controllers\PciController@update');


$router->get('/typeDocument','App\Controllers\TypedocController@index');
$router->get('/typeDocument/:id','App\Controllers\TypedocController@show');
$router->get('/and/typeDocument/create','App\Controllers\TypedocController@create');
$router->post('/and/typeDocument/createsave','App\Controllers\TypedocController@createSave');
$router->get('/typeDocument/edit/:id','App\Controllers\TypedocController@edit');
$router->post('/typeDocument/edit/:id','App\Controllers\TypedocController@update');

$router->get('/qualiteRaile','App\Controllers\QualitrailController@index');
$router->get('/qualiteRaile/:id','App\Controllers\QualitrailController@show');
$router->get('/and/qualiteRaile/create','App\Controllers\QualitrailController@create');
$router->post('/and/qualiteRaile/createsave','App\Controllers\QualitrailController@createSave');
$router->get('/qualiteRaile/edit/:id','App\Controllers\QualitrailController@edit');
$router->post('/qualiteRaile/edit/:id','App\Controllers\QualitrailController@update');


$router->get('/etatTerrain','App\Controllers\EtatterainController@index');
$router->get('/etatTerrain/:id','App\Controllers\EtatterainController@show');
$router->get('/and/etatTerrain/create','App\Controllers\EtatterainController@create');
$router->post('/and/etatTerrain/createsave','App\Controllers\EtatterainController@createSave');
$router->get('/etatTerrain/edit/:id','App\Controllers\EtatterainController@edit');
$router->post('/etatTerrain/edit/:id','App\Controllers\EtatterainController@update');


$router->get('/terrain','App\Controllers\TerrainController@index');
$router->get('/terrain/:id','App\Controllers\TerrainController@show');
$router->get('/and/terrain/create','App\Controllers\TerrainController@create');
$router->post('/and/terrain/createsave','App\Controllers\TerrainController@createSave');
$router->get('/terrain/edit/:id','App\Controllers\TerrainController@edit');
$router->post('/terrain/edit/:id','App\Controllers\TerrainController@update');


$router->get('/rail','App\Controllers\RailController@index');
$router->post('/and/railterrain/createsave','App\Controllers\RailController@createSave');



$router->get('/etablisement','App\Controllers\EtalConctroller@index');
$router->get('/etablisement/:id','App\Controllers\EtalConctroller@show');
$router->get('/and/etablisement/create','App\Controllers\EtalConctroller@create'); 
$router->post('/and/etablisement/createsave','App\Controllers\EtalConctroller@createSave');
$router->get('/etablisement/edit/:id','App\Controllers\EtalConctroller@edit');
$router->post('/etablisement/edit/:id','App\Controllers\EtalConctroller@update');
$router->post('/etablisement/delete/:id','App\Controllers\EtalConctroller@destroy');
$router->post('/and/etablisement/insertmap','views\etablissement\EtalConctroller@insertmap');

$router->get('/document','App\Controllers\DocumentController@index');
$router->post('/document/:id','App\Controllers\DocumentController@show');
$router->get('/and/document/create','App\Controllers\DocumentController@create');
$router->post('/and/document/createsave','App\Controllers\DocumentController@createSave');
$router->get('/document/edit/:id','App\Controllers\DocumentController@edit');
$router->post('/document/edit/:id','App\Controllers\DocumentController@update');
$router->post('/document/delete/:id','App\Controllers\DocumentController@destroy');   



$router->get('/Bienmobile','App\Controllers\BienmobileController@index');
$router->get('/lien/:id','App\Controllers\BienmobileController@show');
$router->get('/and/Bienmobile/create','App\Controllers\BienmobileController@create');
$router->post('/and/Bienmobile/createsave','App\Controllers\BienmobileController@createSave');
$router->get('/Bienmobile/edit/:id','App\Controllers\BienmobileController@edit');
$router->post('/Bienmobile/edit/:id','App\Controllers\BienmobileController@update');
$router->post('/Bienmobile/delete/:id','App\Controllers\BienmobileController@destroy');


$router->get('/Bienimmobile','App\Controllers\BienimmobileController@index');
$router->get('/Bienimmobile/:id','App\Controllers\BienimmobileController@show');
$router->get('/and/Bienimmobile/create','App\Controllers\BienimmobileController@create');
$router->post('/and/Bienimmobile/createsave','App\Controllers\BienimmobileController@createSave');
$router->get('/Bienimmobile/edit/:id','App\Controllers\BienimmobileController@edit');
$router->post('/Bienimmobile/edit/:id','App\Controllers\BienimmobileController@update');
$router->post('/Bienimmobile/delete/:id','App\Controllers\BienimmobileController@destroy');

/*
** utilise cette exemple de route 
*/
$router->get('/lien','App\Controllers\Type___Controller@index');
$router->get('/lien/:id','App\Controllers\Type___Controller@show');
$router->get('/and/lien/create','App\Controllers\Type___Controller@create');
$router->post('/and/lien/createsave','App\Controllers\Type___Controller@createSave');
$router->get('/lien/edit/:id','App\Controllers\Type___Controller@edit');
$router->post('/lien/edit/:id','App\Controllers\Type___Controller@update');



try {
    $router->run();
} catch (NotFoundException $th) {
    echo $th->error404();
}

