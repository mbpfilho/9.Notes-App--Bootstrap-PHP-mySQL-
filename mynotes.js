$(function(){
    //define variables
    var activeNote=0;
    //load notes on page load: Ajax call to loadnotes.php
    $.ajax({
        url: "loadnotes.php",
        success: function(data) {
            $('#notes').html(data);
        },
        error: function() {
            $("#alertContent").text("There was an error with the Ajax call.");
            $("#alert").fadeIn();
        }
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
            error: function(){
                $("#alertContent").text("There was an error with the Ajax call.");
                $("#alert").fadeIn();
            }
        });
    });
    //type note: Ajax call to updatenote.php
    $("textarea").keyup(function(){
        //ajax call to update the task of id activenote
        $.ajax({
            url: "updatenote.php",
            type: "POST",
            //we need to send the current note content with its id to the php file
            data: {note:$(this).val(),id:activeNote},
            success: function(data) {
                if(data=="error"){
                    $("#alertContent").text("There was an error updateing the note in the database.");
                    $("#alert").fadeIn();
                }
            },
            error: function() {
                $("#alertContent").text("There was an error with the Ajax call.");
                $("#alert").fadeIn();
            }
        });
    });

    //click on all notes button: loadnotes.php again
    $("#allNotes").click(function(){
        $.ajax({
            url: "loadnotes.php",
            success: function(data) {
                $('#notes').html(data);
                showHide(["#addNote","#edit","#notes"],["#allNotes","#notePad"]);
            },
            error: function() {
                $("#alertContent").text("There was an error with the Ajax call.");
                $("#alert").fadeIn();
            }
        });
    })

    //click on done after editing: go to loadnotes.php again
    //click on edit: go to edit mode (show delete buttons)

    //functions
        //click on a note
        //click on delete
        //show Hide function
    function showHide(array1,array2){
        //array1 all elements id to show
        for(i=0;i<array1.length;i++){
            $(array1[i]).show();
        }
        //array2 all elements id to hide
        for(i=0;i<array2.length;i++){
            $(array2[i]).hide();
        }
    };
});