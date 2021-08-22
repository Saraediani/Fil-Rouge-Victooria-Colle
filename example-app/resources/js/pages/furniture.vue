<template>
  <div>
    
 <div style="height: fit-content !important;" class="hero_area">
    <!-- header section strats -->
    <topHeader active="furniture"/>
    <!-- end header section -->
  </div>

  <!-- trending section -->

<category/>
  <!-- end trending section -->


 <!-- Footer section -->
  <Footer/>
  <!-- end footer section -->


  </div>
</template>
<script>
import topHeader from '../components/top-header.vue'
import Footer from '../components/footer.vue'
import Category from '../components/category.vue'
export default{
  components : {
    topHeader,
    Footer,
    Category
  }
}
</script>