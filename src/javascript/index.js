$(document).ready(function() {
    $("#subBtn").click(function(){

        //TODO: ADD FORM VALIDATION

        
        $.ajax({
                type: 'POST',
                url: '../src/helpers/database.php',
                dataType: "json",
                data: {
                    action:'mailSub',
                    email: $("#subEmail").val()
                },
                success: function (data) {
                    console.log(data);
                    if (data.status == 'ok') {
                        console.log(data.result);
                        subSuccess(data.result);
                    } else {
                        alert("Subscription Fail");
                    }
                },
                fail: function (er) {
                    console.log("error" + er);
                }
            });
            return false;
    });

 

 
 

})

function subSuccess(mail){
    console.log("Sub success " + mail);
    $(".form").hide()
    $(".successMail").text(mail);
    $(".subSuccess").show();
}