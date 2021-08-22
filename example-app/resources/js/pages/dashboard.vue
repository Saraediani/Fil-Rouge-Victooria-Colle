<template>
    <div>
        <div class="app">
            <div class="header">
                <div class="row">
                    <div class="col">
                        <div class="icon">
                            <div class="logo" id="tour-logo">
                                <i class="fas fa-fire-alt"></i>
                                VICTOORIA COLLE
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="controls">
                            <button class="icon">
                                <i class="fas fa-envelope"></i>
                            </button>
                            <button class="icon">
                                <i class="fas fa-bell"></i>
                            </button>
                            <button class="user-profile" id="tour-user">
                                SARA EDIANI
                                <i class="fas fa-user-alt"></i>
                            </button>
                            <button @click="logout" class="user-profile text-danger">
                                Logout
                                <i class="fas fa-sign-out-alt ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="sidebar">
                    <ul class="sidebar-nav">
                        <li>
                            <button>
                                <span>Dashboard</span>
                                <i class="fas fa-home"></i>
                            </button>
                        </li>
                        <li>
                            <router-link to="/dashboard_emploie">
                                <button id="tour-elements">
                                    <span>Emploie</span>
                                    <i class="fas fa-users"></i>
                                </button>
                            </router-link>
                        </li>
                        <li>
                           <router-link to="/dashboard_product">
                            <button>
                                <span>products</span>
                                <i class="fas fa-shopping-bag"></i> 
                            </button>
                           </router-link>
                        </li>
                        <li>
                            <router-link to="/dashboard_category">
                            <button>
                                <span>category</span>
                                <i class="fas fa-car"></i>
                            </button>
                            </router-link>
                        </li>
                    </ul>
                </div>
                <div class="main">
                    <div class="main__content">
                        <h1 class="h1 title">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </h1>
                        <div class="dashcards">
                            <div class="col">
                                <div class="card">
                                    <img
                                        width="200"
                                        src="images/product-1.png"
                                    />
                                    <h2 class="card__title">Title</h2>
                                    <p class="card__extra">
                                        Simple Information
                                    </p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img
                                        width="200"
                                        src="images/product-1.png"
                                    />
                                    <h2 class="card__title">Title</h2>
                                    <p class="card__extra">
                                        Simple Information
                                    </p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img
                                        width="200"
                                        src="images/product-1.png"
                                    />
                                    <h2 class="card__title">Title</h2>
                                    <p class="card__extra">
                                        Simple Information
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="table-card">
                            <h2>Emploies</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>id</td>
                                        <td>name</td>
                                        <td>email</td>
                                        <td>password</td>
                                        <td>phone</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="emploie in emploies"
                                        :key="emploie.id"
                                    >
                                        <td>{{ emploie.id }}</td>
                                        <td>{{ emploie.name }}</td>
                                        <td>{{ emploie.email }}</td>
                                        <td>{{ emploie.password }}</td>
                                        <td>{{ emploie.phone }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        logout(){
            localStorage.removeItem('admin')
            localStorage.removeItem('token')
            this.$router.push('/login')
        }
    }
};
</script>
<style scoped>
/* 

 Tour Overlay Styles

*/

.tour-overlay {
    background: #666;
    opacity: 0.5;
    z-index: 9996;
    min-height: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}

.tour-stop {
    position: relative;
    z-index: 9998;
    outline: 10px solid white;
}

.tour-stop-bg {
    background: white;
    position: fixed;
    z-index: 9997;
}

.tour-message {
    position: fixed;
    z-index: 9997;
    top: 0;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 13px rgba(0, 0, 0, 0.26);
}

.tour-message .title {
    font-size: 1.75em;
    margin: 0;
    margin-bottom: 10px;
}

.tour-message__controls {
    font-size: 1.5em;
}

/* 

 Inconsequential Styles

*/

body {
    margin: 0;
}
.row {
    display: flex;
    flex: 1 1 0;
    align-items: center;
}
.col {
    flex: 1 1 0;
}

button {
    border: none;
    padding: 0;
    background: transparent;
    cursor: pointer;
    color: inherit;
}

.icon {
    padding: 20px;
}

.h1 {
    font-size: 2em;
    margin: 0;
    color: #0d6a31;
}

/* 

 App

*/

.app {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* 

 Header

*/

.header {
    background: #fff;
    flex: 0 0 40px;
    box-shadow: 0px 4px 10px #46de4130;
}

.logo {
    font-size: 1.25em;
    font-weight: bold;
    color: #0d6a31;
    display: inline-block;
}

.controls {
    display: flex;
    justify-content: flex-end;
    color: #b7b7b7;
}

.controls button:hover {
    color: #0d6a31;
}

.user-profile {
    padding: 0 20px;
    display: flex;
    align-items: center;
}

.user-profile img {
    width: 30px;
    height: 30px;
    border-radius: 100%;
    margin-left: 10px;
}

/* 

 Body

*/

.body {
    display: flex;
    flex: 1 1 auto;
}

/* 

 Sidebar

*/
.sidebar {
    flex: 0 0 20%;
}

.sidebar-nav {
    padding: 0;
    margin: 0;
    list-style: none;
}

.sidebar-nav button {
    display: flex;
    width: 100%;
    padding: 20px;
    text-align: left;
    color: #717171;
}

.sidebar-nav button:hover {
    color: #0d6a31;
}

.sidebar-nav button span {
    flex: 1 1 0;
}

.sidebar-nav button i {
    flex: 0 0 20px;
}

.sidebar-nav .cta {
    padding: 10px 20px;
}

button.primary {
    display: block;
    padding: 20px;
    background: #0d6a31;
    color: white;
    border-radius: 10px;
    text-align: center;
}

button.primary:hover {
    color: white;
    background: #0d6a31;
}

/* 

 Main View

*/

.main {
    flex: 0 0 80%;
    background: #eee;
}

.main__content {
    padding: 40px;
}

.title {
    margin-bottom: 1em;
}

.card {
    background: white;
    padding: 20px;
    color: #0d6a31;
    border-radius: 10px;
}

.card__subtitle {
    margin: 1em 0 1em 0;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.card__title {
    margin: 0;
    font-size: 2.5em;
    margin-bottom: 1em;
}

.card__extra {
    margin: 0;
}

.table-card {
    background: white;
    padding: 20px;
    border-radius: 5px;
}

.dashcards {
    margin-bottom: 40px;
    display: flex;
    margin-left: -10px;
    margin-right: -10px;
}

.dashcards .col {
    padding: 0 10px;
}

.table {
    width: 100%;
    border-spacing: 0;
}

.table td {
    padding: 20px 0;
}

.table thead td {
    font-weight: bold;
    border-bottom: 1px solid #999;
    border-top: 1px solid #999;
    color: #0d6a31;
}

.table tbody td {
    border-bottom: 1px solid #ccc;
    color: #777;
}
</style>
