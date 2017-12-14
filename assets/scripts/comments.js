function deleteHandeler(e) {
    e.preventDefault();
    var targetUrl = $($(e.target).parent()).attr('action');
    var formData = $($(e.target).parent()).serialize();

    console.log(targetUrl);
    console.log(formData);

    $.post(targetUrl, formData).done(function(data) {
            if (data == true) {
                displayComments();
            } else {
                $('.comments').prepend('<p style="color:red">Unable to delete comment</p>');
            }
    });
}

function submitHandeler(e) {
    e.preventDefault();

    var formData = $('#create-comment-form').serialize();
    var targetUrl = $('#create-comment-form').attr('action');

    $.post(targetUrl, formData).done(function(data) {
        // If the DB insertion was successfull
        if (data == true) {
            console.log("saved");
            $('#comment-text-area').val('');
            displayComments();
        } else { // If the DB insertion failed
            console.log(data);
        }
    });
    
}

function displayComments() {
    var user = $("#display-comments-data input[name='logged-in-user']").attr('value');
    var recipe = $("#display-comments-data input[name='recipe']").attr('value');
    var targetUrl = $("#display-comments-data").attr('action');
    var baseUrl = $("#display-comments-data input[name='base-url']").attr('value');

    $.ajax({
        type: "GET",
        url: targetUrl,
        dataType: "json",
        success: function (response) {
            // If there are no comments
            if(response.length == 0) {
                $("div.comments").append('<p>Unfortunately there are no comments yet!</p>');
                return;
            }
            $("div.comment").remove();
            $(".comments>p").remove();
            $.map(response, function(comment, i) {
                var text = '<div class="comment clearfix">';
                text += '<img src="' + baseUrl + 'assets/img/generic-avatar.png" alt="A users avatar" class="profile-pic">';
                text += '<span class="user-name">' + comment.user + '</span>';
                text += "<br>";
                text += "<p>" + comment.comment + "</p>";
                
                // If the logged in user is the author
                if (comment.user == user){
                    text += '<form action="' + baseUrl + 'comments/delete_comment">';
                    text += '<input type="hidden" name="id" value="' + comment.id + '">';
                    text += '<input type="hidden" name="recipe" value="' + comment.recipe + '">';
                    text += '<input type="submit" class="delete-comment" value="Delete">';
                    text += '</form>';
                }
                text += '</div>';
                $("div.comments").append(text);
            });
        },
    });
}


displayComments();
$(document).ready(function () {
    $(document).on('click', '#submit-comment', submitHandeler);
    $(document).on('click', '.delete-comment', deleteHandeler);
});