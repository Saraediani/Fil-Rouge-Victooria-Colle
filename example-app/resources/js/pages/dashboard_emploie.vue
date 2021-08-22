<template>
    <div>
        <modal name="my-first-modal" height="60%">
            <form style="padding: 20px" @submit.prevent="addEmploie">
                <div @click="hide()" class="col text-right">
                    <span class="btn"
                        ><i class="fas fa-times-circle text-light py-2"></i
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
                        id="name"
                    />
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"
                            >Email:</label
                        >
                        <input
                            ref="email"
                            type="email"
                            class="form-control"
                            id="email"
                        />
                    </div>
                    <label for="exampleInputEmail1" class="form-label"
                        >Password:</label
                    >
                    <input
                        ref="password"
                        type="password"
                        class="form-control"
                        id="password"
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"
                        >Phone:</label
                    >
                    <input
                        ref="phone"
                        type="text"
                        class="form-control"
                        id="phone"
                    />
                </div>

                <button
                    type="submit"
                    style="  background-color:#0D6A31;"
                    class="btn text-white "
                >
                    Ajouter
                </button>
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
                                Emploie
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
                                <th scope="col">email</th>
                                <th scope="col">password</th>
                                <th scope="col">phone</th>
                                <th scope="col">actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="emploie in emploies" :key="emploie.id">
                                <th scope="row">
                                    {{ emploie.id }}
                                </th>
                                <td>{{ emploie.name }}</td>
                                <td>{{ emploie.email }}</td>
                                <td>{{ emploie.password }}</td>
                                <td>{{ emploie.phone }}</td>
                                <td class="d-flex">
                                    <button
                                        class="btn btn-success btn-sm mx-1"
                                    >
                                        <i class="fas fa-pen text-white"></i>
                                    </button>
                                    <button
                                        @click="deleteEmploie(emploie.id)"
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
</template>
<script>
import axios from "axios";

export default {
    data: () => {
        return {
            emploies: []
        };
    },
    created() {
        this.getEmploieData();
    },
    methods: {
        getEmploieData() {
            axios.get("http://127.0.0.1:8000/api/emploie").then(response => {
                if (response.status == 200) {
                    this.emploies = response.data;
                }
            });
        },

        deleteEmploie(id) {
            if (confirm("Are you sur want to delete this emploie")) {
                axios
                    .delete(`http://127.0.0.1:8000/api/emploie/${id}`)
                    .then(response => {
                        this.getEmploieData();
                    });
            }
        },
        show() {
            this.$modal.show("my-first-modal");
        },
        hide() {
            this.$modal.hide("my-first-modal");
        },
        addEmploie() {
            axios
                .post("http://127.0.0.1:8000/api/emploie/add", {
                    name: this.$refs.name.value,
                    email: this.$refs.email.value,
                    password: this.$refs.password.value,
                    phone: this.$refs.phone.value
                })
                .then(response => {
                    if (response.status == 201) {
                        this.emploies.push(response.data);
                        this.hide();
                        this.$refs.name.value = "";
                        this.$refs.email.value = "";
                        this.$refs.password.value = "";
                        this.$refs.phone.value = "";
                    }
                });
        },
        // editEmploie() {
        //     this.show();
        //     console.log(document.getElementById("name").value);
        //     document.getElementById("name").value = emploie.name;
        //     this.$refs.email.value = emploie.email;
        //     this.$refs.password.value = emploie.password;
        //     this.$refs.phone.value = emploie.phone;
        //     console.log(emploie);
        // }
    }
};
</script>
<style scoped>
/* .modal {
    position: absolute;
    top: 10px;
    left: 10px;
    height: 100px;
    width: 100px;
    
} */
</style>
