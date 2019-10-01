class Item {
    
    constructor(item){
        this.itemData = item;
        this.amount = 1; //DEFAULT
        this.container;
        this.total = 0;
    }
    createItemElement(){
        
        var container = $("<div></div>").attr("id",this.itemData.id).addClass("itemCard");
        var img = $("<img/>").addClass("itemCardImg").attr("src",this.itemData.eikona);
        var iconFavSolid = $("<i></i>").addClass("fas fa-heart fa-stack-1x solid ");
        var iconFavOutline = $("<i></i>").addClass("far fa-heart fa-stack-1x   outline");
        var iconStack = $("<span></span>").addClass("itemCardFavIcon fa-stack fa-2x ").append([iconFavSolid,iconFavOutline]);
        var content = $("<div></div>").addClass("itemCardContent");
        var h2 = $("<h2></h2").addClass("itemCardHeader").text(this.itemData.titlos);
        var stock = $("<p></p>").addClass("itemCardStock").text( (this.itemData.apothema != 0) ? `${this.itemData.apothema} Left` : `Out of Stock!`);
        var price = $("<p></p>").addClass("itemCardPrice").text(`${this.itemData.timi} €`);
        var imgContainer = $("<div></div>").append([img,iconStack,h2,stock]).addClass("itemCardImgContainer");
        content.append([price])
        container.append([imgContainer,content]);
        this.container = container;
        
        return this.container;
    }
    createItemRow(amount,price ,id){
        var deleteItem = $("<td></td>").html("<i class='fas fa-trash'></i>");
        deleteItem.addClass("deleteFromCart");
        deleteItem.attr("id",id);
        var tdId = $("<td></td>").text(this.itemData.id);
        var tdTitle = $("<td></td>").text(this.itemData.titlos);
        var tdPrice =$("<td></td>").text(price + " €").addClass("rowPrice");
        var amountInput = $("<input>").attr({"type":"number","min":"1" ,"value":"1" ,"id":id}).addClass("itemAmount");
        var tdAmount = $("<td></td>").append(amountInput);
        var row = $("<tr></tr>").append([tdId,tdTitle,tdAmount,tdPrice,deleteItem]).attr("id",id);
        amountInput.val(amount);
        return row;
    }
    createDetailedItem(){
        $('.itemDetailSection .itemCard').attr("id", this.itemData.id);
        $('.itemDetailCardImg').attr("src", this.itemData.eikona);
        $('.detailHeader').text(this.itemData.titlos);
        $('.itemCardDescription').text(this.itemData.perigrafi);
        $('.detailStock').text(
            (this.itemData.apothema != 0) ? `${this.itemData.apothema} Left in stock!` : `Out of Stock!`);
        $('.itemChoices .itemCardPrice').text(`${this.itemData.timi} €`);
        if(this.itemData.apothema == 0){
            $(".cart").text("OUT OF STOCK!").attr("disabled", true)
            $(".cart").addClass("disabled alertRed").removeClass("enabled");
        }else{
            $(".cart").text("Add to Cart").attr("disabled", false);
            $(".cart").addClass("enabled").removeClass("disabled alertRed");
            
        }
        $(".addtoF").removeClass("disabled").addClass("enabled");
        
    }
  
}
