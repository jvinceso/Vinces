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