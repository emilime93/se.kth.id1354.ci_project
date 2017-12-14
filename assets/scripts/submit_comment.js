//This file is successfully connected to the meatballs page for now.    
$('#submit-comment').click(function postComment(e) {
    e.preventDefault();

    var formData = $('#create-comment-form').serialize();
    var targetUrl = $('#create-comment-form').attr('action');
    
    console.log('Target URL: ' + targetUrl);
    console.log('Data: ' + formData);

    $.ajax({
        type: 'ajax',
        method: 'POST',
        url: targetUrl,
        data: formData,
        dataType: 'json',
        success: function(response) {
            console.log('Success: ' + response);
            console.log(response.attr());
            // Remove this
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log("Status: " + textStatus + "\nError: " + errorThrown);
            // Remove this
        }
    });

    // Clear the comment field
    $('#comment-text-area').val('');
});