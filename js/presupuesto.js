$(document).ready(function() {
	
	$("#btnGuardar").click(function() {

		var parametros = {
			"Id": $("input#Id").val(),
			"Rubro": $("input#Rubro").val(),
			"Descripcion": $("input#Descripcion").val(),
			"Tiempo": $("input#Tiempo").val()
		};
		$.ajax({
			type: "POST",
			url: "../Controller/ctrlPresupuestoForm.php?opcion=1",
			data: parametros,
			success: function(data) {
				alert("Registro Guardado correctamente");

				$('#tblRol').load('../Administrador/presupuestosform.php table#tblRol');
			},
			error: function(data) {
				alert("No se pudo guardar el Presupuesto");
			}
		})
		
	})
});