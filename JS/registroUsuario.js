$(document).ready(function(){

	$("#activarRegistro").click(function(e){

		e.preventDefault();

		$("#obscurecer").fadeIn(600, mostrarFormulario);

	});
	
	
	
	

});

function mostrarFormulario(){

	$("#registro").fadeIn(700);

	$("#obscurecer").click(desvanecerFormulario);
	
	$("#cerrarRegistro").click(desvanecerFormulario);

}


/*En combinación las funciones desvanecerFormulario y desvanecerObscuridad le dan
un efecto de transcisión más lenta para quitar de pantalla el formulario y la
obscuridad detrás de él.*/

function desvanecerFormulario(){

	$("#registro").fadeOut(500, desvanecerObscuridad);

}

function desvanecerObscuridad(){

	$("#obscurecer").fadeOut(300);

}





