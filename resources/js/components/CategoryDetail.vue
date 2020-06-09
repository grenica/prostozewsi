<template>
    <div class="category_wrapper">
        <div v-if="loading" class="loading">
                Loading...
        </div>
        <div v-if="error" class="error">
            {{ error }}
        </div>
        <h1 class="cat_name strong">{{ this.routeParam }}</h1>
        <div class="filtersMobile">
            <p>Filtruj</p>
        </div>
        <div class="filters">
            <Filterscategory :paramURL="routeParam"/>
        </div>
        <div class="sort">
            <p>Sortuj wg:</p>
            <!-- <ul>
                <li>Alfabetycznie</li>
                <li>od najnowyszych</li>
                <li>wg ceny</li>
            </ul> -->
        </div>
        <div class="prod">
                <div v-for="item in products" :key="item.id" class="item_pos">
                    <router-link :to="{ name:'product', params:{id:item.id}}">
                    <div v-for="item2 in item.images" :key="item2.id">
                        <img v-if="item2.isdefault" class="card_img" v-bind:src="'/storage/produkty/thumbnail/'+item2.image+'.webp'" /> 
                    </div>
                    </router-link>
                    <router-link :to="{ name:'product', params:{id:item.id}}" class="farmer_link">
                        <h3> {{ item.farmer.name }}</h3>
                    </router-link>
                    <router-link :to="{ name:'product', params:{id:item.id}}" class="product_link strong">
                        <h1> {{ item.name }}</h1>
                    </router-link>
                    
                    <p><span class="strong">{{ item.price }}</span> zł / </p>
                    <AddCard :product="item"/>
                </div>
        </div>
    </div>
    
</template>
<script>

import AddCard from '../components/AddCard.vue';
// import Filters from '../components/Filters.vue';
import Filterscategory from '../components/FiltersCategory';

export default {
     components: {
        AddCard,
        // Filters, 
        Filterscategory,  
    },
    // created() {
    //     let param = this.$route.params.name;
    //     this.$store.dispatch('fetchProductsByCategory',param);
    // },
    data () {
        return {
        loading: false,
        post: null,
        error: null,
        routeParam: null,
        }
    },
    created() {
        this.fetchData();
    },
    watch: {
        // call again the method if the route changes
        
        '$route': 'fetchData'
    },
    methods: {
       fetchData () {
        //    console.log('fetchData');
           this.error = this.post = null;
            this.loading = true;
            this.routeParam = this.$route.params.name;
            this.$store.dispatch('fetchProductsByCategory',this.routeParam)
            .then(() => {
                this.loading = false
                console.log('fetchData loading ....');
            })
                .catch(() => {
                    console.log('Brak danych !!!!!');
            });
       }
    },
    //  mounted() {
    //      console.log('CategoryDetaild mounted: '+ this.$route.params.name);
    //     let param = this.$route.params.name;
    //     this.$store.dispatch('fetchProductsByCategory',param);
    // },

    computed: {
        products() {
            return this.$store.state.products;
        },
    }
}
</script>