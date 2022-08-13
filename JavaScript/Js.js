const ContenedorVendidos = document.querySelector(".ContenedorVendidos");

var Productos = [], Producto = [], ImgProducto = [], DivInfoProducto = [], MarcaModeloProducto = [], PrecioProducto = [];
var Calificacion = [], CalificacionPromedio = [], LinkProducto= [];

function Ajax(_URL) {
	var http = new XMLHttpRequest();

	http.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200) {
			Productos = JSON.parse(this.responseText);
			crearMasVendidos('Escritorio');
		}
	}
	http.open('POST',_URL);
	http.send();
}


function crearMasVendidos(Categoria) {
	while(ContenedorVendidos.firstChild) {
		ContenedorVendidos.removeChild(ContenedorVendidos.firstChild);
	}
	let i = 0;
	for(let j = 0; j < 10; j++) {
		if(Productos[i] == undefined) return;
		if(Categoria == Productos[i].Clasificacion ) {
			//Creando las etiquetas
			LinkProducto[i] = document.createElement('a');
			Producto[i] = document.createElement('div');
			ImgProducto[i] = document.createElement('img');
			DivInfoProducto[i] = document.createElement('div');
			MarcaModeloProducto[i] = document.createElement('p');
			PrecioProducto[i] = document.createElement('p');
			Calificacion[i] = document.createElement('p');
			//Dandole los valores.
			LinkProducto[i].href = 'PaginasItems/Producto' + (i + 1) +'.html';
			if(Productos[i].Calificacion == 0) CalificacionPromedio[i] = ' Not rated';
			else CalificacionPromedio[i] = Productos[i].Calificacion;
			ImgProducto[i].src = 'Imagenes/Computadora' + (Math.floor(Math.random() * 10) + 1) + '.jpg';
			MarcaModeloProducto[i].innerHTML = Productos[i].Marca + ' - ' + Productos[i].Modelo;
			PrecioProducto[i].innerHTML = 'Precio: ' + Productos[i].Precio;
			Calificacion[i].innerHTML = 'Calificacion: ' + CalificacionPromedio[i];
			//Dandole los estilos.
			LinkProducto[i].classList.toggle('LinkProducto');
			Producto[i].classList.toggle("Producto");
			ImgProducto[i].classList.toggle("Img");
			DivInfoProducto[i].classList.toggle("DivInfo");
			MarcaModeloProducto[i].classList.toggle("Modelo");
			PrecioProducto[i].classList.toggle("Precio");
			Calificacion[i].classList.toggle("Calificacion");
			//Metiendolos a donde deben de ir.
			DivInfoProducto[i].appendChild(MarcaModeloProducto[i]);
			DivInfoProducto[i].appendChild(PrecioProducto[i]);
			DivInfoProducto[i].appendChild(Calificacion[i]);
			Producto[i].appendChild(ImgProducto[i]);
			Producto[i].appendChild(DivInfoProducto[i]);
			LinkProducto[i].appendChild(Producto[i]);
			ContenedorVendidos.appendChild(LinkProducto[i]);
		}
		else {
				i++;
				j--;
		}
		i++;
	}
}

Ajax('PHP/consultaProductos.php');

document.getElementById('Escritorio').addEventListener('click', () => {
	crearMasVendidos('Escritorio');
});
document.getElementById('Gamers').addEventListener('click', () => {
	crearMasVendidos('Gamers');
});
document.getElementById('Diseñadores').addEventListener('click', () => {
	crearMasVendidos('Diseñadores');
});
document.getElementById('Laptops').addEventListener('click', () => {
	crearMasVendidos('Laptops');
});
document.getElementById('Estudiantiles').addEventListener('click', () => {
	crearMasVendidos('Estudiantiles');
});
document.getElementById('Investigadores').addEventListener('click', () => {
	crearMasVendidos('Investigadores');
});
document.getElementById('Programadores').addEventListener('click', () => {
	crearMasVendidos('Programadores');
});
document.getElementById('Vintage').addEventListener('click', () => {
	crearMasVendidos('Vintage');
});
document.getElementById('Presentaciones').addEventListener('click', () => {
	crearMasVendidos('Presentaciones');
});
document.getElementById('Empresas').addEventListener('click', () => {
	crearMasVendidos('Empresas');
});

