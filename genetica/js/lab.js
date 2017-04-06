        var editor;
        
        $(document).ready(function(){
            
            $("#paciente").DataTable({
                "ajax": "./scripts/lab_reporte.php",
                "processing": true,
                "serverSide": true,
                "language":{
                    "url": "lenguaje/spanish.json"
                }, 
                buttons: [
                    {
                        extend:"copy",
                        text:"Copiar"
                    },
		]
     });
});