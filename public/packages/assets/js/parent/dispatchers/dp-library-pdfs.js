$(function(){

  var tempLevels, tempIntelligences, tempBlocks, tempTopics, tempPdfs;
  var level, intelligencesId, blockId, topicId, pdfsId;
  var countPdfs = [],cc = 0, countSlide = 0;

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

  for (var i = 0; i < tempLevels.length; i++) {
   $(".lp-container-degrees").append($(
     "<button type='button' data-id-grade='" + tempLevels[i].id + "' class='btn btn-info lp-btn-degrees'>" + tempLevels[i].nombre.split(" ", 1) + "°</button>"
   ));
 }

 $("body").on('click','.lp-btn-degrees',function(){

   level = $(this).data("id-grade");
   $(this).addClass("lp-btn-active");

   for (var i = 0; i < tempIntelligences.length; i++) {

     if (level == tempIntelligences[i].nivel_id) {

       intelligencesId = tempIntelligences[i].nivel_id;
       $("#lp-btn-topics").append($(
         "<button type='button' data-name='" + tempIntelligences[i].nombre + "' class='btn btn-primary btn-lg lp-btnTopic'>" + tempIntelligences[i].nombre + "</button>"
       ));
      }
    }
    for (var i = 0; i < tempBlocks.length; i++) {

      if (intelligencesId == tempBlocks[i].inteligencia_id) {
        blockId = tempBlocks[i].id;
        if (blockId == tempTopics[i].bloque_id) {
          topicId = tempTopics[i].id;
        }
      }
    }

 });

 $("body").on('click','.lp-btnTopic',function(){
   $(this).addClass("lp-topic-active");

   $("#lp-row-contPdf").append($(

     "<div class='col-md-12 col-sm-12 col-xs-12 lp-container-pdf z-depth-1'>" +
     "</div>"
   ));

   for (var i = 0; i < tempPdfs.length; i++) {

     if (topicId == tempPdfs[i].tema_id) {
       
        countPdfs[cc] = tempPdfs[i];
        cc += 1;

       $(".lp-container-pdf").append($(

         "<a class='lp-PDFselect' data-name-pdf='" + tempPdfs[i].nombre + "' href='#'>" +
           "<div class='col-md-3 col-sm-3 col-xs-4'>" +
             "<div class='lp-bg-card' title='click para ver'>" +
               "<div class='card-overlay lp-card-pdf'>" +

                 "<div class='white-text text-xs-center'>" +
                   "<div class='card-block'>" +
                     "<h5 class='h5-responsive lp-text-card'><i class='fa fa-file-pdf-o'></i>GUIA PDF</h5><hr class='lp-hr'>" +
                     "<h4 class='h5-responsive lp-name-pdf' id='lp-namePDF'>" + tempPdfs[i].nombre + "</h4>" +

                   "</div>" +
               "</div>" +
             "</div>" +
           "</div>" +
         "</div>" +
       "</a>"

       ));

     }

    }

    if (tempPdfs.length > 8) {
      $(".lp-container-pdf").append($(
        "<nav>" +
          "<ul class='pagination pg-blue'>" +

              "<li class='page-item'>" +
                  "<a class='page-link' aria-label='Previous'>" +
                      "<span aria-hidden='true'>&laquo;</span>" +
                      "<span class='sr-only'>Previous</span>" +
                  "</a>" +
              "</li>" +

              // for (var i = 0; i < tempPdfs.length; i++) {
              //
              // }
              "<li class='page-item active'><a class='page-link'>1</a></li>" +
              "<li class='page-item'><a class='page-link'>2</a></li>" +
              "<li class='page-item'><a class='page-link'>3</a></li>" +
              "<li class='page-item'><a class='page-link'>4</a></li>" +
              "<li class='page-item'><a class='page-link'>5</a></li>" +

              "<li class='page-item'>" +
                  "<a class='page-link' aria-label='Next'>" +
                      "<span aria-hidden='true'>&raquo;</span>" +
                      "<span class='sr-only'>Next</span>" +
                  "</a>" +
              "</li>" +
          "</ul>" +
        "</nav>"
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


    for (var i = 0; i < countPdfs.length; i++) {
      if (i % 2 === 0) {

        countSlide += 1;
        $(".pdfs-carrousel-container").append($(

          "<div class='carousel-item text-xs-center pair-pdfs"+ countSlide +"'>" +
          "</div>"
        ));
        if (i <= 1) {

          $(".pair-pdfs"+ countSlide).addClass("active");
        }
     }

      $(".pair-pdfs"+countSlide).append($(

       "<div class='col-xs-12'>" +
         "<a class='lp-PDFselect' href='#'>" +
           "<div class='lp-bg-card' data-toggle='tooltip' data-placement='top' title='click para ver'>" +
             "<div class='card-overlay lp-card-pdf'>" +

               "<div class='white-text text-xs-center'>" +
                 "<div class='card-block'>" +
                   "<h5 class='h5-responsive lp-text-card'><i class='fa fa-file-pdf-o'></i> GUIA PDF</h5><hr class='lp-hr'>" +
                   "<h4 class='h5-responsive lp-name-pdf' id='lp-namePDF'>" + countPdfs[i].nombre + "</h4>" +

                 "</div>" +
               "</div>" +
             "</div>" +
           "</div>" +
         "</a>" +
       "</div>"

      ));

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


});