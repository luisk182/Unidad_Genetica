<?php if (!defined('DATATABLES')) exit(); // Ensure being used in DataTables env.

// Enable error reporting for debugging (remove for production)
error_reporting(E_ALL);
ini_set('display_errors', '1');


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Database user / pass
 */
$sql_details = array(
	"type" => "Mysql",  // Database type: "Mysql", "Postgres", "Sqlserver", "Sqlite" or "Oracle"
	"user" => "unidadge_usuario",       // Database user name
	"pass" => "kC+8h%poaET4",       // Database password
	"host" => "localhost",       // Database host
	"port" => "",       // Database connection port (can be left empty for default)
	"db"   => "unidadge_netica",       // Database name
	"dsn"  => ""        // PHP DSN extra information. Set as `charset=utf8` if you are using MySQL
);


