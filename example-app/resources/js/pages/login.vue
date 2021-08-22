<template>
    <div class="login">
        <div class="overlay">
            <form @submit.prevent>
                <!--   con = Container  for items in the form-->
                <div class="con">
                    <!--     Start  header Content  -->
                    <header class="head-form">
                        <h2>Log In</h2>
                    </header>
                    <!--     End  header Content  -->
                    <br />
                    <div class="field-set text-center">
                        <!--   user name -->
                        <div class="mb-3 d-flex justify-content-center align-items-center">
                            <span class="input-item">
                                <i class="fa fa-user-circle"></i>
                            </span>
                            <!--   user name Input-->
                            <input
                                class="form-input"
                                id="txt-input"
                                type="email"
                                placeholder="Email..."
                                required v-model="email"
                            />
                        </div>

                        <!--   Password -->

                        <div class="mb-3 d-flex justify-content-center align-items-center">
                            <span class="input-item">
                                <i class="fa fa-key"></i>
                            </span>
                            <!--   Password Input-->
                            <input
                                class="form-input"
                                type="password"
                                placeholder="Password"
                                id="pwd"
                                name="password"
                                required
                                v-model="password"
                            />

                            <!--      Show/hide password  -->
                            <span>
                                <i
                                    class="fa fa-eye"
                                    aria-hidden="true"
                                    type="button"
                                    id="eye"
                                ></i>
                            </span>
                        </div>

                        <br />
                        <!--        buttons -->
                        <!--      button LogIn -->
                        <div class="text-center w-100">
                            <button class="log-in m-auto" @click="login">Log In</button>
                        </div>
                    </div>

                    <!--   other buttons -->
                    <div class="other text-center">
                        <!--      Forgot Password button-->
                        <button class="btn submits frgt-pass">
                            Forgot Password
                        </button>
                        <!--     Sign Up button -->
                        <button class="btn submits sign-up m-auto">
                            Sign Up
                            <!--         Sign Up font icon -->
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </button>
                        <!--      End Other the Division -->
                    </div>

                    <!--   End Conrainer  -->
                </div>

                <!-- End Form -->
            </form>
        </div>
    </div>
</template>

<style scoped>
/* Start form  attributes */
form {
    width: 450px;
    min-height: 500px;
    height: auto;
    border-radius: 5px;
    margin: 2% auto;
    box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
    padding: 2%;
    background: linear-gradient(
        157deg,
        rgba(199, 0, 0, 1) 0%,
        rgba(12, 117, 0, 1) 100%
    );
}
form Container form .con {
    display: -webkit-flex;
    display: flex;
    text-align: center;
    -webkit-justify-content: center;
    justify-content: center;

    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;

    margin: 0 auto;
}

/* /* the header form form */
header {
    margin: 2% auto 10% auto;
    text-align: center;
}
/* Login title form form */
header h2 {
    font-size: 250%;
    color: #e4e4e4;
    font-family: "Open Sans", sans-serif;
}

/* */
/* */

.input-item {
    width: 40px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    background: #ffffff;
    height: 50px;
    color: #000000;
    padding: 0px;
    border-radius: 5px 0px 0px 5px;
    margin-inline-end: 8px;
}

/* Show/hide password Font Icon */
#eye {
    color: rgb(0, 0, 0);

    margin: 5.9px 0 0 0;
    margin-left: -30px;
    padding: 15px 9px 19px 0px;
    border-radius: 0px 5px 5px 0px;
    position: relative;
    right: 1%;
    top: -0.2%;
    z-index: 5;

    cursor: pointer;
}
/* inputs form  */
input[class="form-input"] {
    width: 251px;
    height: 50px;

    /* margin-top: 2%; */
    padding: 15px;

    font-size: 16px;
    font-family: "Open Sans", sans-serif;
    color: #5e6472;

    outline: none;
    border: none;

    border-radius: 0px 5px 5px 0px;
    transition: 0.2s linear;
}
input[id="txt-input"] {
    width: 250px;
}
/* focus  */
input:focus {
    transform: translateX(-2px);
    border-radius: 5px;
}

/* */
/* */

/* input[type="text"] {min-width: 250px;} */
/* buttons  */
button {
    display: inline-block;
    color: #252537;

    width: 191px;
    height: 50px;

    padding: 0 20px;
    background: rgb(255, 255, 255);
    border-radius: 5px;

    outline: none;
    border: none;

    cursor: pointer;
    text-align: center;
    transition: all 0.2s linear;

    margin: 7%;
    letter-spacing: 0.05em;
}
/* Submits */
.submits {
    width: 48%;
    display: inline-block;
    margin: 7%;
}

/*       Forgot Password button FAF3DD  */
.frgt-pass {
    background: transparent;
    color: #bebcbc;
}

/*     Sign Up button  */
.sign-up {
    background: #ffffff;
}

/* buttons hover */
button:hover {
    transform: translatey(3px);
    box-shadow: none;
}

/* buttons hover Animation */
button:hover {
    animation: ani9 0.4s ease-in-out infinite alternate;
}
@keyframes ani9 {
    0% {
        transform: translateY(3px);
    }
    100% {
        transform: translateY(5px);
    }
}
</style>
<script>
import axios from 'axios';
export default {
    created() {
        var pwShown = 0;
        document.getElementById("eye").addEventListener(
            "click",
            function() {
                if (pwShown == 0) {
                    pwShown = 1;
                    this.show();
                } else {
                    pwShown = 0;
                    this.hide();
                }
            },
            false
        );
    },
    data() {
        return {
            email:'',
            password:''
        }
    },
    methods: {
        show() {
            var p = document.getElementById("pwd");
            p.setAttribute("type", "text");
        },
        hide() {
            var p = document.getElementById("pwd");
            p.setAttribute("type", "password");
        },
        login(){
            axios.post('http://127.0.0.1:8000/api/login',{
                email:this.email,
                password:this.password
            }).then(response=>{
                if(response.status == 201){
                    localStorage.setItem('admin',JSON.stringify(response.data.admin))
                    localStorage.setItem('token',response.data.token)
                    this.$router.push('/dashboard')
                }
                console.log(response.data);
            })
        }
    }
};
</script>
