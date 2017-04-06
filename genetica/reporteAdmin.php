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
    <!-- Scripts js -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/foundation.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.foundation.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.foundation.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
    <script type="text/javascript" language="javascript" src="../js/dataTables.editor.min.js"></script>
    <script type="text/javascript" src="editor.autoComplete.js"></script>
    <script type="text/javascript" src="https://editor.datatables.net/extensions/Editor/js/editor.foundation.min.js"></script>
    <link rel="stylesheet" type="text/css" href="resources/demo.css">
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
                        label:" Usuario",
                        name:"altaestudios.IdUsuario", //Select llenado dinamicamente del left join
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
                            }
                }        
                    ] 
            });
            
         var table= $("#reporte").DataTable({
              lengthChange: false,
               
                "language":{
                    "url": "./lenguaje/spanish.json"
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
                            return data.Nombre+' '+data.Apellido;
                            
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
                               '<a href="'+editor.file('archivo', file_IdArchivo).web_path+'" download><i class="fi-download"></i> Archivo</a> / '+  '<a href="'+editor.file('archivo', file_IdArchivo).web_path+'"><i class="fi-eye"></i>Ver</a>' :
                               'No hay archivos';
                            }
                    }
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
    <nav class="top-bar" data-topbar role="navigation">
        <?php include('menu.html'); ?>
    </nav>
	<div class="container">
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
					</tr>
				</thead>
			
			</table>

		</section>
	</div>
</body>
    
</html>