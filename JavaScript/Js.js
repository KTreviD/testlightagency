const vendidosProductos = document.getElementById("VendidosProductos");
const tituloVendidos = document.getElementById("TituloVendidos");
const destacadosProductos = document.getElementById("DestacadosProductos");
const tituloDestacados = document.getElementById("TituloDestacados");
var productosVendidos = [], producto = [], imgProducto = [], divInfoProducto = [], marcaModeloProducto = [], precioProducto = [];
var productosDestacados = [], calificacion = [], calificacionPromedio = [], linkProducto= [];
function ajaxVendidos(_URL) {
	var http = new XMLHttpRequest();

	http.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200) {
			productosVendidos = JSON.parse(this.responseText);
			crear10Categoria(productosVendidos, 'Escritorio', tituloVendidos, vendidosProductos, 0);
		}
	}
	http.open('POST',_URL);
	http.send();
}
function ajaxDestacados(_URL) {
	var http = new XMLHttpRequest();

	http.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200) {
			productosDestacados = JSON.parse(this.responseText);
			crear10Categoria(productosDestacados, 'Escritorio', tituloDestacados, destacadosProductos, 10);
		}
	}
	http.open('POST',_URL);
	http.send();
}

function crear10Categoria(_Productos, _Categoria, _Titulo, _ContenedorProductos, _ForNum) {
	_Titulo.innerHTML = _Titulo == tituloVendidos ? 'Productos mas vendidos - ' + _Categoria : 'Productos mas destacados - ' + _Categoria;
	while(_ContenedorProductos.firstChild) {
		_ContenedorProductos.removeChild(_ContenedorProductos.firstChild);
	}
	let i = 0;
	for(let j = _ForNum; j < (_ForNum + 10); j++) {
		if(_Productos[i] == undefined) return;
		if(_Categoria == _Productos[i].Clasificacion ) {
			//Creando las etiquetas.
			linkProducto[i] = document.createElement('a');
			producto[i] = document.createElement('div');
			imgProducto[i] = document.createElement('img');
			divInfoProducto[i] = document.createElement('div');
			marcaModeloProducto[i] = document.createElement('p');
			precioProducto[i] = document.createElement('p');
			calificacion[i] = document.createElement('p');
			//Dandole los valores.
			linkProducto[i].href = 'PaginasItems/Producto' + _Productos[i].Id +'.html';
			if(_Productos[i].Calificacion == 0) calificacionPromedio[i] = ' Not rated';
			else calificacionPromedio[i] = _Productos[i].Calificacion;
			let numeroImagen = _Productos[i].Id.toString().split('').pop();
			imgProducto[i].src = '../Imagenes/Computadora' + numeroImagen + '.jpg';
			marcaModeloProducto[i].innerHTML = _Productos[i].Marca + ' - ' + _Productos[i].Modelo;
			precioProducto[i].innerHTML = 'Precio: $' + _Productos[i].Precio;
			calificacion[i].innerHTML = 'Calificacion: ' + calificacionPromedio[i];
			//Dandole los estilos.
			linkProducto[i].classList.toggle('LinkProducto');
			producto[i].classList.toggle("Producto");
			imgProducto[i].classList.toggle("Img");
			divInfoProducto[i].classList.toggle("DivInfo");
			marcaModeloProducto[i].classList.toggle("Modelo");
			precioProducto[i].classList.toggle("Precio");
			calificacion[i].classList.toggle("Calificacion");
			//Metiendolos a donde deben de ir.
			divInfoProducto[i].appendChild(marcaModeloProducto[i]);
			divInfoProducto[i].appendChild(precioProducto[i]);
			divInfoProducto[i].appendChild(calificacion[i]);
			producto[i].appendChild(imgProducto[i]);
			producto[i].appendChild(divInfoProducto[i]);
			linkProducto[i].appendChild(producto[i]);
			_ContenedorProductos.appendChild(linkProducto[i]);
		}
		else {
				i++;
				j--;
		}
		i++;
	}
}

ajaxVendidos('../PHP/consultaVendidos.php');
ajaxDestacados('../PHP/consultaDestacados.php');

document.getElementById('Escritorio').addEventListener('click', () => {
	crear10Categoria(productosVendidos, 'Escritorio', tituloVendidos, vendidosProductos, 0);
	crear10Categoria(productosDestacados, 'Escritorio', tituloDestacados, destacadosProductos, 10);
});
document.getElementById('Gamers').addEventListener('click', () => {
	crear10Categoria(productosVendidos, 'Gamers', tituloVendidos, vendidosProductos, 0);
	crear10Categoria(productosDestacados, 'Gamers', tituloDestacados, destacadosProductos, 10);
});
document.getElementById('Diseñadores').addEventListener('click', () => {
	crear10Categoria(productosVendidos, 'Diseñadores', tituloVendidos, vendidosProductos, 0);
	crear10Categoria(productosDestacados, 'Diseñadores', tituloDestacados, destacadosProductos, 10);
});
document.getElementById('Laptops').addEventListener('click', () => {
	crear10Categoria(productosVendidos, 'Laptops', tituloVendidos, vendidosProductos, 0);
	crear10Categoria(productosDestacados, 'Laptops', tituloDestacados, destacadosProductos, 10);
});
document.getElementById('Estudiantiles').addEventListener('click', () => {
	crear10Categoria(productosVendidos, 'Estudiantiles', tituloVendidos, vendidosProductos, 0);
	crear10Categoria(productosDestacados, 'Estudiantiles', tituloDestacados, destacadosProductos, 10);
});
document.getElementById('Investigadores').addEventListener('click', () => {
	crear10Categoria(productosVendidos, 'Investigadores', tituloVendidos, vendidosProductos, 0);
	crear10Categoria(productosDestacados, 'Investigadores', tituloDestacados, destacadosProductos, 10);
});
document.getElementById('Programadores').addEventListener('click', () => {
	crear10Categoria(productosVendidos, 'Programadores', tituloVendidos, vendidosProductos, 0);
	crear10Categoria(productosDestacados, 'Programadores', tituloDestacados, destacadosProductos, 10);
});
document.getElementById('Vintage').addEventListener('click', () => {
	crear10Categoria(productosVendidos, 'Vintage', tituloVendidos, vendidosProductos, 0);
	crear10Categoria(productosDestacados, 'Vintage', tituloDestacados, destacadosProductos, 10);
});
document.getElementById('Presentaciones').addEventListener('click', () => {
	crear10Categoria(productosVendidos, 'Presentaciones', tituloVendidos, vendidosProductos, 0);
	crear10Categoria(productosDestacados, 'Presentaciones', tituloDestacados, destacadosProductos, 10);
});
document.getElementById('Empresas').addEventListener('click', () => {
	crear10Categoria(productosVendidos, 'Empresas', tituloVendidos, vendidosProductos, 0);
	crear10Categoria(productosDestacados, 'Empresas', tituloDestacados, destacadosProductos, 10);
});