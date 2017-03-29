$(function(){

    var typeSave = null;
    var var_instution = null;
    var object = null;

    $("#agf-selectPhoto").click(function(event) {
        $("#agf_photo").trigger('click');
    });

    $("body").on("click", ".agf-btnround-conf", function(){
        var_instution = $(this).data('h');
        admChHomController.getChildren(var_instution);
        $("#agf-row-inst").hide();
        $("#agf-row-children").show();
        $("#agf-row-children").addClass('animated zoomIn');
    });

    $("body").on("click", "#agf-back", function(){
        $("#agf-row-children").empty();
        $("#agf-row-children").hide();
        $("#agf-row-inst").show();
        $("#agf-row-inst").addClass('animated zoomIn');
    });

    $("body").on("click", ".agf-btnround-confChild", function(){
        admChHomController.fillData($(this).data('o'), $(this).data('f'));
        typeSave = "update";
        $("#agf-modal").modal("show");
    });

    $("body").on("click", "#agf-btnReg", function(){
        admChHomController.photo = '/packages/assets/media/images/padrino_curiosity/child-default.png';
        $("#agf_ph").attr('src', admChHomController.photo);
        typeSave = "registry";
        $("#agf-form input").val("");
        $("#agf-modal").modal("show");
    });

    $("body").on("click", "#agf-save", function(){
        if (typeSave == "registry") { admChHomController.saveChild(var_instution); }
        if (typeSave == "update") { admChHomController.updateChild(); }
    });

    $("#agf_photo").change(function(event) {
        admChHomController.selectFile($(this));
    });

    $("#agf-resetPhoto").click(function(event) {
        admChHomController.resetImage();
    });

});
