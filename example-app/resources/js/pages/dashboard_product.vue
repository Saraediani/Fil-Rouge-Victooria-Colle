<template>
    <div>
        <div>
        <modal name="my-first-modal" height="80%">
            <form style="padding: 20px" @submit.prevent='addProduct'>
                <div @click="hide()" class="col text-right" >
                    <span class="btn"
                        ><i class="fas fa-sign-out-alt text-light py-2"></i
                    ></span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"
                        >Name:</label
                    >
                    <input
                    ref="name"
                        type="text"
                        class="form-control"
                        id="exampleInputEmail1"
                    />
                </div>
                <div class="mb-3">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"
                        >QTE:</label
                    >
                    <input
                    ref="qte"
                        type="qt"
                        class="form-control"
                        id="exampleInputEmail1"
                    />
                </div>
                    <label for="exampleInputEmail1" class="form-label"
                        >Price:</label
                    >
                    <input
                    ref="price"
                        type="price"
                        class="form-control"
                        id="exampleInputEmail1"
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"
                        >Description:</label
                    >
                    <input
                    ref="description"
                        type="text"
                        class="form-control"
                        id="exampleInputPassword1"
                    />
                </div>
                 <div class="mb-3">
                    <label for="image" class="form-label"
                        >Image:</label
                    >
                    <input
                    ref="image"
                        type="text"
                        class="form-control"
                        id="image"
                    />
                </div>
                 <div class="mb-3">
                    <label for="ADMIN" class="form-label"
                        >Admin Id:</label
                    >
                    <input
                    ref="admin_id"
                        type="id"
                        class="form-control"
                        id="ADMIN"
                    />
                </div>
                 <div class="mb-3">
                    <label for="CATEGORY" class="form-label"
                        >Category Id:</label
                    >
                    <input
                    ref="category_id"
                        type="id"
                        class="form-control"
                        id="CATEGORY"
                    />
                </div>
                <button type="submit" style="  background-color:#0D6A31; color:white;"  class= "btn ">Ajouter</button>
            </form>
        </modal>
        <main class="content" style="background-color:#FFFBF2;">
             <div class="col text-left">
            <router-link
               to="dashboard"
                class="btn btn-lg text-white  "
                style="margin-top: 25px;background-color:#0D6A31;"
                ><i class="fas fa-home text-white "></i> Dashboard</router-link
            >
        </div>
            <section class="title">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-left py-3">
                            <h2 class="display-4" style="  color:#0D6A31;">
                                Product:
                            </h2>
                        </div>
                    </div>
                    <div
                        class="col-auto text-right"
                        style="margin-bottom: 10px"
                    >
                        <span
                            @click="show()"
                            class="btn btn-success btn-lg text-white "
                            style="background-color:#0D6A31;"
                            ><i class="far fa-newspaper text-white"></i>
                            Ajouter</span
                        >
                    </div>
                    <table class="table">
                        <thead
                            class="thead"
                            style="background-color:#0D6A31;  color:white;"
                        >
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">name</th>
                                <th scope="col">qte</th>
                                 <th scope="col">price</th>
                                <th scope="col">description</th>
                                <th scope="col">image</th>
                                <th scope="col">Admin Id</th>
                                <th scope="col">Category Id</th>
                                <th scope="col">actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in products" :key="product.id">
                                <th scope="row">
                                    {{ product.id }}
                                </th>
                                <td>{{ product.name }}</td>
                                <td>{{ product.qte }}</td>
                                <td>{{ product.price }}</td>
                                <td>{{ product.description }}</td>
                                <td>{{ product.image }}</td>
                                <td>{{ product.admin_id }}</td>
                                <td>{{ product.category_id }}</td>
                                
                                <td class="d-flex">
                                    <button class="btn btn-success btn-sm mx-1">
                                        <i class="fas fa-pen text-white"></i>
                                    </button>
                                    <button
                                        @click="deleteProduct(product.id)"
                                        class="btn btn-danger btn-sm mx-1"
                                    >
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data: () => {
        return {
            products:[],
        };
    },
    created() {
        this.getProductData()
    },
    methods: {
        getProductData() {
            axios.get("http://127.0.0.1:8000/api/product").then(response => {
                if (response.status == 200) {
                    this.products = response.data;
                }
            });
        },

        deleteProduct(id) {
            if (confirm("Are you sur want to delete this product")) {
                axios
                    .delete(`http://127.0.0.1:8000/api/product/${id}`)
                    .then(response => {
                        this.getProductData();
                    });
            }
        },
        show() {
            this.$modal.show("my-first-modal");
        },
        hide() {
            this.$modal.hide("my-first-modal");
        },
        addProduct() {
            axios
                .post("http://127.0.0.1:8000/api/product/add", {
                    name: this.$refs.name.value,
                    qte: this.$refs.qte.value,
                    price: this.$refs.price.value,
                    description: this.$refs.description.value,
                    image: this.$refs.image.value,
                    admin_id: this.$refs.admin_id.value,
                    category_id: this.$refs.category_id.value
                })
                .then(response => {
                    if (response.status == 201) {
                        this.products.push(response.data);
                        this.hide();
                        this.$refs.name.value = "";
                        this.$refs.qte.value = "";
                        this.$refs.price.value = "";
                        this.$refs.description.value = "";
                        this.$refs.image.value = "";
                        this.$refs.admin_id.value = "";
                        this.$refs.category_id.value = "";

                    }
                });
                
        },
    }
    
}
</script>