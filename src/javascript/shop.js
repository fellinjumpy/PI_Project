var items = [];
var cart = [];

$(document).ready(function () {
    getAllItems();
    $(".badge").hide();
});

function addEventHandlers() {
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
        event.preventDefault();
    });


    // CART
    $("#userCartBtn").click(function () {
        $("#userCart").slideDown("slow");
    });

    $(".close").click(function () {
        $("#userCart").hide();
    });

    $(window).click(function (event) {
        console.log(event.target);
        console.log($("#userCart"));
        if (event.target.id == $("#userCart").attr("id")) {
            $("#userCart").hide();
        }
    });

    $(".shopContent .itemCard").click(function () {

        var itemId = $(this).attr("id");
        showItemDetails(itemId);

    });
}

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

function displayAlert(string) {

    $(".alert span").text(string);

    console.log($(".alert"));

    $("#slide")
        .slideDown(1000)
        .delay(1500)
        .slideUp("slow", function () {});
}

function getItemDetailsFromDB(itemId) {
    $.ajax({
        type: 'POST',
        url: '../src/helpers/database.php',
        dataType: "json",
        data: {
            action: "getItemDetails",
            id: itemId
        },
        success: function (data) {
            console.log(data);
            if (data.status == 'ok') {
                console.log("data ok " + data);
                console.log(data.result);
                $('.itemDetailSection .itemCard').attr("id", data.result.id);
                $('.itemDetailCardImg').attr("src", data.result.eikona);
                $('.itemDetailContent .itemCardHeader').text(data.result.titlos);
                $('.itemCardDescription').text(data.result.perigrafi);
                $('.itemDetailContent .itemCardStock').text(
                    (data.result.apothema != 0) ? `In Stock: ${data.result.apothema}` : `Out of Stock!`);
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

function getAllItems() {
    $.ajax({
        type: 'POST',
        url: '../src/helpers/database.php',
        dataType: "json",
        data: {
            action: 'getAllItems'
        },
        success: function (data) {
            if (data.status == 'ok') {
                console.log(data.result);
                items = data.result;
                console.log("creating all items");
                items.forEach(item => {
                    var itemObj = new Item(item);
                    var itemElement = itemObj.createItemElement()
                    $(".shopContent").append(itemElement);
                });
                addEventHandlers();
            } else {
                alert("Items not found...");
            }
        },
        fail: function (er) {
            console.log("error" + er);
        }
    });

}