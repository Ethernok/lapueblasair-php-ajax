$(editarAsync());

function editarAsync(datos)
{
	$.ajax({
		url : 'procesarEditar.php',
		type : 'POST',
		dataType : 'html',
        data : { datos: datos },
        success: (datos) => {
            
        }
		})

	.done(function(resultado){
        
		$("#tabla-vuelos").html(resultado);
	})
}