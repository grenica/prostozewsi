<template>
    <div class="cart_header">
        <!-- <a href="#">
            <i class="icofont-cart"></i>
            <span>{{cartCount}}</span>
        </a> -->
        <router-link :to="{ name:'cart'}">
            <i class="icofont-cart"></i>
            <span>{{cartCount}}</span>
        </router-link>
    </div>
</template>
<script>
export default {
    computed: {
        cartCount() {
            let cc = this.$store.getters.cartCount;
            console.log(cc);
            return cc;
        }
    }
}
</script>