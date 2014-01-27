<?
	define("EZSQL_DB_USER", "easyq");			// <-- mysql db user
	define("EZSQL_DB_PASSWORD", "eulogik#123");		// <-- mysql db password
	define("EZSQL_DB_NAME", "easyq");		// <-- mysql db pname
	define("EZSQL_DB_HOST", "mysql.gomobaby.com");	// <-- mysql server host
	
   if($_SERVER['HTTP_HOST'] == "localhost"){
    define('SITEURL', 'http://' . $_SERVER['HTTP_HOST'] .'/EasyQ');
}
else{
    define('SITEURL', 'http://' . $_SERVER['HTTP_HOST'].'/EasyQ');
}
?>