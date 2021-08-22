<template>
  <div>
    
  <div style="height: fit-content !important;" class="hero_area"> 
    <!-- header section strats -->
    <topHeader active="about"/>
    <!-- end header section -->
  </div>


  <!-- about section -->

 <about/>
  <!-- end about section -->


   <!-- Footer section -->
  
<Footer/>
  <!-- end footer section -->



  </div>
</template>
<script>
import topHeader from '../components/top-header.vue'
 import Footer from '../components/footer.vue'
 import about from '../components/about.vue'
export default{
  components : {
    topHeader,
    Footer,
    about
  }
}
</script>