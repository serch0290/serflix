function guardarComentario(){
	event.preventDefault();
	let nombre = $('#nombre').val();
	let email = $('#email').val();
	let mensaje = $('#mensaje').val();

	if(!nombre){
	   alert('Favor de introducir el nombre');
	   return;
	}

	if(!email){
	   alert('Favor de introducir tÃº email');
	   return;
	}
	
	if(!mensaje){
	   alert('Favor de introducion el mensaje');
	   return;
	}

	$.ajax({
		type: 'POST',
		url: 'http://localhost/serflix/assets/php/guardarComentarios.php',
		data:{name:nombre,  email: email, comment: mensaje},
		success: function (response) {
			showModal('Comentario guardado correctamente.');
			$('#nombre').val('');
	        $('#email').val('');
	        $('#mensaje').val('');
		}
	});
}

function guardarContacto(){
    event.preventDefault();
	let nombre = $('#name').val();
	let email = $('#mail').val();
    let asunto = $("#asunto").val();
	let comentario = $('#comentario').val();

	if(!nombre){
	   alert('Favor de introducir el nombre');
	   return;
	}

	if(!email){
	   alert('Favor de introducir tÃº email');
	   return;
	}
	
	if(!comentario){
	   alert('Favor de introducion el mensaje');
	   return;
	}

	$.ajax({
		type: 'POST',
		url: 'http://localhost/serflix/assets/php/guardarContacto.php',
		data:{name:nombre, asunto: asunto, email: email, comment: comentario},
		success: function (response) {
			showModal('Gracias por tu comentario, nos pondremos en contacto contigo.');
			$('#name').val('');
	        $('#mail').val('');
	        $('#asunto').val('');
            $('#comentario').val('');
		}
	});

}//Fin del metodo