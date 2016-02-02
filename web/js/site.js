$(function(){

    $('#comite-fecha_inicio-disp').change(function(){

        if($(this).val().length > 4 &&  $('#comite-fecha_fin-disp').val().length < 4){
            $('#comite-fecha_fin-disp').val($(this).val());
            $('#comite-fecha_fin').val($('#comite-fecha_inicio').val());
        }

    });

    $('#detalleproyecto-id_municipio').change(function(){
        $.get(
            '/cobertura/web/index.php?r=divipola/latlon',
            {
                id : $(this).val()
            },
            function (data) {
                datos = JSON.parse(data);
                $('#detalleproyecto-latitud').val(datos.lat);
                $('#detalleproyecto-longitud').val(datos.lon);
            }
        );
    });

});