// $(".itemCard").click(function(){
//     console.log($(this).attr("id"));
// });
$(document).ready(function () {

    $(".shopContent .itemCard").click(function () {

        var itemId = $(this).attr("id");
        showItemDetails(itemId);

    });

    $(".badge").hide();
    var cart = [];

    $(".cart").click(function (event) {
        event.stopPropagation();

        console.log("clicked on cart!");
        var parent = $(this).parents('div[class="itemCard"]').eq(0);

        console.log(parent);
        var itemId = $(parent).attr("id");
        console.log(`Item with id ${itemId} added to cart!.`);

        cart.push(itemId);
        if (cart.length == 1) {
            $(".badge").show();
        }
        $(".badge").text(cart.length);
        displayAlert("Item added to Cart!")

        console.log(`Current cart length:${cart.length}, Cart: ${cart}`);
    });


    // CART

    var modal = document.getElementById("userCart");

    // Get the button that opens the modal
    var btn = document.getElementById("userCartBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

});

function showItemDetails(itemId) {
    console.log(itemId);
    $(".shopContent").hide();
    $(".itemDetailSection").show().css("display", "flex").fadeIn().focus();
    $(".cancel").click(hideItemDetails);
    getItemDetailsFromDB(itemId);


}

function hideItemDetails() {
    $(".itemDetailSection").hide();
    $(".shopContent").show();
}

function getItemDetailsFromDB(itemId) {
    $.ajax({
        type: 'POST',
        url: '../src/javascript/getItemDetails.php',
        dataType: "json",
        data: {
            id: itemId
        },
        success: function (data) {
            console.log(data);
            if (data.status == 'ok') {
                console.log("data ok " + data);
                console.log(data.result);
                $('.itemDetailSection .itemCard').attr("id", data.result.id);
                $('.itemDetailCardImg').attr("src", data.result.eikona);
                $('.itemDetailContent .itemCardheader').text(data.result.titlos);
                $('.itemCardDescription').text(data.result.perigrafi);
                $('.itemDetailContent .itemCardStock').text(
                    (data.result.apothema) ? `In Stock: ${data.result.apothema}` : `Out of Stock!`);
                $('.itemDetailContent .itemCardPrice').text(`Price: ${data.result.timi} €`);
            } else {

                alert("Item not found...");
            }
        },
        fail: function (er) {
            console.log("error" + er);
        }
    });

}

function onSuccess(data) {
    console.log("hello?");
    if (data.status = 'ok') {
        console.log(data.result);
    } else {
        console.log("Error");
    }
}

function displayAlert(string) {

    $(".alert span").text(string);

    console.log($(".alert"));

    $("#slide")
        .slideDown(1000)
        .delay(1500)
        .slideUp("slow", function () {});
}

function getItemDetails() {

}