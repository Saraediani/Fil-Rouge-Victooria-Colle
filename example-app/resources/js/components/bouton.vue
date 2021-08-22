<template>
    <div>
         <div class="bouton_4" @click="addToCart">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/173024/caddie.png"/>
                    <span class="texteduboutton_4">Add to cart</span>
                  
            </div>    
    </div>
</template>
<style scoped>
.bouton_4{
    cursor: pointer;
}
</style>
<script>
import Toastify from 'toastify-js'
import "toastify-js/src/toastify.css"
export default {
    props:['id'],
    methods:{
    addToCart(){
      let cart = [];
      if(localStorage.getItem('cart')){
        cart = JSON.parse(localStorage.getItem('cart'))
      }
      if(!cart.includes('p'+this.id)){
        cart.push('p'+this.id)
        localStorage.setItem('cart',JSON.stringify(cart))
            Toastify({
                text: "Product added to cart successfully",
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                className: "info",
            }).showToast();
      }

    }
  }
}
</script>