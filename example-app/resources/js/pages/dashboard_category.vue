<template>
    <div>
        <div>
        <modal name="my-first-modal" height="80%">
            <form style="padding: 20px" @submit.prevent='addCategory'>
                <div @click="hide()" class="col text-right" >
                    <span class="btn"
                        ><i class="fas fa-sign-out-alt text-light py-2"></i
                    ></span>
                </div>
                     <div class="mb-3">
                    <label for="exampleInputName" class="form-label"
                        >Name:</label
                    >
                    <input
                    ref="name"
                        type="text"
                        class="form-control"
                        id="exampleInputName"
                    />

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
                    <label for="state" class="form-label"
                        >State:</label
                    >
                    <input
                    ref="state"
                        type="text"
                        class="form-control"
                        id="state"
                    />
                </div>
                     </div>
                <button type="submit" style="  background-color:#0D6A31; color:white;"  class= "btn ">Ajouter</button>
            </form>
        </modal>
        <main class="content" style="background-color:#FFFBF2;">
             <div class="col text-left">
            <router-link
               to="dashboard"
                class="btn btn-lg text-white  "
                style="margin-top: 25px; background-color:#0D6A31;"
                ><i class="fas fa-home text-white "></i> Dashboard</router-link
            >
        </div>
            <section class="title">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-left py-3">
                            <h2 class="display-4" style="  color:#0D6A31;">
                                category:
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
                                <th scope="col">image</th>
                                 <th scope="col">state</th>
                                <th scope="col">actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="category in categorys" :key="category.id">
                                <th scope="row">
                                    {{ category.id }}
                                </th>
                                <td>{{ category.name }}</td>
                                <td>{{ category.image }}</td>
                                <td>{{ category.state }}</td>
                            
                                
                                <td class="d-flex">
                                    <button class="btn btn-success btn-sm mx-1">
                                        <i class="fas fa-pen text-white"></i>
                                    </button>
                                    <button
                                        @click="deleteCategory(category.id)"
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
           categorys:[]
        };
    },
    created() {
        this.getCategoryData();
    },
    methods: {
        getCategoryData() {
            axios.get("http://127.0.0.1:8000/api/category/p").then(response => {
                if (response.status == 200) {
                    this.categorys = response.data;
                }
            });
        },

        deleteCategory(id) {
            if (confirm("Are you sur want to delete this category")) {
                axios
                    .delete(`http://127.0.0.1:8000/api/category/${id}`)
                    .then(response => {
                        this.getCategoryData();
                    });
            }
        },
        show() {
            this.$modal.show("my-first-modal");
        },
        hide() {
            this.$modal.hide("my-first-modal");
        },
        addCategory() {
            axios
                .post("http://127.0.0.1:8000/api/category/add", {
                    name: this.$refs.name.value,
                    image: this.$refs.image.value,                                    
                })
                .then(response => {
                    if (response.status == 201) {
                        this.categorys.push(response.data);
                        // console.log(response.data);
                        this.hide();
                        this.$refs.name.value = "";
                        this.$refs.image.value = "";
                        this.$refs.state.value = "";
                    }
                });
                
        },
    }
    
}
</script>