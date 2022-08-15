const Id = document.getElementById('Id').innerHTML;
const contenedorComentarios = document.querySelector('.ComentariosContenedor');
const valoracion = document.querySelector('.Valoracion');

function BuscadorEvaluacion(_URL, _Id) {
	$.ajax({
		url:_URL,
		type: 'post',
		dataType: 'html',
		data: {Busqueda: _Id}
	})
	.done(res => { 
		resultado = JSON.parse(res);
		valoracion.innerHTML = 'Calificacion: ' + resultado[0].Calificacion + ' (' + resultado[0].NumCalificaciones + ')';
	});
}

BuscadorEvaluacion('../../PHP/ConsultarCalificaciones.php', Id);

function BuscadoraComentarios(_URL, _Id) {
	$.ajax({
		url:_URL,
		type: 'post',
		dataType: 'html',
		data: {Busqueda: _Id}
	})
	.done(res => {
		if(res == '') return;
		const resultadosBusqueda = JSON.parse(res);
		
		resultadosBusqueda.map(Resultado => {
			//Crear las etiquetas
			let resultadoContenedor = document.createElement('div');
			let resultadoNombre = document.createElement('p');
			let resultadoCalificacion = document.createElement('p');
			let resultadoTexto = document.createElement('p');
			//Dandole los valores.
			resultadoNombre.innerHTML = Resultado.Nombre;
			resultadoCalificacion.innerHTML = 'Calificacion: ' + Resultado.Calificacion;
			resultadoTexto.innerHTML = Resultado.Texto;
			//Dandole los estilos.
			resultadoContenedor.classList.toggle("ComentariosResultados");
			resultadoNombre.classList.toggle("ResultadoNombreComent");
			resultadoCalificacion.classList.toggle("ResultadoCalificacionComent");
			resultadoTexto.classList.toggle("ResultadoTextoComent");
			//Metiendolos a donde deben de ir.
			resultadoContenedor.appendChild(resultadoNombre);
			resultadoContenedor.appendChild(resultadoCalificacion);
			resultadoContenedor.appendChild(resultadoTexto);
			contenedorComentarios.appendChild(resultadoContenedor);
		});
	});
}

BuscadoraComentarios('../../PHP/ConsultarComentarios.php', Id);

