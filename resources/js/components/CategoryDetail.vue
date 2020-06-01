<template>
    <div>
        <div v-if="loading" class="loading">
                Loading...
        </div>
        <div v-if="error" class="error">
            {{ error }}
        </div>

        <h2>detail</h2>
    <p> {{ $route.params.name }}</p>
        <div class="filter">
            <Filters />
        </div>

        <div class="prod">
                <div v-for="item in products" :key="item.id" class="item_pos">
                    <router-link :to="{ name:'product', params:{id:item.id}}">
                    <div v-for="item2 in item.images" :key="item2.id">
                        <img v-if="item2.isdefault" class="card_img" v-bind:src="'/storage/produkty/thumbnail/'+item2.image+'.webp'" /> 
                    </div>
                    </router-link>
                    <h2>{{ item.name }}</h2>
                    <p><span class="strong">{{ item.price }}</span> zł / </p>
                    <AddCard :product="item"/>
                </div>
        </div>
    </div>
    
</template>
<script>

import AddCard from '../components/AddCard.vue';
import Filters from '../components/Filters.vue';

export default {
     components: {
        AddCard,
        Filters,      
    },
    // created() {
    //     let param = this.$route.params.name;
    //     this.$store.dispatch('fetchProductsByCategory',param);
    // },
    data () {
        return {
        loading: false,
        post: null,
        error: null
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
            let param = this.$route.params.name;
            this.$store.dispatch('fetchProductsByCategory',param)
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