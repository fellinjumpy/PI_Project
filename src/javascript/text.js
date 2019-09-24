
var items = [];
var cart = [];

$(document).ready(function () {
    getAllItems();
    $(".badge").hide();
});

function addEventHandlers() {

    $(".cart").click(function (event) {
        event.stopPropagation();

        //Find the  id of the item
        var parent = $(this).parents('div[class="itemCard"]').eq(0);
        var itemId = $(parent).attr("id");
        //find the item obj using the id 
        var item = items.find(item => item.id == itemId);
        var itemObj = new Item(item);
        var itemRowElement = itemObj.createItemRow();
        $(".table-body").append(itemRowElement);
        cart.push({
            item: item,
            element: itemRowElement
        });
        var itemInput = $(itemRowElement).find(".itemAmount");


        if (cart.length == 1) {
            $(".badge").show();
        }

        $(".badge").text(cart.length);

        displayAlert("Item added to Cart!")
        event.preventDefault();
    });

    $(".itemCardFavIcon").click(function (e) {
        e.stopPropagation();
        console.log("Added on favorites");
    })
    //  User CART
    $("#userCartBtn").click(function () {
        $("#userCart").slideDown("slow");
        var total = 0;
        cart.forEach(element => {
            total += parseFloat(element.item.timi);
        })
        $(".cartInfo p").text(`Total: ${total} €`);
    });

    $(".close").click(function () {
        $("#userCart").hide();
    });

    $(window).click(function (event) {
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

                $(".itemDetailCardAmount input").attr("max", data.result.apothema);
                $(".itemDetailCardAmount #up").click(function () {

                    $(".itemDetailCardAmount input").change();
                })
                $(".itemDetailCardAmount #down").click(function () {

                    $(".itemDetailCardAmount input").change();
                })

                $(".itemDetailCardAmount input").change(function () {
                    console.log("Amount changed");
                    console.log($(this).val());
                })
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