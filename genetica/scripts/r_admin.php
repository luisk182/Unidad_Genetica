<?php

/*
 * Script principal de Editor
 */

// DataTables PHP library
include( "../../php/DataTables.php" );

// Alias Editor
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;
$db->sql( "SET NAMES 'utf8'" );
// Libreria para captura, lectura y edicion de datos
Editor::inst( $db, 'altaestudios', 'IdAltaEstudios' )
	->debug(true)

	->fields(
    
        Field::inst( 'altaestudios.FechaEstudio' )
			->validator( 'Validate::dateFormat', array(
				"format"  => Format::DATE_ISO_8601,
				"message" => "Ingrese un formato válido de fecha yyyy-mm-dd"
			) )
			->validator( 'Validate::required', array(
				
				"message" => "Seleccione / capture una fecha de recepción"
			) )
			->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
			->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ),
			
			Field::inst( 'altaestudios.FechaEntrega' )
			->validator( 'Validate::dateFormat', array(
				"format"  => Format::DATE_ISO_8601,
				"message" => "Ingrese un formato válido de fecha yyyy-mm-dd"
			) )
			->validator( 'Validate::required', array(
				
				"message" => "Seleccione / capture una fecha de entrega"
			) )
			->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
			->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ),
    
            // se crea el campo que se va a relacionar
                Field::inst( 'altaestudios.IdUsuario' )
    
            // se agregan las opciones del objeto que se va a llenar dinamicamente
                    ->options( Options::inst()
                        ->table( 'usuario'  )
                        ->value( 'IdUsuario' )
                        ->label( array('nombre', 'apellido') )
						->render( function ( $row ) {
							return $row['nombre'].' '.$row['apellido'].'';
						})
						->where( function ($q) {
							$q->where( 'perfil', 3 );
						} )
                    )
                    // validador de datos
                    ->validator( 'Validate::dbValues', array(
						"message" => "Seleccione un paciente"
					) ),
                // campo de el left join
                Field::inst( 'paciente.nombre'),
                    Field::inst('paciente.apellido'), //Join para render de apellido
					
			// Datos del medico 	
               Field::inst( 'altaestudios.IdMedico' )
			       ->setFormatter( 'Format::ifEmpty', null )
            // se agregan las opciones del objeto que se va a llenar dinamicamente
                    ->options( Options::inst()
                        ->table( 'usuario'  )
                        ->value( 'IdUsuario' )
                        ->label( array('nombre', 'apellido') )
						->render( function ( $row ) {
							return $row['nombre'].' '.$row['apellido'].'';
						})
						->where( function ($q) {
							$q->where( 'perfil', 2 );
						} )
                    ),
                 
                    // ->validator( 'Validate::dbValues', array(
						// "message" => "Seleccione un médico"
					// ) ),
                // campo de el left join
                Field::inst( 'medico.nombre'),
                    Field::inst('medico.apellido'), //Join para render de apellido
                 
        Field::inst( 'altaestudios.IdLaboratorio')
                 ->options( Options::inst()
                        ->table( 'laboratorio')
                        ->value( 'IdLaboratorio' )
                        ->label( 'NombreLaboratorio')
                    )
                   // validador de datos
                     ->validator( 'Validate::dbValues', array(
						 "message" => "Seleccione un laboratorio"
					 ) ),
                // campo de el left join
                 Field::inst( 'laboratorio.NombreLaboratorio'),
        Field::inst( 'altaestudios.activo'),
    
        Field::inst( 'altaestudios.IdTipoEstudio')
                    ->options( Options::inst()
                        ->table( 'tipoestudio'  )
                        ->value( 'IdTipoEstudio' )
                        ->label( 'ClaveEstudio'   )
                    )
                    // validador de datos
                      ->validator( 'Validate::dbValues', array(
						"message" => "Seleccione un estudio"
					) ),
                // campo de el left join
                Field::inst('tipoestudio.ClaveEstudio'),
			
    
    
                Field::inst( 'altaestudios.archivo' )
                  ->setFormatter( 'Format::ifEmpty', null )
                ->upload( Upload::inst( $_SERVER['DOCUMENT_ROOT'].'/archivos/estudioNumero__ID__.__EXTN__' )
                    ->db( 'archivo', 'IdArchivo', array(
                        'NombreArchivo'    => Upload::DB_FILE_NAME,
                        'Tamano'    => Upload::DB_FILE_SIZE,
                        'web_path'    => Upload::DB_WEB_PATH,
                        'local_path' => Upload::DB_SYSTEM_PATH
                    ) 
                )
                    ->allowedExtensions( array( 'pdf'), "Archivo no válido" )
            )
			->validator( 'Validate::required', array(
			"message"=> "Seleccione un archivo") )
			
    )
	->on( 'postCreate', function ( $editor, $id, $values, $row ) {
				$res2=( $maildoctor = $editor->db()
					->query('select')
					->table('usuario')
					->get('email')
					->where('IdUsuario', $values['altaestudios']['IdMedico'])
					->exec() );
					
					$maildoctor=array();		
					$headers= 'From: notificaciones@unidadgenetica.com';

					while ($rowz = $res2->fetch() ){
						mail($rowz['email'], 'Nuevo estudio disponible', 'Visita http://www.unidadgenetica.com/resultados para ver el resultado', $headers);
					}
				
				$res= ($notif = $editor->db()
					->query('select')
					->table('usuario')
					->get('email')
					->where('laboratorio', $values['altaestudios']['IdLaboratorio'])
					->exec() );
					
					$notif= array();
					
					while ($rows = $res->fetch() ){
						mail($rows['email'], 'Nuevo estudio disponible', 'Visita http://www.unidadgenetica.com/resultados para ver el resultado', $headers);
					}
		}
				
	)
			
		
        ->leftJoin( 'archivo', 'altaestudios.archivo', '=', 'archivo.IdArchivo')
        ->leftJoin( 'usuario as paciente', 'paciente.IdUsuario', '=', 'altaestudios.IdUsuario' )
        ->leftJoin( 'usuario as medico', 'medico.IdUsuario', '=', 'altaestudios.IdMedico' )
		
        ->leftJoin( 'laboratorio', 'altaestudios.IdLaboratorio', '=', 'laboratorio.IdLaboratorio')
        ->leftJoin( 'tipoestudio', 'altaestudios.IdTipoEstudio', '=', 'tipoestudio.IdTipoEstudio')

	->process( $_POST )
	->json();