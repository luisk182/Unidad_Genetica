<?php
 
/*
 * DataTables example server-side processing script.
 */
 
// DB table to use
$table = '';
 
// Table's primary key
$primaryKey = '';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'NombreEstudio', 'dt' => 0 ),
    array( 'db' => 'ClaveEstudio',  'dt' => 1 ),
    array(
		'db'        => 'FechaEstudio',
		'dt'        => 2,
		'formatter' => function( $d, $row ) {
			return date( 'jS M y', strtotime($d));
		}
	),
    array( 'db' => 'TipoArchivo',   'dt' => 3 ),
    array( 'db' => 'archivos',      'dt' => 4 )
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'unidad_genetica',
    'host' => 'localhost'
);
 

 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null, "NombreUsuario = 'Rory Mercury'")
);