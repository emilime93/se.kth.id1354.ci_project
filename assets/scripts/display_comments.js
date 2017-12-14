
displayComments()

function displayComments() {
    // $("div.comment").hide('fast', function(){ this.remove(); });
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
                    text += '<form method="post" action="' + baseUrl + 'comments/delete_comment">';
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