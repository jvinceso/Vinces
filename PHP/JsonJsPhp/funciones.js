$(document).ready(function(){
// Una vez Listo el Documento Cargamos la Tabla Generada con Datos SQL
	$.post("data.php",{},function(tabla){
		$("#TableProducts").html(tabla);
	});
})
function EditarProducto(ObJson){
	console.log(ObJson);
	alert(ObJson.codigo);
}
function ConfirmaEliminaConcepto (ObJson){
	if(confirm("Deseas Eliminar a "+ObJson.codigo)){
		alert("no te alegres solo era una prueba");
	}else{
		alert("no esperes que se borre porque no hay ningun metodo especifico que haga eso jiji ");
	}
}