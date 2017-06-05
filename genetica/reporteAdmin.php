<!DOCTYPE html>
<?php
session_start();

if ($_SESSION['perfil']!=4) 
	{
	echo "No tiene suficiente permisos";die;
	//header("location: ../error.php");   
	// $_SESSION['message'] = "Debes iniciar sesión para acceder a esta página";
	}
else {
 
   
   $nombre = $_SESSION['nombre'];
   $apellido = $_SESSION['apellido'];
   $email = $_SESSION['email'];
   $activo = $_SESSION['activo'];
	
	$perfil=$_SESSION['perfil'];
	$idusuario= $_SESSION['IdUsuario'];
}
?>
<html>

<head>
	<?php   include('header_in.php');
            include ('dtheader.php');
			
    ?>

	    <script type="text/javascript" language="javascript" class="init">
          var editor;
            $(document).ready(function(){
                editor= new $.fn.dataTable.Editor({       
                    ajax:"scripts/r_admin.php",
                    table:"#reporte",  
                    fields:[{
                        label:"Fecha Estudio",
                        name:"altaestudios.FechaEstudio",
                        type:"datetime",
                        opts:{
                            maxDate: new Date()
                        }
                }, 
                    {
                        label:"Usuario",
                        name:"altaestudios.IdUsuario", //Select llenado dinamicamente del left join
                        type:"autoComplete",
                        placeholder:"Elija usuario"
                },
					{
						label:"Medico",
                        name:"altaestudios.IdMedico", //Select llenado dinamicamente del left join
                        type:"autoComplete",
                        placeholder:"Elija usuario"
				},
                    {
                        label:"Laboratorio",
                        name:"altaestudios.IdLaboratorio",
                        type:"select",
                        placeholder:"Seleccione un laboratorio"      
                },
                    {
                        label:"Activo",
                        name:"altaestudios.activo",
                        type:"radio",
                        options:[
                            { label:"Activo",    value:1 },
                            { label:"Inactivo",  value:0 } 
                        ]
                },
                    {
                        label:"Tipo estudio",
                        name:"altaestudios.IdTipoEstudio",
                        type:"select"     
                }, 
                    {
                        label:"Archivo",
                        name:"altaestudios.archivo",
                        type:"upload",
                            display: function(file_IdArchivo){
                            return editor.file('archivo', file_IdArchivo).NombreArchivo;
                            },
							dragDropText:"Arrastra y suelta un archivo",
							uploadText:"Seleccionar archivo...",
							fileReadText:"Cargando",
							noFileText:"No hay archivo"
							
							
                }        
                    ],
					i18n: {
							edit: {submit: "Guardar"},
							create:{submit:"Crear"},
							remove:{
								submit:"Borrar",
								confirm:{
									_: "¿Estas seguro que deseas borrar %d registros?",
									1: "¿Estas seguro que deseas borrar 1 registro?"
								}
							}
							
					}							
            });
            
         var table= $("#reporte").DataTable({
              lengthChange: false,
               
                "language":{
                    "url": "./lenguaje/spanish.json",
					"select":{
						"rows":{
							"_":"%d filas seleccionadas",
							"0":"Seleccione una fila",
							"1":"1 fila seleccionada"
						}
					}
                },
                initComplete: function (settings, json){
                            table.buttons().container()
                            .appendTo( $('.small-6.columns:eq(0)', table.table().container() ) );
                
                },
                
                ajax:"scripts/r_admin.php",
                columns:[
                    {data:"tipoestudio.ClaveEstudio"},
                    {data:"usuario",
                        render: function (data, type, row){
                            return data.nombre+' '+data.apellido;
                            
                        }    
                    },
                    {data:"altaestudios.FechaEstudio"},
                    {data:"laboratorio.NombreLaboratorio"},
                    {data:"altaestudios.activo",
                        render: function(data){
                            return data==1? 'Activo' : 'Inactivo';
                        }
                    },
                    {data:"altaestudios.archivo",
                        render: function(file_IdArchivo){
                           return  file_IdArchivo?
                               '<a href="'+editor.file('archivo', file_IdArchivo).web_path+'" download><i class="fi-download"></i> Archivo</a> / '+  '<a href="'+editor.file('archivo', file_IdArchivo).web_path+'" target="_blank"><i class="fi-eye"></i>Ver</a>' :
                               'No hay archivos';
                            }
                    },
					{data:"altaestudios.IdMedico"}
                ],
                select:true
                   
           } );
                new $.fn.dataTable.Buttons( table, [
                {   
                    text:"Agregar",
                    extend: "create",
                    editor: editor,
                    formTitle:"Agregar registro"
                },
                { 
                    text:"Editar", 
                    extend: "edit",  
                    editor: editor,
                    formTitle:"Editar registro"
                },
                { 
                    text:"Borrar", 
                    extend: "remove", 
                    editor: editor,
                    formTitle:"¿Estás seguro que deseas borrarlo?"
                },
                {
                    extend:"copy",
                    text:"Copiar"
                },

            ] );
     } );

    </script>    
    </head>
	
    <body class="dt-example">
    <div class="top-bar">
        <?php include('menu.php'); ?>
    </div>
        <div class="row">
	<div class="medium-11 medium-centered columns">
		<section>
			<h1>Reporte administrador</h1>
            
			<table id="reporte" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
                        <th>Estudio</th>
						<th>Nombre</th>
                        <th>Fecha Estudio</th>
						<th>Laboratorio</th>
                        <th>Estatus</th>
                        <th>Archivo</th>
						<th>Médico</th>
					</tr>
				</thead>
			
			</table>

		</section>
	</div>
            </div>
			
			
</body>
	<script type="text/javascript">
				
					$(document).foundation();
	
				</script>
    
</html>

