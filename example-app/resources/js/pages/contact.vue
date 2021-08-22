
<template>
  <div>
    
  <div style="height: fit-content !important;" class="hero_area">
    <!-- header section strats -->
    <topHeader active="contact"/>
    <!-- end header section -->
  </div>



  <!-- contact section -->

<contact/>

  <!-- end contact section -->



  <!-- Footer section -->
  <Footer/>
  <!-- end footer section -->

  </div>
</template>
<script>
import topHeader from '../components/top-header.vue'
import Footer from '../components/footer.vue'
import contact from '../components/contact.vue'
export default{
  components : {
    topHeader,
    Footer,
    contact

  }
}
</script>