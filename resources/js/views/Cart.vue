<template>
    <div class="cart">
        <h3><i class="icofont-cart"></i> Koszyk</h3>
        <ul>
            <li v-for="(product,index) in products" :key="index">
                <router-link :to="{ name:'product', params:{id:product.id} }">{{ product.name }}</router-link>
                <!-- <span>{{product.name}}</span>  -->
                <div><span class="strong">{{product.price }} zł</span> /{{product.unit}}</div>
                <AddCard :product="product" />
                <span @click="deleteItem(product)" class="removeItemCard"><i class="icofont-close"></i></span>
            </li>
        </ul>
        <div class="order_container">
            <div>Suma zakupów: <span>{{total}}</span>zł</div>
            <div class="order" @click="order2()">Zamawiam2</div>
        </div>
    </div>
</template>
<script>

import AddCard from '../components/AddCard.vue';
export default {
    components: {
        AddCard,       
    },
    computed: {
        products() {
            return this.$store.getters.cartProducts;
        },
        total() {
        return this.$store.getters.cartTotal;
        }
    },
    methods: {
        deleteItem(product) {
            this.$store.dispatch('removeItem',product);
        },
        // składam zamówienie
        order2() {
            this.$store.dispatch('order2');
        }
    }
    
}
</script>