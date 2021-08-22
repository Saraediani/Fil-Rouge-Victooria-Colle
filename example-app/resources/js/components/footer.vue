<template>
    <div>
         <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_logo">
        <h2>
         VICTOORIAL COLLE
        </h2>
      </div>
      <div class="row justify-content-around">

        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              About Shop
            </h5>
            <div>
              <div class="img-box">
                <img src="images/location-white.png" width="18px" alt="">
              </div>
              <p>
               Hay Moulay abdellah Rue N°81 - Casablanca - Maroc
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/telephone-white.png" width="12px" alt="">
              </div>
              <p>
              +21266189749/+212661185671
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/envelope-white.png" width="18px" alt="">
              </div>
              <p>
               victooriacolle123@gmail.com
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Informations
            </h5>
            <p>
              ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            </p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <div v-if="successMessage"  class="alert alert-success">
              You've subscribed to our news letter successfully!
            </div>
            <div v-if="errorMessage" class="alert alert-danger">
              Server error! please try again leater
            </div>
            <form action="" @submit.prevent="subscribe">
              <input class="form-control" v-model="newsletterEmail" type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


    </div>
</template>
<script>
import axios from 'axios'
export default {
    data:()=>{
      return {
        newsletterEmail : '',
        successMessage : false,
        errorMessage : false
      }
    },methods:{
      subscribe(){
        axios.post('http://127.0.0.1:8000/api/newsletter',{
          'email':this.newsletterEmail
        }).then(response=>{
          if(response.status == 200){
              this.successMessage = true
              this.errorMessage = false
          }else{
            this.successMessage = false
            this.errorMessage = true
          }
        })
      }
    }
}
</script>