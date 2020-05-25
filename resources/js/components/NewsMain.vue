<template>
    <div class="article-list">
        <div class="main_category_title">
            <h3>Nowości 
                <!-- <span class="badge badge-secondary">New</span> -->
                </h3>
            <router-link :to="{name: 'news'}">Wiecej nowości</router-link>
        </div>
        <div v-for="item in products" v-bind:key="item.id" class="item_pos">
            <router-link :to="{ name:'product', params:{id:item.id}}" >
                <!-- <div v-for="img in item.images" v-bind:key="img.id">
                    <img v-if="img.isdefault" v-bind:src="'/storage/produkty/'+ img.image" />
                </div> -->
               <img class="card_img" v-bind:src="'/storage/produkty/'+ item.image+'.webp'" /> 
            </router-link>
            <p class="farmer">{{ item.FarmerName }}</p>
            <h2>{{ item.name }}</h2>
            <div class="price_block">
               <span class="strong">{{ item.price}} zł </span>/{{ item.Unit}}
            </div>
            <!-- <div class="add-card" @click="addProductToCart(item)"><i class="icofont-cart"></i>Dodaj do koszyka</div> -->
            <AddCard :product="item"/>
        </div>
    </div>
    
    
</template>
<script>

import AddCard from '../components/AddCard.vue';
export default {
    components: {
        AddCard,       
    },
    
    created() {
         
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