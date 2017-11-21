function Carga(url, id) {
    //Creamos un objeto dependiendo del navegador
    var objeto;
    if (window.XMLHttpRequest)
    {
        //Mozilla, Safari, etc
        objeto = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
        //Nuestro querido IE
        try {
            objeto = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try { //Version mas antigua
                objeto = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
            }
        }
    }
    if (!objeto)
    {
        alert("No ha sido posible crear un objeto de XMLHttpRequest");
    }
    //Cuando XMLHttpRequest cambie de estado, ejecutamos esta funcion
    objeto.onreadystatechange = function ()
    {
        cargarobjeto(objeto, id)
    }
    objeto.open('POST', url, true) // indicamos con el método open la url a

    objeto.send(null) // Enviamos los datos con el metodo send
}

function cargarobjeto(objeto, id) {
    if (objeto.readyState == 4) //si se ha cargado completamente
        document.getElementById(id).innerHTML = objeto.responseText
    else //en caso contrario, mostramos un gif simulando una precarga
        document.getElementById(id).innerHTML = 'Cargando datos...</center>'
}

function Carga2(url, id, data) {
    //Creamos un objeto dependiendo del navegador
    var objeto;
    if (window.XMLHttpRequest)
    {
        //Mozilla, Safari, etc
        objeto = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
        //Nuestro querido IE
        try {
            objeto = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try { //Version mas antigua
                objeto = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
            }
        }
    }
    if (!objeto)
    {
        alert("No ha sido posible crear un objeto de XMLHttpRequest");
    }
    //Cuando XMLHttpRequest cambie de estado, ejecutamos esta funcion
    objeto.onreadystatechange = function ()
    {
        cargarobjeto2(objeto, id, data)
    }
    objeto.open('POST', url, true) // indicamos con el método open la url a

    objeto.send(null) // Enviamos los datos con el metodo send
}

function cargarobjeto2(objeto, id, data) {
    if (objeto.readyState == 4) { //si se ha cargado completamente
        document.getElementById(id).innerHTML = objeto.responseText
        $("#municipio").val(data.row.IdMunicipio);
        $("#ciudadNacimiento").val(data.row.IdMunicipioNacimiento);
        $("#ciudadResidencia").val(data.row.IdMunicipioResidencia);
        $("#ciudadNacimientoAdulto").val(data.row.IdMunicipioNacimiento);
        $("#ciudadResidenciaAdulto").val(data.row.IdMunicipioResidencia);
        $("#ciudadNacimientoVolunEgres").val(data.row.IdMunicipioNacimiento);
        $("#ciudadResidenciaVolunEgres").val(data.row.IdMunicipioResidencia);
        $("#ciudadNacimientoCEx").val(data.row.IdMunicipioNacimiento);
        $("#ciudadResidenciaCEx").val(data.row.IdMunicipioResidencia);
        $("#ciudadCompania").val(data.row.IdCiudadCompania);
        $("#tecnicaTaller").val(data.row.IdTecnica);
        $("#padrinos").val(data.row.IdPadrino);
        $("#participante").val(data.row.IdFicha);
        $("#aliado2").val(data.row.Aliado2);
        $("#aliado3").val(data.row.Aliado3);
    }
    else //en caso contrario, mostramos un gif simulando una precarga
        document.getElementById(id).innerHTML = 'Cargando datos...</center>'
}