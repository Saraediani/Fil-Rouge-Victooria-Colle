<template>
  <div>
    
  <div class="hero_area">
    <!-- header section strats -->
    <topHeader active="home"/>
    <!-- end header section -->
    <!-- slider section -->
     <section class="slider_section ">
       <div class="container">
         <div class="row vh-100 justify-content-center align-items-center">
           <div class="col-12 col-md-6 text-center text-md-left">
             <h1 class="display-2 text-white"><strong>COLLE<span>VICTOORIA</span></strong></h1>
                    <p class="text-white mb-3">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                      do eiusmod tempor incididunt ut labore
                    </p>
                    <div class="btn-box pb-5">
                      <a href="" class="btn btn-success rounded-pill btn-lg mr-3 shadow">
                        Read More
                      </a>
                      <a href="" class="btn btn-primary rounded-pill btn-lg mr-3 shadow">
                        Contact us
                      </a>
                    </div>
           </div>
           <div class="col-12 col-md-6 text-center text-md-right">
             <div class="img-box mb-5">
                    <img src="images/product-1.png" alt="">
                  </div>
           </div>
         </div>
       </div>
    </section>
    <!-- end slider section -->
  </div>


  <!-- about section -->

<about-us/>
   <!-- end about section -->

  <!-- trending section -->
 
 <category/>

 <!-- end trending section -->


  <!-- product section -->
<section class="brand_section layout_padding">
    <div class="container"> 
      <div class="heading_container">
        <h2>
          Featured Brands
        </h2>
      </div>
      <div class="brand_container layout_padding2">
    <!-- //////////////////////////////// -->
        <product v-for="product,key in products" :key=key :product=product />
     
      </div>
      <!-- <a href="" class="brand-btn">
        See More
      </a> -->
    </div>
  </section>

  <!-- end product section -->

  <!-- contact section -->
  <contact/>

  <!-- end contact section -->

  <!-- client section -->
  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Testimonial
        </h2>
      </div>
    </div>

    <div class="container">
      <div class="client_container layout_padding2">
        <div class="client_box b-1">
          <div class="client-id">
            <div class="img-box">
              <img src="images/client-1.png" alt="" />
            </div>
            <div class="name">
              <h5>
                Magna
              </h5>
              <p>
                Consectetur adipiscing
              </p>
            </div>
          </div>
          <div class="detail">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum
            </p>
            <div>
              <div class="arrow_img">
              </div>
            </div>
          </div>
        </div>
        <div class="client_box b-2">
          <div class="client-id">
            <div class="img-box">
              <img src="images/client-2.png" alt="" />
            </div>
            <div class="name">
              <h5>
                Aliqua
              </h5>
              <p>
                Consectetur adipiscing
              </p>

            </div>
          </div>
          <div class="detail">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum
            </p>
            <div>
              <div class="arrow_img">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- Footer section -->
  <Footer/>
  <!-- end footer section -->

  </div>
</template>
<script>
  import topHeader from '../components/top-header.vue'
  import bouton from '../components/bouton.vue'
  import Footer from '../components/footer.vue'
  import product from '../components/product.vue'
  import AboutUs  from '../components/about.vue'
import Contact from '../components/contact.vue'
import axios from 'axios'
import Category from '../components/category.vue'
export default{
  components : {
    topHeader,
    bouton,
    Footer,
    product,
    AboutUs,
    Contact,
    Category,
  },
  data:()=>{
    return {
      products:[],
      categories:[]
    }
  },
  created(){
    this.getProducts()
    this.getCaregories()
  },
  methods:{
    getProducts(){
      axios.get('http://127.0.0.1:8000/api/product').then(response=>{
        if(response.status == 200){
          this.products = response.data
        }
      })
    },
    getCaregories(){
      axios.get('http://127.0.0.1:8000/api/category/p').then(response=>{
        if(response.status == 200){
          this.categories = response.data
        }
      })
    }
  }
}
</script>

<style scoped>
</style>