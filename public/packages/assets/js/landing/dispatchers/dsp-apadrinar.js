$(function(){

    $('.btn-homes').click(function(){
        apadrinarController.getChildren($(this).data("inst"));
        $('#content-homes').addClass('displaynone');
        $('#content-children').removeClass('displaynone');
    });

});
