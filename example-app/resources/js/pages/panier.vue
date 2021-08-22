<template>
    <div>
        <div style="height: fit-content !important;" class="hero_area">
            <!-- header section strats -->
            <topHeader active="contact" />
            <!-- end header section -->
        </div>
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-success">Cart:</h2>
                    </div>
                </div>
                <hr />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 p-3">
                        <cardItem
                            :removeMe="refreshItems"
                            v-for="(item, key) in cartTiems"
                            :key="key"
                            :product="item"
                        />
                    </div>
                    <div class="col-12 col-md-4 p-3">
                        <div class="bg-light p-3 mb-3 shadow-sm border rounded">
                            <h2 class="text-success h4">Cart details:</h2>
                            <hr />
                            <div class="">
                                <div class="form-group">
                                    Item in cart :
                                    <span class="text-primary">{{
                                        cartTiems.length
                                    }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light p-3 shadow-sm border rounded">
                            <h2 class="text-success h4">Order details:</h2>
                            <hr />
                            <div
                                v-if="errMessage != ''"
                                class="alert alert-danger"
                            >
                                {{ errMessage }}
                            </div>
                            <div
                                v-if="successMessage == true"
                                class="alert alert-success"
                            >
                                Your message was send successfully!
                            </div>
                            <form @submit.prevent="sendOrder">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="name">Name:</label>
                                        <input
                                            type="text"
                                            v-model="name"
                                            class="form-control"
                                            name="name"
                                            placeholder="name..."
                                        />
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="email">Email:</label>
                                        <input
                                            type="text"
                                            v-model="email"
                                            class="form-control"
                                            name="email"
                                            placeholder="email.."
                                        />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="phone">Phone:</label>
                                        <input
                                            type="text"
                                            v-model="phone"
                                            class="form-control"
                                            name="phone"
                                            placeholder="phone..."
                                        />
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="phone">Regien:</label>
                                        <select
                                            class="form-control form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example"
                                            v-model="region"
                                        >
                                            <option> Select a Region : </option>
                                            <option
                                                v-for="reg in regions"
                                                :key="reg.id"
                                                :value="reg.id+'-'+reg.name"
                                                >{{ reg.name }}</option
                                            >
                                            <!-- <option value="1">{{ region.name }}</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="ville">Ville:</label>
                                        <input
                                            type="text"
                                            v-model="ville"
                                            class="form-control"
                                            name="ville"
                                            placeholder="ville..."
                                        />
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="codepostal"
                                            >Code postal:</label
                                        >
                                        <input
                                            type="text"
                                            v-model="codePostal"
                                            class="form-control"
                                            name="codepostal"
                                            placeholder="code postal..."
                                        />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button
                                        type="submit"
                                        class="btn btn-success btn-block btn-lg"
                                    >
                                        Make order
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Footer />
    </div>
</template>

<style scoped>
.main {
    min-height: calc(100vh - 100px);
}
</style>

<script>
import topHeader from "../components/top-header.vue";
import Footer from "../components/footer.vue";
import cardItem from "../components/card-item.vue";
import axios from "axios";
export default {
    components: {
        topHeader,
        Footer,
        cardItem
    },
    data() {
        return {
            cartTiems: [],
            name: "",
            email: "",
            phone: "",
            region: "",
            ville: "",
            codePostal: "",
             errMessage:'',
             successMessage : false,
            regions: []
        };
    },
    created() {
        this.getCartData();
        this.getRegionsData();
    },
    methods: {
        getCartData() {
            this.cartTiems = [];
            let cart = [];
            if (localStorage.getItem("cart")) {
                cart = JSON.parse(localStorage.getItem("cart"));
            }
            cart.forEach(product => {
                this.getProduct(parseInt(product.substr(1), 10));
            });
        },
        getProduct(id) {
            axios
                .get("http://127.0.0.1:8000/api/product/" + id)
                .then(response => {
                    if (response.status == 200) {
                        this.cartTiems.push(response.data);
                    }
                });
        },
        getRegionsData() {
            axios.get("http://127.0.0.1:8000/api/regiont").then(response => {
                if (response.status == 200) {
                    this.regions = response.data;
                }
            });
        },
        refreshItems() {
            this.getCartData();
        },

        sendOrder() {
            axios
                .post("http://127.0.0.1:8000/api/makeOrder", {
                    name: this.name,
                    email: this.email,
                    phone: this.phone,
                    region: this.region,
                    ville: this.ville,
                    codePostal: this.codePostal,
                    cart : this.cartTiems
                }).catch(function (error) {
                        if (error.response) {
                        // The request was made and the server responded with a status code
                        // that falls out of the range of 2xx
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                        } else if (error.request) {
                        // The request was made but no response was received
                        // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                        // http.ClientRequest in node.js
                        console.log(error.request);
                        } else {
                        // Something happened in setting up the request that triggered an Error
                        console.log('Error', error.message);
                        }
                        console.log(error.config);
                    })
                .then(response => {
                    if (response.status == 200) {
                        this.errMessage = "";
                        this.successMessage = true;
                        // console.log(response);
                    } else {
                        this.errMessage = "Server error! please try again";
                        this.successMessage = false;
                    }
                });
        }
    }
};
</script>
