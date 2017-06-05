<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['perfil']!=1) 
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
    <meta charset="utf-8">

	<title>Unidad Génetica reportes</title>
   <?php   include('header_in.php');
            include ('dtheader.php');
    ?>
    
    <script type="text/javascript" language="javascript" class="init">
          var editor;
            $(document).ready(function(){
                editor= new $.fn.dataTable.Editor({       
                    ajax:"scripts/r_Laboratorio.php",
                    table:"#paciente",  
                    fields:[] 
            });
           $("#paciente").DataTable({
                "language":{
                    "url": "./lenguaje/spanish.json",
					"select":{
						"rows":{
							"_":"%d filas seleccionadas",
							"0":"",
							"1":"1 fila seleccionada"
						}
					}
                },
                 initComplete: function (settings, json){
                            table.buttons().container()
                            .appendTo( $('.small-6.columns:eq(0)', table.table().container() ) );
                
                },
            
                ajax:"scripts/r_Laboratorio.php",
                columns:[
                   
                    {data: "usuario",
                        render: function(data, type, row)
                     {
                         return data.nombre+' '+data.apellido;
                     }
                    },
					 {data:"tipoestudio.NombreEstudio"},
                    {data:"altaestudios.FechaEstudio"},
                    {data:"archivo.web_path",
                        render: function(data){
                            return '<a href="'+data+'" download><i class="fi-download"></i> Archivo</a>' +' / '+ '<a href="'+data+'" target="_blank"><i class="fi-eye"></i> Ver</a>';
                        }
                    }
                    
                ],
                select:false,
                 buttons:[]   
           } );
            
     });

    </script>    

    
    </head>
    
    
    <body class="dt-example">
    <nav class="top-bar" role="navigation">
        <?php include('menu_pac.php'); ?>
    </nav>
	<div class="row">
		<div class="medium-12 columns"
		<section>
			<h1>Reporte </h1>
			
			<div class="demo-html"></div>
			<table id="paciente" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
					   <th>Nombre Paciente</th>
						<th>Nombre de estudio</th>
						<th>Fecha Estudio</th>
						<th>Archivo</th>
                       
					</tr>
				</thead>
                <tbody>
                </tbody>
			</table>
		
		</section>
	</div>
</div>
</body>
    
</html>