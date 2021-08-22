<template>
    <div class="cart-item shadow-sm py-3 mb-3 border rounded">
        <div class="row d-flex m-0 pb-2 flex-row align-items-center">
        <div class="col-2 text-center text-md-left">
            <img width="70" :src=product.image :alt=product.name>
        </div>
        <div class="col-3 text-center text-md-left">
            <span>{{ product.name }}</span>
        </div>
        <div class="col-1 text-center text-md-left">
            <strong class="text-danger">${{ product.price }}</strong>
        </div>
        <div class="col-3 text-center text-md-left">
            <div class="d-flex flex-row justify-content-center align-items-center">
                <button :disabled="(qte < 2)?true:false" class="btn btn-sm btn-dark rounded" @click="subs">-</button>
                <input type="text" readonly v-model="qte" class="form-control w-25 mx-3">
                <button class="btn btn-sm btn-dark rounded" @click="add">+</button>
            </div>
        </div>
        <div class="col-2 text-center text-md-left">
            SubTotal: <span class="text-danger">${{ totalPrice }}</span>
        </div>
        <div class="col-1">
            <button @click="removeFromCart" class="btn btn-danger rounded btn-sm">x</button>
        </div>
    </div>
    </div>
</template>

<style scoped>

</style>
<script>
export default {
    props:{
        product:Object,
        removeMe:Function
    },
    watch:{
        qte(){
            this.calculateSubTotal()
        }
    },
    created(){
            this.calculateSubTotal()
    },
    data() {
        return {
            qte:1,
            totalPrice:0
        }
    },
    methods:{
        add(){
            this.qte++
        },
        subs(){
            if(this.qte > 1){
                this.qte--
            }
        },
        calculateSubTotal(){
            this.totalPrice = (this.qte * parseFloat(this.product.price).toFixed(2)).toFixed(2)
        },
        removeFromCart(){
            let cart = [];
            if(localStorage.getItem('cart')){
                cart = JSON.parse(localStorage.getItem('cart'))
            }
            let index = cart.indexOf('p'+this.product.id);
            if (index > -1) {
                cart.splice(index, 1);
            }
            localStorage.setItem('cart',JSON.stringify(cart))
            this.$emit(this.removeMe())
        }
    }
}
</script>