class Item {
    
    constructor(item){
        this.item = item;
        this.amount = 1; //DEFAULT
        this.container;
        this.total = 0;
    }
    createItemElement(){
        
        var container = $("<div></div>").attr("id",this.item.id).addClass("itemCard");
        var img = $("<img/>").addClass("itemCardImg").attr("src",this.item.eikona);
        var iconFavSolid = $("<i></i>").addClass("fas fa-heart fa-stack-1x solid ");
        var iconFavOutline = $("<i></i>").addClass("far fa-heart fa-stack-1x   outline");
        var iconStack = $("<span></span>").addClass("itemCardFavIcon fa-stack fa-2x ").append([iconFavSolid,iconFavOutline]);
        var content = $("<div></div>").addClass("itemCardContent");
        var h2 = $("<h2></h2").addClass("itemCardHeader").text(this.item.titlos);
        var stock = $("<p></p>").addClass("itemCardStock").text( (this.item.apothema != 0) ? `${this.item.apothema} Left` : `Out of Stock!`);
        var price = $("<p></p>").addClass("itemCardPrice").text(`${this.item.timi} €`);
        var imgContainer = $("<div></div>").append([img,iconStack,h2,stock]).addClass("itemCardImgContainer");
        content.append([price])
        container.append([imgContainer,content]);
        this.container = container;
        
        return this.container;
    }
    createItemRow(amount,price ,id){
        var tdId = $("<td></td>").text(this.item.id);
        var tdTitle = $("<td></td>").text(this.item.titlos);
        var tdPrice =$("<td></td>").text(price + " €").addClass("rowPrice");
        var amountInput = $("<input>").attr({"type":"number","min":"1" ,"value":"1" ,"id":id}).addClass("itemAmount");
        var tdAmount = $("<td></td>").append(amountInput);
        var row = $("<tr></tr>").append([tdId,tdTitle,tdAmount,tdPrice]).attr("id",id);
        amountInput.val(amount);
        return row;
    }
    createDetailedItem(){
        $('.itemDetailSection .itemCard').attr("id", this.item.id);
        $('.itemDetailCardImg').attr("src", this.item.eikona);
        $('.detailHeader').text(this.item.titlos);
        $('.itemCardDescription').text(this.item.perigrafi);
        $('.detailStock').text(
            (this.item.apothema != 0) ? `${this.item.apothema} Left in stock!` : `Out of Stock!`);
        $('.itemChoices .itemCardPrice').text(`${this.item.timi} €`);
        
    }
     
    
    // calculatePrice(){
    //         var price = parseFloat(this.item.timi);
    //         var total = Math.floor( (price*this.amount) *100) /100;
    //         this.total = total;
    //         console.log(this.total);
            
    // }
}
