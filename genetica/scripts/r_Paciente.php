<?php
/*
 * Example PHP implementation used for the index.html example
 */
 session_start();
include( "../../php/DataTables.php" );

use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;
	
    $db->sql( "SET NAMES 'utf8'" );
Editor::inst( $db, 'altaestudios', 'IdAltaEstudios')
	
	->debug(true)
	->field(
	 
			
        Field::inst('altaestudios.FechaEstudio')
    	->validator( 'Validate::dateFormat', array(
				"format"  => Format::DATE_ISO_8601,
				"message" => "Ingrese un formato válido de fecha yyyy-mm-dd"
			) )
			->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
			->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ),
    
        Field::inst('altaestudios.activo'),
            
        Field::inst('altaestudios.archivo'),
			Field::inst('archivo.web_path'),
    

          Field::inst('altaestudios.IdTipoEstudio'),
                Field::inst('tipoestudio.NombreEstudio'),
				
		 Field::inst( 'altaestudios.userid' )
			
			->setValue($_SESSION['IdUsuario'])
			
			
    )
	->where('altaestudios.IdUsuario',$_SESSION['IdUsuario']) // my new variable if I set a number like 63 I get results.
	
    ->leftJoin('tipoestudio', 'altaestudios.IdTipoEstudio', '=', 'tipoestudio.IdTipoEstudio')
    ->leftJoin('archivo', 'altaestudios.archivo', '=', 'archivo.IdArchivo')
   

	->process( $_POST )
	->json();