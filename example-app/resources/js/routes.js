import home from './pages/home.vue'
import about from './pages/about.vue'
import contact from './pages/contact.vue'
import furniture from './pages/furniture.vue'
import shop from './pages/shop.vue'
import login from './pages/login.vue'
import product from './pages/product.vue'
import panier from './pages/panier.vue'
import dashboard from './pages/dashboard.vue'
import dashboard_emploie from './pages/dashboard_emploie.vue'
import dashboard_product from './pages/dashboard_product.vue'
import dashboard_category from './pages/dashboard_category.vue'

// middleware 
import AuthMiddleware from  './middlewares/auth'
const routes = [
    { path : '/' ,component : home },
    { path : '/about' ,component : about },
    { path : '/contact' ,component : contact },
    { path : '/furniture' ,component : furniture },
    { path : '/shop' ,component : shop },
    { path : '/login' ,component : login },
    { path : '/product/:id' ,component : product , props : true },
    {path : '/panier',component : panier},
    {path:'/dashboard',component:dashboard,beforeEnter: (to, from, next) => {AuthMiddleware({to,from,next})}},
    {path:'/dashboard_emploie',component:dashboard_emploie,beforeEnter: (to, from, next) => {AuthMiddleware({to,from,next})}},
    {path:'/dashboard_product',component:dashboard_product,beforeEnter: (to, from, next) => {AuthMiddleware({to,from,next})}},
    {path:'/dashboard_category',component:dashboard_category,beforeEnter: (to, from, next) => {AuthMiddleware({to,from,next})}}


]

export default routes