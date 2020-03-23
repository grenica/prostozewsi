<template>
    <div class="article-list">
       <!-- <h3>Nowości <span class="badge badge-secondary">New</span></h3> -->
        <div v-for="item in products" v-bind:key="item.id" class="item-pos">
            <img v-bind:src="'/storage/produkty/'+ item.image" />
            <p class="farmer">{{ item.FarmerName }}</p>
            <div class="price_block">
               <span>{{ item.price}} zł </span>/{{ item.Unit}}
            </div>
            <a href="#" class="add-card"><i class="icofont-cart"></i>Dodaj do koszyka</a>
        </div>
    </div>
    
    
</template>

<script>
// import Cookies from "js-cookie"; 


export default {
    data() {
       return {
            news: null,
            marketID: null,
        }
    },
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
            return this.$store.state.productsNew;
        }
    }
}
</script>