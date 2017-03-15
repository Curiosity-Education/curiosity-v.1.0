var selectAvatarController = {

	avatar : null,

	styleID : null,

	setStyleID : function($id){
		this.styleID = $id;
	},

	setAvatar : function($avatar){
		this.avatar = $avatar;

	},

	getAvatars : function(){
		selectAvatar.getAvatars(this.avatars);
	},

	getStyles : function(){
		selectAvatar.getStyles(this.styles);
	},

	selected : function(){
		var id_ = new FormData();
		id_.append("id",this.styleID);
		var avatarElegido = new selectAvatar(id_);
		Curiosity.toastLoading.show();
		avatarElegido.save("POST",this.selection);

	},

	avatars : function(response){

        $('#sela-btnSelection').attr("disabled",true);

		var sprites = response.dataSprite;
		var secuences = response.dataSecuence;
        var avatars = response.dataAvatar;
        var container = $('#sela-cardAvatar');
        var count = 0;

        $.each(avatars,function(i,o){
            count = count + 1;

            var createCard = "<a href='#' class='sela-click' data-avatar='"+o.nombre+"''>"+
						          "<div class='col-md-6 col-sm-6 col-xs-12'>"+
							         "<h5 class='text-xs-center title-avatar h5-responsive text-white'>¡Hola soy "+o.nombre+"!</h5>"+
							             "<div id='' class='sal-divAvatar'>"+
								            "<center>"+
									           "<div id='sela-div"+count+"' class='sela-contentAvatar'>"+

									           "</div>"+
								            "</center>"+
							             "</div>"+
						          "</div>"+
                            "</a>";

            container.append(createCard);

            selectAvatarController.insertAvatar(count,sprites);


        });

	},

	styles : function(response){

		var avatarClick = selectAvatarController.avatar;
		$('#sela-textStyle').addClass('sela-hidden');

		if(avatarClick == "tot"){

			$("#sela-styles").empty();

			$.each(response.data,function(i,o){
				var cadena = o.folder;
				var valor = cadena.substring(0,5);

				if(valor == "/tot/"){

					var contentTot = "<a href='#' class='sela-divClick' data-styleID="+ o.id +">"+
											"<div class='col-md-6 col-sm-6 col-xs-12 sela-border sela-content'>"+
												"<img src='/packages/assets/media/images/avatar/sprites/"+avatarClick+"/preview-estilos/"+o.preview+"' class='img-fluid'>"+
									"</div></a>";

					$("#sela-styles").append(contentTot);

				}else{
					// nothing
				}

			});


		}else{

			$("#sela-styles").empty();

			$.each(response.data,function(i,o){
				var cadena = o.folder;
				var valor = cadena.substring(0,5);

				if(valor == "/sia/"){

					var contentSia = "<a href='#' class='sela-divClick' data-styleID="+ o.id +">"+
							"<div class='col-md-6 col-sm-6 col-xs-12 sela-border sela-content'>"+
								"<img src='/packages/assets/media/images/avatar/sprites/"+avatarClick+"/preview-estilos/"+o.preview+"' class='img-fluid'>"+
							"</div></a>";

					$("#sela-styles").append(contentSia);

				}else{
					// nothing
				}

			});

		}

	},

	selection : function(response){

		Curiosity.toastLoading.hide();
		Curiosity.noty.success(response.message,"En hora buena");
				setInterval(function(){
					location.href = "/view-child.init";
				},'2300');

	},

	alertConfirm : function(){
		var $title = "Elegir Tú Avatar";
		var $text = "¿Estas seguro de quedarte con "+ this.avatar +" y su estilo?";
		var $type = "warning";
		Curiosity.notyConfirm($title,$text,$type, function(){
			selectAvatarController.selected();
			Curiosity.toastLoading.show();
		});
	},

    insertAvatar : function(count,sprites){

            var cadena = sprites[count - 1].folder;
            var valor = cadena.substring(0,5);

            var animation = new SpriteAnimator("sela-div"+count+"", sprites[count - 1].widthFrame, sprites[count - 1].heightFrame, sprites[count - 1].framesX, sprites[count - 1].framesY, sprites[count - 1].fps);

            animation.spreetsheet = "/packages/assets/media/images/avatar/sprites" + sprites[count - 1].folder + sprites[count - 1].imagen;
            animation.mvx = 65;

            if(valor == "/sia/"){
                animation.scale = 0.7;
                animation.mvy = 111;
            }else{
                animation.scale = 0.8;
                animation.mvy = 130;
            }
            setInterval(function(){
                animation.play();
            }, animation.speed);
    }


}
