$(document).ready(
    function() {
        $('#messager').submit(function(event) {
        event.preventDefault();
        
        var data = document.getElementById("chatInput").value;
        
        if(data.length == ""){
            alert("You cannot sending empty message");
        }
        else{
        
        // illegal characters check comme celui ci: '
        if(data.includes("'")){
            data = data.replace("'","''");
        }
        
        document.getElementById("chat").innerHTML = "called";

        var userId = parseInt(document.getElementById("user").textContent);
        $.ajax({
            url: '../page/sender.php',
            type: 'POST',
            data: {
                userId: userId,
                message: data
            },
            success: function(response) {
            console.log(response);
            },
            error: function(xhr, status, error) {
            console.log(error);
            }
        });
        document.getElementById("chatInput").value = "";
        }
    });
    }
);

