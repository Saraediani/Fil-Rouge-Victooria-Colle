<template>
    <div>
        <!-- trending section -->

  <section class="trending_section layout_padding">
    <div id="accordion">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
                  Trending Categories
                </h2>
              </div>
              <div class="tab_container">
                <div v-for="category,key in categories" :key=key class="t-link-box" data-toggle="collapse" :data-target="'#collapse'+category.id" :aria-expanded="(key == 0)?true:flase"
                  :aria-controls="'collapseOne'+category.id">
                  <div class="number">
                    <h5>
                      0{{ category.id }}
                    </h5>
                  </div>
                  <hr>
                  <div class="t-name">
                    <h5>
                      {{ category.name }}
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div v-for="category,index in categories" :key=index class="collapse" :class="(index == 0)?'show':''" :id="'collapse'+category.id" :aria-labelledby="'heading'+category.id" data-parent="#accordion">
              <div class="img_container ">
                <div class="box b-1">
                  <div class="img-box">
                    <div class="custom-position">
                    </div>
                    <img v-if="category.product[0]" :src=category.product[0].image :alt=category.product[0].name />
                  </div>
                  <div class="img-box">
                    <img v-if="category.product[1]" :src=category.product[1].image :alt=category.product[1].name />
                  </div>
                </div>
                <div class="box b-2">
                  <div class="img-box">
                    <img v-if="category.product[2]" :src=category.product[2].image :alt=category.product[2].name />
                  </div>
                  <div class="img-box">
                    <img v-if="category.product[3]" :src=category.product[3].image :alt=category.product[3].name />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>


        
    </div>
</template>
<script>


export default {
    data:()=>{
    return {
      products:[],
      categories:[]
    }
  },
  created(){
    this.getProducts()
    this.getCaregories()
  },
  methods:{
    getProducts(){
      axios.get('http://127.0.0.1:8000/api/product').then(response=>{
        if(response.status == 200){
          this.products = response.data
        }
      })
    },
    getCaregories(){
      axios.get('http://127.0.0.1:8000/api/category/p').then(response=>{
        if(response.status == 200){
          this.categories = response.data
        }
      })
    }
  }
}
</script>