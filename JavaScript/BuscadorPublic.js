const inputBuscador = document.querySelector('.inputBuscador');
const contenedorResultados = document.querySelector('.ContenedorResultados');
function buscadora(_URL, _Busqueda) {
	$.ajax({
		url:_URL,
		type: 'post',
		dataType: 'html',
		data: {Busqueda: _Busqueda}
	})
	.done(res => {
		while(contenedorResultados.firstChild) {
			contenedorResultados.removeChild(contenedorResultados.firstChild);
		}
		if(res == '') return;
		const resultadosBusqueda = JSON.parse(res);
		
		resultadosBusqueda.map(Resultado => {
			//Crear las etiquetas
			let resultadoContenedor = document.createElement('div');
			let resultadoLink = document.createElement('a');
			let resultadoImagen = document.createElement('img');
			let resultadoNombre = document.createElement('p');
			//Dandole los valores.
			let numeroImagen = Resultado.Id.toString().split('').pop();
			resultadoLink.href = 'PaginasItems/Producto' + Resultado.Id +'.html';
			resultadoImagen.src = '../Imagenes/Computadora' + numeroImagen + '.jpg';
			resultadoNombre.innerHTML = Resultado.Marca + ' - ' + Resultado.Modelo;
			//Dandole los estilos.
			resultadoContenedor.classList.toggle("Resultados");
			resultadoLink.classList.toggle("ResultadoLink");
			resultadoImagen.classList.toggle("ResultadoImagen");
			resultadoNombre.classList.toggle("ResultadoNombre");
			//Metiendolos a donde deben de ir.
			resultadoLink.appendChild(resultadoImagen);
			resultadoLink.appendChild(resultadoNombre);
			resultadoContenedor.appendChild(resultadoLink);
			contenedorResultados.appendChild(resultadoContenedor);
		});
	});
}


inputBuscador.onkeyup = () => {
	buscadora('../PHP/BuscadorProductos.php', inputBuscador.value);
};
