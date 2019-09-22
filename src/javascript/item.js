class Item {
    
    constructor(item){
        this.item = item;
    }
    createItemElement(){
        var container = $("<div></div>").attr("id",this.item.id).addClass("itemCard");
        var img = $("<img/>").addClass("itemCardImg").attr("src",this.item.eikona);
        var content = $("<div></div>").addClass("itemCardContent");
        var h2 = $("<h2></h2").addClass("itemCardHeader").text(this.item.titlos);
        var stock = $("<p></p>").addClass("itemCardStock").text( (this.item.apothema != 0) ? `In Stock: ${this.item.apothema}` : `Out of Stock!`);
        var price = $("<p></p>").addClass("itemCardPrice").text(`Price: ${this.item.timi}`);
        var iconFav = $("<i></i>").addClass("fas fa-heart icon fav");
        var iconCart = $("<i></i>").addClass("fas fa-cart-plus icon cart");
        var iconsCont = $("<div></div>").addClass("itemCardIcons");
        iconsCont.append([iconFav,iconCart]);
        content.append([h2,stock,price,iconsCont])
        container.append([img,content]);
        return container;
    }
}
