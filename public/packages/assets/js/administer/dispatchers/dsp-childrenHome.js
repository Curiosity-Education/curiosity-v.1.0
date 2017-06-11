$(function(){

    var typeSave = null;
    var var_instution = null;
    var object = null;
    var var_id = null;
    var imgOth;
    var imgOth_flag = false;

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
        $("#adf-boxChildren").empty();
        $("#agf-row-children").hide();
        $("#agf-row-inst").show();
        $("#agf-row-inst").addClass('animated zoomIn');
    });

    $("body").on("click", ".agf-btnround-confChild", function(){
        let object;
        try {
            object = JSON.parse($(this).data('o'));
        } catch (e) {
            object = $(this).data('o');
        }
        var_id = parseInt(object.id);
        admChHomController.fillData(object, $(this).data('f'));
        typeSave = "update";
        $("#agf-modal").modal("show");
    });

    $("body").on("click", "#agf-btnReg", function(){
        admChHomController.photo = '/packages/assets/media/images/padrino_curiosity/child-default.png';
        $("#agf_ph").attr('src', admChHomController.photo);
        typeSave = "registry";
        $("#agf-form input").val("");
        $("textarea").val("");
        $("#agf-modal").modal("show");
    });

    $("body").on("click", "#agf-save", function(){
        admChHomController.saveChild(var_instution, var_id, typeSave);
    });

    $("#agf_photo").change(function(event) {
        admChHomController.selectFile($(this));
    });

    $("#agf-resetPhoto").click(function(event) {
        admChHomController.resetImage();
    });

    $("#agf-cancel").click(function(event) {
        admChHomController.resetImage();
    });

    $("body").on('click', '.agf-btnround-hideChild', function(){
        let id = $(this).data('c');
        Curiosity.notyInput("Escribe la palabra ELIMINAR para continuar.","text",function(input){
            if(input == "ELIMINAR" || input == "eliminar"){
                admChHomController.deleteChild(id);
            }
        });
    });

    $("body").on('click', '.agf-btnvisible', function(){
        let id = $(this).data('h');
        Curiosity.notyInput("Escribe la palabra ACEPTAR para continuar.","text",function(input){
            if(input == "ACEPTAR" || input == "aceptar"){
                admChHomController.hideShowHome(id);
            }
        }, "ACEPTAR", "aceptar");
    });

    $("#agf-selectPhotoOther").click(function(event) {
        $("#agf-body-mdl-bdy").empty();
        let gender = $("#agf_genre").val();
        for (var i = 0; i < 5; i++) {
            let code = `<div class="col-md-3">
                <img src="/packages/assets/media/images/padrino_curiosity/others_to_select/${gender}/${i+1}.png" class="img-fluid agf-imgOth img-thumbnail" style="cursor:pointer;" data-bind="${i+1}">
                <br>
            </div>`;
            $("#agf-body-mdl-bdy").append(code);
        }
        $("#agf-mdl-others").modal('show');
    });

    $("body").on('click', '.agf-imgOth', function(){
        if ($(this).hasClass('imgoth-active')){
            $(this).removeClass('imgoth-active');
            $("#btn-agf-oth").prop('disabled', true);
            imgOth = undefined;
            imgOth_flag = false;
        }
        else {
            $('body').find('.agf-imgOth').removeClass('imgoth-active');
            $(this).addClass('imgoth-active');
            $("#btn-agf-oth").prop('disabled', false);
            imgOth = $(this).data('bind');
            imgOth_flag = true;
        }
    });

    $("#btn-agf-oth").click(function(event) {
        if (imgOth_flag){
            let gender = $("#agf_genre").val();
            $("#agf_ph").attr('src', `/packages/assets/media/images/padrino_curiosity/others_to_select/${gender}/${imgOth}.png`);
            $("#agf-mdl-others").modal('hide');
            $("#agf-body-mdl-bdy").empty();
        }
        else {
            alert('No has seleccionado ninguna imagen');
        }
    });

});
