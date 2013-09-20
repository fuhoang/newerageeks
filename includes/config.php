<?

$dir = "http://localhost/newerageeks/";
require_once('classes/Database.php');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'chinaman');
define('DB_DATABASE', 'new_era_geeks');

$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

?>