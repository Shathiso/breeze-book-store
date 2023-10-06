import Alpine from 'alpinejs';
import focus from '@alpinejs/focus'
import persist from '@alpinejs/persist'
import axios from 'axios';
 
Alpine.plugin(persist)
Alpine.plugin(focus)
window.Alpine = Alpine;

export const store = Alpine.store('Cart', {
    show:Alpine.$persist(false),
    count: Alpine.$persist(0),
    totalCost: Alpine.$persist(0),
    cartBooks: Alpine.$persist([]),
    checkingOut: Alpine.$persist(false),
 
    addToCart(book) {
        this.count++;
        this.totalCost += parseInt(book.price);

        // Empty Cart
        if(this.cartBooks.length <= 0){
            book['quantity'] = 1;
            this.cartBooks.push(book);
            return;
        } else{
            let matched = false;
            for(let x = 0; x < this.cartBooks.length; x++){
                if(book.id == this.cartBooks[x].id){
                  matched = true;
                  this.cartBooks[x].price = parseInt(this.cartBooks[x].price) + parseInt(book.price);
                  this.cartBooks[x]['quantity']++;
                }
            }

            if(!matched){
               book['quantity'] = 1;
               this.cartBooks.push(book);
            }
        }
       
    },

    removeFromCart(book) {
      const index = this.cartBooks.findIndex( (bk) => bk.id == book.id);

      this.count -= this.cartBooks[index].quantity;
      this.totalCost -= book.price;

      this.cartBooks.splice(index, 1);
    },

    reduceBookCartQuantity(book){
      const index = this.cartBooks.findIndex( (bk) => bk.id == book.id);
      const bookPrice = parseInt(book.price) / book.quantity;

      if(this.cartBooks[index].quantity <= 1){
        this.cartBooks.splice(index, 1);
      }

      this.count--;
      this.totalCost -= parseInt(bookPrice);

      this.cartBooks[index].price -= parseInt(bookPrice);
      this.cartBooks[index].quantity--;

    },

    increaseBookCartQuantity(book){

      const index = this.cartBooks.findIndex( (bk) => bk.id == book.id);
      const bookPrice = parseInt(book.price) / book.quantity;

      this.count++;
      this.cartBooks[index].quantity++;

      this.totalCost += parseInt(bookPrice);
      this.cartBooks[index].price = parseInt(this.cartBooks[index].price) + parseInt(bookPrice);
      

    },

    clearCart() {
        this.count = 0;
        this.totalCost = 0;
        this.cartBooks = [];
    },

    goToCart() {
      this.show = false
       window.location = `${window.location.origin}/cart`;
    },


    goToLogin(){
      this.show = false

      // Flag that you are checking out for the login to redirect you appropriately
      this.checkingOut = true;

      window.location = `${window.location.origin}/login`;
    },

    async orderBooks() {
      const url = `${window.location.origin}/api/books/checkout`;
      const csrf = document.querySelector("meta[name='csrf-token']").getAttribute('content');
      
      const headers = {
        'X-CSRF-TOKEN': csrf,
        'Accept': 'application/json'  
      };

        await axios.post(url, {
          headers: headers
        })
        .then(function (response) {
          if(response.data.success){
              // close the Modal
              this.show = false



              // Redirect to the login page
              window.location = `${window.location.origin}/login`;
          }
        })
        .catch(function (error) {

        });
    }

})

Alpine.start();