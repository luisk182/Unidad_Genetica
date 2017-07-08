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
 
   
   $name = $_SESSION['nombre'];
   $apellido = $_SESSION['apellido'];
   $email = $_SESSION['email'];
   $activo = $_SESSION['activo'];

}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Unidad Genética - Laboratorios</title>
    <?php   include('header_in.php');
            include ('dtheader.php');
    ?>
    
    <script type="text/javascript" language="javascript" class="init">
          var editor;
            $(document).ready(function(){
                editor= new $.fn.dataTable.Editor({       
                    ajax:"scripts/a_Laboratorio.php",
                    table:"#laboratorio",  
                    
                    fields:[{
                        label:"Nombre",
                        name:"NombreLaboratorio"
                }
                    ],
					i18n: {
							edit: {submit: "Guardar"},
							create:{submit:"Crear"},
							remove:{
								submit:"Borrar",
								confirm:{
									_: "¿Estas seguro que deseas borrar %d lineas?",
									1: "¿Estas seguro que deseas borrar 1 línea?"
								}
						}	
					}							
            });
            
         var table= $("#laboratorio").DataTable({
        
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
               lengthChange: false,
                ajax:"scripts/a_Laboratorio.php",
                columns:[{data:"NombreLaboratorio"},],
             
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
        });
  
    </script>    
    
    </head>
    <body>
    <nav class="top-bar" data-topbar role="navigation">
        <?php include('menu.php'); ?>
    </nav>
    

	<div class="container">
		<section>
		
            <div class="row">
                 <div class="small-12 columns">
                    <h1>Alta Laboratorio</h1>
			         <table id="laboratorio" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nombre Laboratorio</th>
                            </tr>
                        </thead>

			         </table>
                </div>
            </div>
		</section>
	</div>
</body>
    
</html>