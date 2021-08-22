<template>
  <div>
    
  <div style="height: fit-content !important;" class="hero_area">
    <!-- header section strats -->
    <topHeader active="shop"/>
    <!-- end header section -->
  </div>



  <!-- product section -->
<section class="brand_section layout_padding">
    <div class="container"> 
      <div class="heading_container d-flex justify-content-between align-items-center">
        <h2>
          Our Products:
        </h2>
        <router-link to="/panier" class="btn btn-danger rounded-circle shadow"><i class="fa fa-shopping-cart"></i></router-link>
      </div>
      <div class="brand_container layout_padding2">
    <!-- //////////////////////////////// -->
        <product v-for="product,key in products" :key=key :product=product />
  <!-- //////////////////////////////// -->
     
      </div>
    </div>
  </section>

  <!-- end product section -->

<!-- Footer section -->
  <Footer/>
  <!-- end footer section -->


  </div>
</template>

<script>
  import topHeader from '../components/top-header.vue'
  import Footer from '../components/footer.vue'
  import Product from '../components/product.vue'
  export default{
    components : {
      topHeader,
      Footer,
      Product
    },
    data:()=>{
      return {
        products:[]
      }
    },
    created(){
      this.getProducts()
    },
    methods:{
      getProducts(){
      axios.get('http://127.0.0.1:8000/api/product').then(response=>{
        if(response.status == 200){
          this.products = response.data
        }
      })
    },
    }
  }
</script>