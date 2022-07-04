$(function(){
    //define variables
    var activeNote=0;
    //load notes on page load: Ajax call to loadnotes.php
    $.ajax({
        url: "loadnotes.php",
        success: function(data) {
            $('#notes').html(data);
        },
    });

    //add a new note: Ajax call to createnote.php
    $("#addNote").click(function() {
        $.ajax({
            url: "createnote.php",
            success: function(data) {
                if(data=="error"){
                    $("#alertContent").text("There was an issue inserting the new note in the database.");
                    $("#alert").fadeIn();
                }else{
                    //update activeNote to the id of the new note
                    activeNote=data;
                    $("textarea").val("");
                    // show hide elements
                    showHide(["#notePad","#allNotes"],["#notes","#addNote","#edit","#done"]);
                    $("textarea").focus();
                }
            },
        });
    });
    //type note: Ajax call to updatenote.php
    //click on all notes button: loadnotes.php again
    //click on done after editing: go to loadnotes.php again
    //click on edit: go to edit mode (show delete buttons)

    //functions
        //click on a note
        //click on delete
        //show Hide function
    function showHide(array1,array2){
        //array1 all elements id to show
        for(i=0,i<array1.length,i++){
            $(array1[i]).show();
        }
        //array2 all elements id to hide
        for(i=0,i<array2.length,i++){
            $(array2[i]).hide();
        }
    };
});