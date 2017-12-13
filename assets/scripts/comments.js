//This file is successfully connected to the meatballs page for now.

alert("It's working. Remove me (comments.js Line 3");

console.log("ready");
$(document).ready(function() {
    var data = {comment: 'Nam nam hehe'};
    
    $.post("http://localhost/tasty/comments/create/meatballs-recipe", function(data) {
            alert(data);
        }).done(function() {
            alert("done")
        });
});