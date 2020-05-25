<template>
    <div>
        <h1>Tu nowości</h1>
        <ul>
            <li v-for="item in products.features_list" :key="item.name">
                <span>{{item.name }} ( {{item.count}} )</span>
            </li>
        </ul>
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
        this.$store.dispatch('fetchProductsNewsAll');
    },
    computed: {
        products() {
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