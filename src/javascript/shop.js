var items = [];
var cart = [];
var detailID ;

$(document).ready(function () {
    getAllItems();
    $(".badge").hide();
});

function addEventHandlers() {
    //ADD TO FAVORITES
    $(".itemCardFavIcon").click(function (e) {
        e.stopPropagation();
        console.log("Added on favorites");
    })
    // OPEN USERS CART
    $("#userCartBtn").click(function () {
        $("#userCart").slideDown("slow");
        var total = 0;
        cart.forEach((element,index) => {
            var price = calculatePrice(element.amount,element.item.item.timi)
            var itemRowElement = element.item.createItemRow(element.amount ,price,index);
            total += price;
             $(".table-body").append(itemRowElement);
        })
        $(".itemAmount").change(function(){
            var itemId = $(this).attr("id");
            //var itemChanged = cart.find(item => item.item.item.id == itemId)
            var itemChanged = cart[itemId];
            itemChanged.amount = parseInt($(this).val());
            total -=parseFloat($(`tr#${itemId} .rowPrice`).text())
            var newPrice = calculatePrice(itemChanged.amount,itemChanged.item.item.timi);
            total += newPrice;
            $(`tr#${itemId} .rowPrice`).text(`${newPrice} €`);
            $(".cartInfo p").text(`Total: ${total} €`);    
        })
        $(".cartInfo p").text(`Total: ${total} €`);
        $(".cartUserOptions button").one("click",function(){
            checkOut()
        })
    });

    $(".close").click(function () {
        
        $(".table-body").empty();
        $("#userCart").hide();
    });

    $(window).click(function (event) {
        if (event.target.id == $("#userCart").attr("id")) {
            $("#userCart").hide();
            console.log("emptied");
        }
    });

    //SET HANDLER FOR ITEM DETAILS
    $(".shopContent .itemCard").click(function () {
        var itemId = $(this).attr("id");
        detailID = itemId;
        showItemDetails( );
    });
}


//Shows Item Details
function showItemDetails( ) {
  
    var amount = 1;
    //hide all items
    $(".shopContent").hide(); 

    //Get the id of the item clicked and create an element
    var detailedItem = items.find(item => item.item.id == detailID);
    detailedItem.createDetailedItem();

    //Show the detailed item.
    $(".itemDetailSection").show().css("display", "flex").fadeIn().focus();
    $(".cart").attr("class","fas fa-cart-plus icon cart");
    //Add handlers

    $(".cancel").click(hideItemDetails);
    //Set input max attribute based on the stock

    $(".itemDetailCardAmount input").attr("max", detailedItem.item.apothema);

    //Handlers conserning the amount chosen.
    //  due to a custom spinner for the number input we override the step functions
    $(".itemDetailCardAmount #up").click(function () {
        $(".itemDetailCardAmount input").change();
    });

    $(".itemDetailCardAmount #down").click(function () {
        $(".itemDetailCardAmount input").change();
    });

    $(".itemDetailCardAmount input").change(function () {
        console.log("Amount changed");
        console.log($(this).val());
        amount =parseInt($(this).val());
        var total = calculatePrice(amount,detailedItem.item.timi);
        console.log(total);
        $(".itemDetailContent .itemCardPrice").text(`Price: ${total} €`);
        //amount input changed SHOW CHANGES
    });

    //Add to cart handler
    $(".cart").one("click" , (event)=>{
        event.stopPropagation();
        // //Find the  id of the item
        // var parent = $(this).parents('div[class="itemCard"]').eq(0);
        // var itemId = $(parent).attr("id");
        // console.log(parent);
        // console.log(itemId);
        
        // //find the item obj using the id 
        // var item = items.find(item => item.item.id == itemId);
        
        console.log(`ADDED ON CART! ${detailedItem.item} with amount ${amount}`);
        
        cart.push(
            {
            item: detailedItem,
            amount:amount
            });
        
        //  var itemRowElement = detailedItem.createItemRow();
        //  $(".table-body").append(itemRowElement);

        if (cart.length == 1) {
            $(".badge").show();
        }

        $(".badge").text(cart.length);
        $(".cart").attr("class","fas fa-check-circle cart");
        displayAlert("Item added to Cart!")
        event.preventDefault();
    });
    


}

//Close item Details
function hideItemDetails() {
    $(".itemDetailSection").hide();
    $(".shopContent").show();
}

function calculatePrice(amount,price){
    var price = parseFloat(price);
    var total = Math.floor( (price*amount) *100) /100;
    return total;
    
}

function checkOut(){
    var itemsToBuy = []
    cart.forEach(itemCart=>{
        itemsToBuy.push({itemId:itemCart.item.item.id,
                        amount:itemCart.amount});
    });
    
    //DB CHECKOUT
    $.ajax({
        type: 'POST',
        url: '../src/helpers/database.php',
        dataType: "json",
        data: {
            cart :JSON.stringify(itemsToBuy),
            action: 'checkOut'
        },
        success: function (data) {
            if (data.status == 'ok') {
                console.log(data);

            } else {
                alert("Error...");
            }
        },
        fail: function (er) {
            console.log("error" + er);
        }
    });
}

/**
 * Get all items from the database and store them in an array.
 * 
 */
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
                data.result.forEach(item => {
                    //Model each item 
                    var itemObj = new Item(item);
                    items.push(itemObj);
                    //create item element for shop content
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

//Displays Added to card alert
function displayAlert(string) {
    $(".alert span").text(string);
    $("#slide")
        .slideDown(1000)
        .delay(1500)
        .slideUp("slow", function () {});
}