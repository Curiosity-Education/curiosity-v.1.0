// Example of dispatch "Teacher"

$(document).on('ready',__init);

function __init(){

    // With JQuery
    $("#save").on({
        click:function(){
            teacherCtrl.save();
        }
    });

    // With Javascript

    var saveBtn = document.getElementById('save');

    saveBtn.addEventListener('click',function(){
        teacherCtrl.save();
    },false);



}
