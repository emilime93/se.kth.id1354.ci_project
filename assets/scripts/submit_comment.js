//This file is successfully connected to the meatballs page for now.    
$('#submit-comment').click(submitHandeler);

function submitHandeler(e) {
    e.preventDefault();

    var formData = $('#create-comment-form').serialize();
    var targetUrl = $('#create-comment-form').attr('action');

    $.post(targetUrl, formData).done(function(data) {
        // If the DB insertion was successfull
        if(data == true) {
            console.log("saved");
            $('#comment-text-area').val('');
            displayComments();
        } else { // If the DB insertion failed
            console.log(data);
        }
    });
    
}