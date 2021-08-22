<template>
    <div>
         <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container ">
      <div class="heading_container">
        <h2 class="">
          Contact Us
        </h2>
      </div>

    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div v-if="(errMessage != '')" class="alert alert-danger">
            {{errMessage}}
          </div>
          <div v-if="successMessage == true" class="alert alert-success">
            Your message was send successfully!
          </div>
          <form action="" @submit.prevent="sendContact">
            <div>
              <input v-model="name" type="text" placeholder="Name" />
            </div>
            <div>
              <input v-model="email" type="email" placeholder="Email" />
            </div>
            <div>
              <input v-model="phone" type="text" placeholder="Phone" />
            </div>
            <div>
              <input v-model="message" type="text" class="message-box" placeholder="Message" />
            </div>
            <div class="d-flex ">
              <button type="submit">
                SEND
              </button>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <div class="map_container">
            <div class="map-responsive">
              <iframe
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
                allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

        
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data:()=>{
      return {
        name:'',
        email:'',
        phone:'',
        message:'',
        errMessage:'',
        successMessage : false
      }
    },
    methods:{
      validate(){
        if(this.name == '') return false
        if(this.email == '') return false
        if(this.phone == '') return false
        if(this.message == '') return false
        this.errMessage = ''
        return true
      },
      sendContact(){
        if(this.validate()){
           axios.post('http://127.0.0.1:8000/api/contact',{
            name:this.name,
            email:this.email,
            phone:this.phone,
            message:this.message
          }).then(response=>{
            if(response.status == 200){
              this.errMessage = ''
              this.successMessage = true
              // console.log(response);
            }else{
              this.errMessage = 'Server error! please try again'
              this.successMessage = false
            }
          })
        }else{
          this.errMessage = "Please make sure to fill all required fields!";
        }
      }
    }
}
</script>