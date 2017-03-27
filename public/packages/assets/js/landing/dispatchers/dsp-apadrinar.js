$(function(){

    /* seleccionamos una casa hogar y mostramos a sus niños */
    $('.btn-homes').click(function(){
        apadrinarController.getChildren($(this).data("inst"));
        $('#nameHome').text($(this).data("name"));
        $('#content-homes').addClass('displaynone');
        $('#text-info').addClass('displaynone');
        $('#content-children').removeClass('displaynone');
    });

    /* cerramos la muestra de los niños y volvemos a mostrar las casas hogares */
    $('#close').click(function(){
        $('#content-homes').addClass('fadeInLeftBig');
        $('#content-homes').removeClass('displaynone');
        $('#text-info').removeClass('displaynone');
        $('#content-children').addClass('displaynone');
    });

    /* seleccionamos una casa hogar y mostramos a sus niños */
    $('body').on('click','.btn-homesChild',function(e){
        e.preventDefault();
        var src = '/packages/assets/media/images/instituciones/children/'+$(this).data('foto');
        $('#img-modalChild').attr('src',src);
        $('#nameChild').text($(this).data('childname'));
    });

});
