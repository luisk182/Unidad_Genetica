<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Reporte Admin </title>
    <!--foundation -->
    <link rel="stylesheet" href="../fonts/foundation-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.foundation.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.foundation.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.1/css/select.foundation.min.css">
    <link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.foundation.min.css">
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/foundation.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.foundation.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.foundation.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
    <script type="text/javascript" language="javascript" src="../js/dataTables.editor.min.js"></script>
    <script type="text/javascript" src="https://editor.datatables.net/extensions/Editor/js/editor.foundation.min.js"></script>

    	
    <link rel="stylesheet" type="text/css" href="resources/demo.css">
    
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
                    "url": "./lenguaje/spanish.json"
                },
                dom:"Bftrip",
            
                ajax:"scripts/r_Laboratorio.php",
                columns:[
                    {data:"tipoestudio.Nombre"},
                    {data: "usuario",
                        render: function(data, type, row)
                     {
                         return data.Nombre+' '+data.Apellido;
                     }
                    },
                    {data:"altaestudios.FechaEstudio"},
                    {data:"archivo.web_path",
                        render: function(data){
                            return '<a href="'+data+'" download><i class="fi-download"></i> Archivo</a>';
                        }
                    }          
                    
                ],
                select:false,
                 buttons:[
  
		]   
           } );
            
     });

    </script>    

    
    </head>
    
    
    <body class="dt-example">
    <nav class="top-bar" data-topbar role="navigation">
        <?php include('menu.html'); ?>
    </nav>
	<div class="container">
		<section>
			<h1>Reporte </h1>
			
			<div class="demo-html"></div>
			<table id="paciente" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Nombre de estudio</th>
                        <th>Nombre Paciente</th>
						<th>Fecha Estudio</th>
						<th>Archivo</th>
                       
					</tr>
				</thead>
                <tbody>
             
                    
                </tbody>
			
			</table>
		
		</section>
	</div>
	
</body>
    
</html>