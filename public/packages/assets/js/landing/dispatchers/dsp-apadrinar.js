
$(document).ready(function(){
    $(function () {
        $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
    });
});

new WOW().init();

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

    $('body').on('click','.btn-homesChild',function(e){
        e.preventDefault();
        StorageDB.table.create("sponsoredChild", parseInt($(this).data("childid")));
        var src = '/packages/assets/media/images/padrino_curiosity/'+$(this).data('foto');
        $('#img-modalChild').attr('src',src);
        $('#nameChild').text($(this).data('childname'));
        $("#content-children").hide("slow");
        $("#paybox").show("slow");
    });

    $("#homes-backfrompay").click(function(event) {
        $("input").val("");
        $("#paybox").hide("slow");
        $("#content-children").show("slow");
    });

    $("#btnConfirm").click(function(e) {
        e.preventDefault();
        apadrinarController.payment();
    });

});
