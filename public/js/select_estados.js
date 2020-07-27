$(document).ready(function(){
    // Cargamos los estados
    var estados = "<option value='' disabled selected>Estado</option>";

    for (var key in municipios) {
        if (municipios.hasOwnProperty(key)) {
            estados = estados + "<option value='" + key + "'>" + key + "</option>";
        }
    }

    $('#estado').html(estados);

    // Al detectar
    $( "#estado" ).change(function() {
        var html = "<option value='' disabled selected>Ciudad</option>";
        $( "#estado option:selected" ).each(function() {
            var estado = $(this).text();
            if(estado != "Selecciona el estado"){
                var municipio = municipios[estado];
                for (var i = 0; i < municipio.length; i++)
                    html += "<option value='" + municipio[i] + "'>" + municipio[i] + "</option>";
            }
        });
        $('#municipio').html(html);
    })
    .trigger( "change" );
});