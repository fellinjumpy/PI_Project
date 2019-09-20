// $(".itemCard").click(function(){
//     console.log($(this).attr("id"));
// });
$(document).ready(function(){
$(".badge").hide();

var cart = [];
$(".cart").click(function(){
    console.log("clicked on cart!");
    var parent = $(this).parents('div[class="itemCard"]').eq(0);
    var itemId = parent.attr("id");
    console.log(`Item with id ${itemId} added to cart!.`);
    //alert("Added to cart!");
    cart.push(itemId);
    if(cart.length == 1 ){
        $(".badge").show();
    }
    
    $(".badge").text(cart.length);
    displayAlert("Item added to Cart!")
    console.log(`Current cart length:${cart.length}, Cart: ${cart}` );
});

function displayAlert(string){
    $(".alert span").text(string);
    console.log($(".alert"));

    $("#slide")
    .slideDown(1000,function(){
        $("#slide").slideUp("slow",function(){});
    });
}
});