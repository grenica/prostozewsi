<template>
    <div class="article-list">
       <!-- <h3>Nowości <span class="badge badge-secondary">New</span></h3> -->
        <div v-for="item in products" v-bind:key="item.id" class="item_pos">
            <router-link :to="{ name:'product', params:{id:item.id}}" >
                <!-- <div v-for="img in item.images" v-bind:key="img.id">
                    <img v-if="img.isdefault" v-bind:src="'/storage/produkty/'+ img.image" />
                </div> -->
               <img class="card_img" v-bind:src="'/storage/produkty/'+ item.image+'.webp'" /> 
            </router-link>
            <p class="farmer">{{ item.FarmerName }}</p>
            
            <div class="price_block">
               <span class="strong">{{ item.price}} zł </span>/{{ item.Unit}}
            </div>
            <!-- <div class="add-card" @click="addProductToCart(item)"><i class="icofont-cart"></i>Dodaj do koszyka</div> -->
            <AddCard :product="item"/>
        </div>
    </div>
    
    
</template>

<script>
// import Cookies from "js-cookie"; 

import AddCard from '../components/AddCard.vue';
export default {
    components: {
        AddCard,       
    },
    // data() {
    //    return {
    //         news: null,
    //         marketID: null,
    //     }
    // },
    // created: function() {
    //     let cookie = Cookies.get('market');
    //     this.marketID = JSON.parse(cookie).id;
    //     console.log(this.marketID);
    // },
    // mounted: function(){
    //    axios.get('/api/news/'+this.marketID)
    //    .then(
    //        response => {this.news = response.data }
    //    ); 
        // axios.get('/api/news',{params: this.cookie})
        //     .then(response => this.news = response.data);
    //},
    created() {
        // let cookie = Cookies.get('market');
        // this.marketID = JSON.parse(cookie).id;
        // axios.get('/api/news/'+this.marketID)
        // .then(
        //     response => {
        //         //this.news = response.data;
        //         store.commit('setProductsNews',response.data);
        //     }
        // ); 
        this.$store.dispatch('fetchProductsNews');
    },
    computed: {
        products() {
            //return this.$store.state.productsNew;
            return this.$store.state.products;
        }
    },
    methods: {
        addProductToCart(product) {
            this.$store.dispatch('addToCart',product);
        }
    }
    
}
</script>