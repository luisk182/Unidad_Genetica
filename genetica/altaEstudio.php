<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Unidad Genética - Alta usuarios </title>
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
                editor = new $.fn.dataTable.Editor({  
         
                    ajax:"scripts/r_Estudios.php",
                    table:"#estudios",  
                    fields:[{
                        label:"Clave",
                        name:"ClaveEstudio"
                },
                    {
                        label:"Nombre",
                        name:"Nombre"    
                }
                    ] 
            });
         var table= $("#estudios").DataTable({
                lengthChange: false, 
                "language":{
                    "url": "./lenguaje/spanish.json"
                },
                    initComplete: function (settings, json){
                            table.buttons().container()
                            .appendTo( $('.small-6.columns:eq(0)', table.table().container() ) );
                
                },
               
                ajax:"scripts/r_Estudios.php",
                columns:[{data:"ClaveEstudio"},{data:"NombreEstudio"}],
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
    <body>
    <nav class="top-bar" data-topbar role="navigation">
        <?php include('menu.php'); ?>
    </nav>
    

	<div class="container">
		<section>
	
        <div class="row">
            
            <div class="small-10 small-offset-1 columns">
             <h1>Alta Estudios</h1>
			<table id="estudios" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
                        <th>Clave Estudio</th>
                        <th>Nombre estudio</th>
						
            
					</tr>
				</thead>
			
			</table>
            </div>
         </div>
		</section>
	</div>
</body>
    
</html>