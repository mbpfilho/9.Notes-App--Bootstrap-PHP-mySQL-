$(function(){
    //define variables
    //load notes on page load: Ajax call to loadnotes.php
    $.ajax({
        url: "loadnotes.php",
        success: function(data) {
            $('#notes').html(data);
        },
    });
    //add a new note: Ajax call to createnote.php
    //type note: Ajax call to updatenote.php
    //click on all notes button: loadnotes.php again
    //click on done after editing: go to loadnotes.php again
    //click on edit: go to edit mode (show delete buttons)

    //functions
        //click on a note
        //click on delete
        //show Hide function
});