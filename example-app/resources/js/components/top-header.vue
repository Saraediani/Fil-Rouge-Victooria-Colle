<template>
    <div>
        <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <router-link class="navbar-brand" to="/">
            <img src="images/logoo.svg" alt="" />
            </router-link>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li :class="'nav-item '+homePage">
                <router-link class="nav-link" to="/">Home <span class="sr-only">(current)</span></router-link>
              </li>
              <li :class="'nav-item '+aboutPage">
                <router-link class="nav-link" to="/about"> About</router-link>
              </li>
              <li :class="'nav-item '+ShopPage">
                <router-link class="nav-link" to="/shop">Shop </router-link>
              </li>
              <li :class="'nav-item '+FurniturePage">
                <router-link class="nav-link" to="/furniture"> Furniture </router-link>
              </li>
              <li :class="'nav-item '+ContactPage">
                <router-link class="nav-link" to="/contact">Contact us</router-link>
              </li>
            </ul>
            <div class="user_option">
            <router-link to="/login">
                <img src="images/user.png" alt="">
                <span>
                  Login  
                </span>
              </router-link>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
          <div>
            <div class="custom_menu-btn ">
              <button>
                <span class=" s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
          </div>

        </nav>
      </div>
    </header>
    </div>
</template>

<style lang="css">
    
</style>
<script>
export default {
  data:()=>{
    return {
      homePage:'',
      aboutPage:'',
      ShopPage:'',
      FurniturePage:'',
      ContactPage:'',
    };
  },
  props:{
    active:String
  },
  mounted(){
    switch (this.active) {
      case 'home':
        this.homePage = "active"
        break;
      case 'about':
        this.aboutPage = "active"
        break;
      case 'shop':
        this.ShopPage = "active"
        break;
      case 'furniture':
        this.FurniturePage = "active"
        break;
      case 'contact':
        this.ContactPage = "active"
        break;
      }
    var nav = $("#navbarSupportedContent");
    var btn = $(".custom_menu-btn");
    btn.click
    btn.click(function (e) {

      e.preventDefault();
      nav.toggleClass("lg_nav-toggle");
      document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style")
    });
    }
}
</script>
