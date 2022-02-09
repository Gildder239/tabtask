//Esta funcion es solo para muestras
function pruebaejemplo(){
    validStatuscheck('check','checkboxactiv',1);
    alert("se selecciono una opcion");
}



///////////////////////////////////////////////////////////////////////////////

//Muestra de como funciona el codigo real

function incideofrecimien(ofrecimiento, incidente, numeroarray) {

	if (incidente.value !== "") {
		let contenedor = document.getElementById("cuadofrecimi");
		loadingCogs(contenedor);
		/////////// POST /////////
		var http = new FormData();
		http.append("request", "ofrecimi_inciden");
		http.append("ofrecimiento", ofrecimiento);
		http.append("incidente", incidente);
		var request = new XMLHttpRequest();
		request.open("POST", "ajax_fns_incidente.php");
		request.send(http);
		request.onreadystatechange = function () {
			//console.log( request );
			if (request.readyState != 4) return;
			if (request.status === 200) {
				//console.log( request.responseText );
				resultado = JSON.parse(request.responseText);
				if (resultado.status !== true) {
					//console.log( resultado );
					contenedor.innerHTML = '...';
					return;
				}
				//tabla
				var data = resultado.data;
				contenedor.innerHTML = data;
				validStatuscheck('check', 'checkboxactiv', numeroarray);
			}
		};
	}
}