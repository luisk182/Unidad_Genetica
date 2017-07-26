<!DOCTYPE html>
<?php
session_start();

if ($_SESSION['perfil']!=4 and $_SESSION['perfil']!=5)  
	{
		echo "<script> window.location = '../error-login.php'</script>";
		//header('Location:../error.php');
	}
else {
	$name = $_SESSION['nombre'];
	$apellido = $_SESSION['apellido'];
	$email = $_SESSION['email'];
	$activo = $_SESSION['activo'];
	$perfil=$_SESSION['perfil'];
	$idusuario= $_SESSION['IdUsuario'];
}
?>
<html>

<head>
<title>Reporte administrador </title>
	<?php   include('header_in.php');
            include ('dtheader.php');	
    ?>
	<script type="text/javascript" language="javascript" class="init">
          var editor;
		 
		  
		 // var hoy= dia.getDate();
            $(document).ready(function(){
                editor= new $.fn.dataTable.Editor({       
                    ajax:"scripts/r_admin.php",
                    table:"#reporte",  
                    fields:[{
                        label:"Fecha recepción",
                        name:"altaestudios.FechaEstudio",
                        type:"datetime",
                        opts:{
                            maxDate: new Date()
                        }
                }, 
					{
						label:"Fecha entrega",
						name:"altaestudios.FechaEntrega",
						type:"datetime",
						opts:{
							minDate: new Date(new Date().valueOf()-1000*60*60*24),
							maxDate: new Date()
						
						}
				},
                    {
                        label:"Paciente",
                        name:"altaestudios.IdUsuario", //Select llenado dinamicamente
                        type:"select",
                        placeholder:"Seleccione Paciente"
                },
					{
						label:"Médico",
                        name:"altaestudios.IdMedico", //Select llenado dinamicamente
                        type:"select",
                        placeholder:"Sin especificar"
						
				},
                    {
                        label:"Laboratorio",
                        name:"altaestudios.IdLaboratorio",
                        type:"select",
						placeholder:"Seleccione un laboratorio.. "
                        
                },
				
				
                    {
                        label:"Restringido",
                        name:"altaestudios.activo",
                        type:"radio",
                        options:[
							{ label:"No (El paciente podrá ver el estudio)",    value:0 },
							{ label:"Si (El paciente no podrá ver el estudio)",  value:1 } 
                            
                            
                        ]
                },
                    {
                        label:"Tipo estudio",
                        name:"altaestudios.IdTipoEstudio",
                        type:"select",
						placeholder:"Seleccione un estudio"						
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
									_: "¿Estás seguro que deseas borrar %d registros?",
									1: "¿Estás seguro que deseas borrar 1 registro?"
								}
							},
							multi:{
								 title: "Múltiple edición",
								info: "El campo seleccionado contiene diferentes valores para este campo. Para editar y seleccionar un solo valor para esta campo, has clic aquí, de otra forma mantendrán sus valores individuales ",
								restore: "Deshacer cambios"
								
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
                    {data:"paciente",
                        render: function (data, type, row){
							if (data.nombre==null){
								return 'Paciente no existe';
							}
							else{
								return data.nombre+' '+data.apellido;   
							}
                        }						
                    },
					{data:"medico",
                        render: function (data, type, row){
								if (data.nombre==null){
								return 'Sin especificar';
							}
							else{
								return data.nombre+' '+data.apellido;   
							}
                         
                        }					
					},
                    {data:"altaestudios.FechaEstudio"},
                    {data:"altaestudios.FechaEntrega"},
                    {data:"laboratorio.NombreLaboratorio"},
                    {data:"altaestudios.activo",
                        render: function(data){
                            return data==1? 'Si' : 'No';
                        }
                    },
                    {data:"altaestudios.archivo",
                        render: function(file_IdArchivo){
                           return  file_IdArchivo?
                               '<a href="'+editor.file('archivo', file_IdArchivo).web_path+'" download><i class="fi-download"></i> Archivo</a> / '+  '<a href="'+editor.file('archivo', file_IdArchivo).web_path+'" target="_blank"><i class="fi-eye"></i>Ver</a>' :
                               'No hay archivos';
                            }
                    },
					
					
					
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
				text: 'Exportar Excel',
                extend: 'excel'
               
            }
               
            ] );
     } );
    </script>    
    </head>
	
    <body class="dt-example">
    <div class="top-bar">
        <?php include('menu.php'); ?>
    </div>
    <div class="row">
		<div class="medium-12  columns">
			<section>
				<h1>Alta estudios</h1>
				
				<table id="reporte" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Estudio</th>
							<th>Paciente</th>
							<th>Médico</th>
							<th>Fecha recepción</th>
							<th>Fecha entrega</th>
							<th>Laboratorio</th>
							<th>Restricción</th>
							<th>Archivo</th>
							
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

