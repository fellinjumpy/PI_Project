var itemObjArr = [];
var cart = [];
var detailID ;
var total = 0;
var detailedItem;

//On Document Ready
$(document).ready(function () {
    getAllItems();
    $(".badge").hide();
    addGeneralEventHandlers();
    
});


/** UI functions  */

//Displays Added to card alert
function displayAlert(string) {
    $(".alert span").text(string);
    $("#slide")
        .slideDown(1000)
        .delay(1500)
        .slideUp("slow", function () {});
}

//Shows Item Details
function showItemDetails( ) {
    
    populateDetails();
    //hide all items
    $(".shopContent").hide(); 

    //Show the detailed item.
    $(".itemDetailSection").show().css("display", "flex").fadeIn().focus();

    // Add to cart button enable TODO:more UX
    $(".cart").text("Add to Cart").attr("disabled",false);

}

//Close item Details
function hideItemDetails() {
    $(".itemDetailSection").hide();
    //reset input
    $(".itemDetailCardAmount input").val(1);
    $(".shopContent").show();
}






/** GENERAL FUNCTIONS */

//Price calc
function calculatePrice(amount,price){
    var price = parseFloat(price);
    var total = Math.floor( (price*amount) *100) /100;
    return total;
    
}




/** Population functions ,Dynamicly create elements  */



//Populates shop using the results from database request
function populateShop(data){
    data.forEach(item => {
        //Model each item 
        var itemObj = new Item(item);

        //Store The item object  in a global array.
        itemObjArr.push(itemObj);

        //create item element for shop content 
        var itemElement = itemObj.createItemElement()
        //Append to shop.
        $(".shopContent").append(itemElement);
    });
}

// Calculate the price of the items on cart   and populate the cart Table
function populateCart(){
    
    cart.forEach((element,index) => {
        var price = calculatePrice(element.amount,element.item.item.timi)
        var itemRowElement = element.item.createItemRow(element.amount ,price,index);
        total += price;
         $(".table-body").append(itemRowElement);
    });
    cartAmountHandlers();
    //Set users cart Total price   
    $(".cartInfo p").text(`Total: ${total} €`);
}

//Populate Details
function populateDetails(){
    //Get the id of the item clicked and populate the details section
    detailedItem = itemObjArr.find(item => item.item.id == detailID);
    detailedItem.createDetailedItem();
    //Set input max attribute based on the stock
    $(".detailInput").attr("max", detailedItem.item.apothema);
    addEventHandlersOnDetails();
}




/**  CREATING HANDLERS functions */

//Add handlers on Details
function addEventHandlersOnDetails(){
    var amount =1;
    $(".cancel").click(hideItemDetails);
    //Handlers conserning the amount chosen.
    //  due to a custom spinner for the number input we override the step functions
    $(".itemDetailCardAmount #up").click(function () {
        $(".itemDetailCardAmount input").change();
    });

    $(".itemDetailCardAmount #down").click(function () {
        $(".itemDetailCardAmount input").change();
    });

    $(".itemDetailCardAmount input").change(function () {
        
        amount =parseInt($(this).val());
        var total = calculatePrice(amount,detailedItem.item.timi);
        
        $(".itemDetailContent .itemCardPrice").text(`${total} €`);
        
    });

    //Add to cart handler
    $(".cart").one("click" , (event)=>{
        event.stopPropagation();        

        //console.log(`ADDED ON CART! ${detailedItem.item} with amount ${amount}`);
        
        cart.push(
            {
            item: detailedItem,
            amount:amount
            });

        amount = 1;
        //  var itemRowElement = detailedItem.createItemRow();
        //  $(".table-body").append(itemRowElement);

        if (cart.length == 1) {
            $(".badge").show();
        }
        $(".badge").text(cart.length);
        // $(".cart").attr("class","fas fa-check-circle cart");
        $(".cart").text("In Cart!").attr("disabled",true);
        
        displayAlert("Item added to Cart!")
        event.preventDefault();
    });
}

//Add general event handlers
function addGeneralEventHandlers(){

    //If user clicks outside of Cart
    $(window).click(function (event) {
        if (event.target.id == $("#userCart").attr("id")) {
            $("#userCart").hide();
            console.log("emptied");
        }
    });

    // cart Clicked
    $("#userCartBtn").click(function () {
        //Show Cart
        $("#userCart").slideDown("slow");
            populateCart();
    });

    //Closed cart
    $(".close").click(function () {
        $(".table-body").empty();
        $("#userCart").hide();
    });

    //Cart Check Out button
    $(".cartUserOptions button").one("click",function(){
        
        checkOut();
        //TODO Checkout validation and UX
    });
    
    

}

function cartAmountHandlers(){
    $(".itemAmount").change(function(){
        var itemId = $(this).attr("id");
        var itemChanged = cart[itemId];
        itemChanged.amount = parseInt($(this).val());
        total -=parseFloat($(`tr#${itemId} .rowPrice`).text())
        var newPrice = calculatePrice(itemChanged.amount,itemChanged.item.item.timi);
        total += newPrice;
        $(`tr#${itemId} .rowPrice`).text(`${newPrice} €`);
        $(".cartInfo p").text(`Total: ${total} €`);    
    });
}

//Add event handlers for thumbnail items
function addEventHandlersOnItems(){
    //Favorite button click
    $(".itemCardFavIcon").click(function (e) {
        e.stopPropagation();
        console.log("Added on favorites");
    });
    //SET HANDLER FOR ITEM DETAILS
    $(".shopContent .itemCard").click(function () {
        var itemId = $(this).attr("id");
        detailID = itemId;
        showItemDetails();
    });
}

/** AJAX REQUESTS */

/**
 * After user Checks out . Request changes on Database
 */
function checkOut(){
    $(".itemDetailCardAmount input").val(1);
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
                //TODO : ADD SUCCESS MESSAGE
                location.reload();
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
                populateShop(data.result);
                addEventHandlersOnItems();
            } else {
                alert("Items not found...");
            }
        },
        fail: function (er) {
            console.log("error" + er);
        }
    });
}


