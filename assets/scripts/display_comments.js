
displayComments()

function displayComments() {
    $("div.comments").empty();
    var user = $("#display-comments-data input[name='logged-in-user']").attr('value');
    var recipe = $("#display-comments-data input[name='recipe']").attr('value');
    var targetUrl = $("#display-comments-data").attr('action');
    var baseUrl = $("#display-comments-data input[name='base-url']").attr('value');

    // console.log(baseUrl);
    // console.log(user);
    // console.log(recipe);
    // console.log(targetUrl);

    $.ajax({
        type: "GET",
        url: targetUrl,
        dataType: "json",
        success: function (response) {
            $.map(response, function(comment, i) {
                var text = '<div class="comment clearfix">';
                text += '<img src="http://localhost/tasty/assets/img/generic-avatar.png" alt="A users avatar" class="profile-pic">';
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