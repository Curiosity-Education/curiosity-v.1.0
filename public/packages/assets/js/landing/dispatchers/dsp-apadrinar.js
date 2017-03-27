$(function(){

    $('.btn-homes').click(function(){
        apadrinarController.getChildren($(this).data("inst"));
        $('#nameHome').text($(this).data("name"));
        $('#content-homes').addClass('displaynone');
        $('#content-children').removeClass('displaynone');
    });

});
