<template>
    <!-- <div> -->
      
        
         <div class="box">
          <router-link :to="'/product/'+product.id">
            <div class="img-box">
              <img :src=product.image :alt=product.name>
            </div>
          </router-link>
            <div class="detail-box">
              <h6 class="price">
                ${{product.price}}
              </h6>
              <h6>
                {{product.name}}
              </h6>
              <div class="text-center w-100">
                <Bouton :id=product.id />
              </div>
            </div>
        </div>
</template>
<script>

  
import Bouton from '../components/bouton.vue'
export default {
  components:{
    Bouton
  },
  props:{
    product:Object
  }
  
}
</script>