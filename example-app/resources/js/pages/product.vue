<template>
  <div>
     <div style="height: fit-content !important;" class="hero_area">
    <!-- header section strats -->
    <topHeader active="contact"/>
    <!-- end header section -->
  </div>
    <div class="container w-50 ">
      <div class="row shadow bg-light rounded mt-5 mb-5">
        <div class="col-6">
          <div class="p-5 d-flex justify-content-center rounded">

            <img :src=product.image alt="" class="img img-responsive w-60">
          </div>
          </div>

      
        <div class="col-6">
          <div class="p-5 px-2 ">
            <h1 class="h1 mb-5">{{product.name}}</h1>
            <span class="display-4 text-danger mb-3"><strong>{{product.price}}$</strong></span>
            <h2 class="h2 mb-3">Description:</h2>
            <p class="small mb-5">
              {{product.description}}
            </p>
            <Bouton :id=product.id />
          </div>

        </div>
      </div>
    </div>
     <!-- Footer section -->
  <Footer/>
  <!-- end footer section -->
  </div>
</template>
<script>
import topHeader from '../components/top-header.vue'
import Footer from '../components/footer.vue'
import Bouton from '../components/bouton.vue'
export default {
   components : {
    topHeader,
    Footer,
    Bouton
   },
   props:['id'],
    data:()=>{
      return {
        product:[]
      }
    },
    created(){
      this.getProduct()
    },
    methods:{
      getProduct(){
      axios.get('http://127.0.0.1:8000/api/product/'+this.id).then(response=>{
        if(response.status == 200){
          this.product = response.data
        }
      })
    },
    }
  }

</script>

