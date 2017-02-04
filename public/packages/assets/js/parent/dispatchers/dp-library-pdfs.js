$(function(){

  var tempLevels, tempIntelligences, tempBlocks, tempTopics, tempVideos, tempTeachers, tempSchools;
  var level, intelligencesId, blockId = [], topicId = [], finalPdfs = [];
  var cc = 0, cc2 = 0, countSlide = 0, nameTopic;
  var show_per_page = 8, count_elements = 0, count_sections = 0, num_container = 1;

  libraryPdfs.getLevels(function(levels){
    localStorage.localLevels = JSON.stringify(levels);
  });

  libraryPdfs.getIntelligences(function(intelligences){
    localStorage.localIntelligences = JSON.stringify(intelligences);
  });

  libraryPdfs.getBlocks(function(blocks){
    localStorage.localBlocks = JSON.stringify(blocks);
  });

  libraryPdfs.getTopics(function(topics){
    localStorage.localTopics = JSON.stringify(topics);
  });

  libraryPdfs.getPdfs(function(pdfs){
    localStorage.localPdfs = JSON.stringify(pdfs);
  });


  tempLevels = JSON.parse(localStorage.localLevels);
  tempIntelligences = JSON.parse(localStorage.localIntelligences);
  tempBlocks = JSON.parse(localStorage.localBlocks);
  tempTopics = JSON.parse(localStorage.localTopics);
  tempPdfs = JSON.parse(localStorage.localPdfs);

  $.each(tempLevels,function(i){
    $(".lp-container-degrees").append($(
      "<button id='" + (i + 1) + "grado" + "' type='button' data-id-grade='" + tempLevels[i].id + "' class='btn btn-info lp-btn-degrees'>" + tempLevels[i].nombre.split(" ", 1) + "°</button>"
    ));
  });

  $("body").on('click','.lp-btn-degrees',function(){

    level = $(this).data("id-grade");
    if (!$(this).hasClass("lp-btn-active")) {
      $("#lp-btn-topics").empty();
      $(".lp-btn-degrees").removeClass("lp-btn-active");
      $(this).addClass("lp-btn-active");

      $.each(tempIntelligences,function(i){
        if (level == tempIntelligences[i].nivel_id) {
          $("#lp-btn-topics").append($(
            "<button id='" + (i + 1) + "inteligence" + "' type='button' data-intelligence-id='" + tempIntelligences[i].id + "' class='btn btn-primary btn-lg lp-btnTopic'>" + tempIntelligences[i].nombre + "</button>"
           ));
         }
      });
    }
  });

  $("#1grado").trigger('click');

  $("body").on('click','.lp-btnTopic',function(){
    if (!$(this).hasClass("lp-topic-active")) {

      intelligencesId = $(this).data("intelligence-id");
      $("#lp-row-contPdf").empty();
      $("#pag").empty();
      $("#carrousel-pdfs").empty();
      $(this).addClass("lp-topic-active");

      $.each(tempBlocks,function(i){
        if (tempBlocks[i].inteligencia_id == intelligencesId) {
           blockId[i] = tempBlocks[i].id;
        }
      });

      $.each(blockId,function(i){
        $.each(tempTopics,function(j){
          if (blockId[i] == tempTopics[j].bloque_id) {
            topicId[cc2] = tempTopics[j].id;
            cc2 += 1;
          }
        })
      });

      $.each(topicId,function(i){
        $.each(tempPdfs,function(j){
          if (tempPdfs[j].tema_id == topicId[i]) {
            finalPdfs[cc] = tempPdfs[j];
            cc += 1;
          }
        });
      });

      $("#lp-row-contPdf").append($(
        "<div class='col-md-12 col-sm-12 col-xs-12 lp-container-pdf z-depth-1'>" +
        "</div>"
      ));

      $.each(finalPdfs,function(i){
        if (count_elements < show_per_page) {

          if (count_elements == 0) {
            count_sections += 1;
            if (count_sections == 1) {
              $(".lp-container-pdf").append(
                "<div id='lp-section" + count_sections + "' class='perro l'>" +
                "</div>"
              );
            } else {
              $(".lp-container-pdf").append(
                "<div id='lp-section" + count_sections + "' class='gato l'>" +
                "</div>"
              );
            }
          }

          $("#lp-section" + count_sections).append($(
            "<a class='lp-PDFselect' data-name-pdf='" + finalPdfs[i].nombre + "' href='#'>" +
             "<div class='col-md-3 col-sm-3 col-xs-4'>" +
               "<div class='lp-bg-card' title='click para ver'>" +
                 "<div class='card-overlay lp-card-pdf'>" +

                   "<div class='white-text text-xs-center'>" +
                     "<div class='card-block'>" +
                       "<h5 class='h5-responsive lp-text-card'><i class='fa fa-file-pdf-o'></i>GUIA PDF</h5><hr class='lp-hr'>" +
                       "<h4 class='h5-responsive lp-name-pdf' id='lp-namePDF'>" + finalPdfs[i].nombre + "</h4>" +

                     "</div>" +
                   "</div>" +
                 "</div>" +
               "</div>" +
             "</div>" +
            "</a>"
          ));
          count_elements += 1;
        }
        if (count_elements == 8) {
          count_elements = 0;
        }
      });

      $("#pag").append($(
      " <nav>" +
          "<ul class='pagination pg-blue'>" +

          "</ul>" +
        "</nav>"
      ));

      for (var i = 0; i < count_sections; i++) {
          $(".pagination").append($(
            "<li class='page-item' data-section-id='" + (i + 1) + "'><a class='page-link'>" + (i + 1) + "</a></li>"
          ));
      }

      $("#carrousel-pdfs").append($(

        "<div class='row z-depth-1 hidden-sm-up lp-row-slide' id='lp-row-slidePdfs'>" +
          "<div id='lp-slide-cardPdf' class='carousel slide carousel-multi-item' data-ride='carousel'>" +


            "<div class='controls-top'>" +
              "<a class='btn-floating btn-small' href='#lp-slide-cardPdf' data-slide='prev'><i class='fa fa-chevron-left'></i></a>" +
              "<a class='btn-floating btn-small' href='#lp-slide-cardPdf' data-slide='next'><i class='fa fa-chevron-right'></i></a>" +
            "</div>" +



            "<ol class='carousel-indicators'>" +
              "<li data-target='#lp-slide-cardPdf' data-slide-to='0' class='active'></li>" +
              "<li data-target='#lp-slide-cardPdf' data-slide-to='1'></li>" +
            "</ol>" +



            "<div class='carousel-inner pdfs-carrousel-container' role='listbox'>" +

            "</div>" +

          "</div>" +

        "</div>"
      ));

      $.each(finalPdfs,function(i){
        if (i % 2 === 0) {
           countSlide += 1;
          $(".pdfs-carrousel-container").append($(
             "<div class='carousel-item text-xs-center pair-pdfs"+ countSlide +"'>" +
             "</div>"
          ));
        }
        if(i == 0)
          $(".pair-pdfs"+ countSlide).addClass("active");

        $(".pair-pdfs" + countSlide).append($(
          "<div class='col-xs-12'>" +
              "<a class='lp-PDFselect' href='#'>" +
                "<div class='lp-bg-card' data-toggle='tooltip' data-placement='top' title='click para ver'>" +
                  "<div class='card-overlay lp-card-pdf'>" +

                    "<div class='white-text text-xs-center'>" +
                      "<div class='card-block'>" +
                        "<h5 class='h5-responsive lp-text-card'><i class='fa fa-file-pdf-o'></i> GUIA PDF</h5><hr class='lp-hr'>" +
                        "<h4 class='h5-responsive lp-name-pdf' id='lp-namePDF'>" + finalPdfs[i].nombre + "</h4>" +

                      "</div>" +
                    "</div>" +
                  "</div>" +
                "</div>" +
              "</a>" +
            "</div>"
        ))
      });
      count_sections = 0, count_elements = 0, finalPdfs = [], cc = 0, cc2 = 0;

    }
  });


  /* Transitions of the View ------------------------------------ */

	$("body").on('click','.lp-PDFselect',function(){
		$('#lp-row-showPDF').removeClass("lp-content-disabled");
		$('#lp-container-all').addClass("lp-content-disabled");
		$('#row-banner').addClass("lp-content-disabled");
    $('.lp-content-pdf').append($(
      "<embed src='packages/assets/pdf/" + $(this).data('name-pdf') + "' type='application/pdf' width='100%' height='100%' id='lp-pdf'>"
    ));
    $("#topic-name").text($(this).data('name-pdf'));

	}); // show PDF

	$("body").on('click','.lp-close',function(){
		$('#lp-row-showPDF').addClass("lp-content-disabled");
		$('#lp-container-all').removeClass("lp-content-disabled");
		$('#row-banner').removeClass("lp-content-disabled");
		$('#lp-container-all').addClass("fadeInUp");
    $('#lp-pdf').remove();
	}); // close PDF

	$("body,html").keyup(function(evt){
		if(evt.keyCode==27){
			$(".lp-close").trigger("click");
		}
	}); // close PDF with "esc"

	/* ------------------------------------------------------------- */

  $("body").on('click','.page-item',function(){
    var section = $(this).data('section-id');
    $(".l").addClass("gato");
    $("#lp-section" + section).removeClass("gato");
    $("#lp-section" + section).addClass("perro");
    $("#lp-section" + section).addClass("fadeInUp");
    $('.page-item').removeClass('active');
    $(this).addClass('active');
  });
  $("#1inteligence").trigger('click');
  $(".page-link1").trigger('click');
});
