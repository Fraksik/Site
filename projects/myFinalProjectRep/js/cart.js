'use strict';

class Cart {
    constructor($priceBox, $countBox, $cartBox) {
        this.$priceBox = $priceBox;
        this.$countBox = $countBox;
        this.$cartBox = $cartBox;
        this.amount = 0;
        this.cartProducts = [];
        this.ajaxGetProducts();

    }

    init() {
        this.setPriceAndCount(this.$priceBox, this.$countBox);
    }

    setPriceAndCount($priceBox, $countBox) {
        let $total = $('<span/>', {
            text: 'total'
        });

        let $price = $('<span/>', {
            text: `$${this.amount}.00`,
        });

        let $count = $('<span/>', {
            text: this.cartProducts.length
        });

        $count.appendTo($countBox);

        $total.appendTo($priceBox);
        $price.appendTo($priceBox);
    }

    ajaxGetProducts() {
        $.ajax({
            type: 'GET',
            url: 'json/products.json',
            dataType: 'json',
            context: this,
            success: function (data) {
                this.amount = data.amount;

                for (let k = 0; k < data.cart.length; k++) {
                    let item = data.cart[k];
                    let createNewProduct = new AddGoodToCart(item.title, item.price, item.id, item.img, item.link);
                    createNewProduct.run(this.$cartBox);
                    this.cartProducts.push(item);
                }

                this.$priceBox.children().last().text(`$${this.amount}.00`);
                this.$countBox.children().text(this.cartProducts.length);
            },
            error: function (error) {
                console.log('Ошибка при получении содержимого корзины', error);
            }
        });
    }

    addProduct(title, price, id, img, link) {
        let newProduct = {
            title,
            price,
            id,
            img,
            link
        };
        this.cartProducts.push(newProduct);
        this.amount += price;
        this.refresh();
    }

    removeProduct(productId) {
        for (let item of this.cartProducts) {
            if (item.id === productId) {
                let productIndex = this.cartProducts.indexOf(item);
                this.cartProducts.splice(productIndex, 1);
                this.amount -= item.price;
                break;
            }
        }
        this.refresh();
    }

    refresh() {
        this.$priceBox.children().last().text(`$${this.amount}.00`);
        this.$countBox.children().text(this.cartProducts.length);
        this.$cartBox.children().remove();

        let productInCart = [];

        createNew: for (let k = 0; k < this.cartProducts.length; k++) {

            let item = this.cartProducts[k];
            let createNewProduct = new AddGoodToCart(item.title, item.price, item.id, item.img, item.link);
            let newProduct = {
                title: item.title,
                price: item.price,
                id: item.id,
                img: item.img,
                link: item.link,
                count: 1
            };
            createNewProduct.run(this.$cartBox);
            productInCart.push(newProduct);

            // TODO: надо доработать
            // if (productInCart.length === 0) {
            //     productInCart.push(newProduct);
            // } else {
            //     for (let k = 0; k < productInCart.length; k++) {
            //         let element = productInCart[k];
            //         console.log(element.id);
            //         if (element.id === item.id) {
            //             console.log(element);
            //             continue createNew;
            //         } else {
            //             productInCart.push(newProduct);
            //             continue createNew;
            //         }
            //     }
            // }

        }
        console.log(productInCart);

        if (this.cartProducts.length > 9) {
            this.$countBox.children('span').css('left', '3px')
        } else {
            this.$countBox.children('span').css('left', '6px')
        }
    }
}