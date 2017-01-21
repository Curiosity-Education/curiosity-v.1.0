$(function(){

  var tempLevels, tempIntelligences, tempBlocks, tempTopics, tempPdfs;
  var level, intelligencesId, blockId, topicId, pdfsId;
  var
  if (level == "" || level == null) {

  }
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

   for (var i = 0; i < tempPdfs.length; i++) {

     if (topicId == tempPdfs[i].tema_id) {

       $(".lp-container-pdf").append($(

         "<a class'lp-PDFselect' href='#'>" +
           "<div class='col-md-3 col-sm-3 col-xs-4'>" +
             "<div class='lp-bg-card'>" +
               "<div class='card-overlay lp-card-pdf'>" +

                 "<div class='white-text text-xs-center'>" +
                   "<div class='card-block'>" +
                     "<h5 class='h5-responsive lp-text-card'><i class='fa fa-file-pdf-o'></i>GUIA PDF</h5><hr class='lp-hr'>" +
                     "<h4 class'h5-responsive lp-name-pdf' id='lp-namePDF'>" + tempPdfs[i].nombre + "</h4>" +

                   "</div>" +
               "</div>" +
             "</div>" +
           "</div>" +
         "</div>" +
       "</a>"

       ));

       if (i%2 == 0) {

         $(".pdfs-carrousel-container").append($(

           "<div class='carousel-item active text-xs-center pair-pdfs'>" +
           "</div>"

         ));
       }

       $(".pair-pdfs").append($(

         "<div class='col-xs-12'>" +
           "<a class='lp-PDFselect' href='#'>" +
             "<div class='lp-bg-card' data-toggle='tooltip' data-placement='top' title='click para ver'>" +
               "<div class='card-overlay lp-card-pdf'>" +

                 "<div class='white-text text-xs-center'>" +
                   "<div class='card-block'>" +
                     "<h5 class='h5-responsive lp-text-card'><i class='fa fa-file-pdf-o'></i> GUIA PDF</h5><hr class='lp-hr'>" +
                     "<h4 class='h5-responsive lp-name-pdf' id='lp-namePDF'>Sucesión Númerica</h4>" +

                   "</div>" +
                 "</div>" +
               "</div>" +
             "</div>" +
           "</a>" +
         "</div>" +

       ));
     }

    }
});
