<template>
    <div class="addtoCard">
        <div v-if="getproductCard == 0" class="card_button" @click="addProductToCart(product)">
            <i class="icofont-cart"></i>Dodaj do koszyka</div>
        <div v-else class="counterItemCard"> 
            <div class="card_button_icon" @click="removeProductItem(product)"><i class="icofont-ui-remove"></i></div>
            <span class="cardCount">{{ getproductCard }}</span>
            <div class="card_button_icon" @click="addProductToCart(product)"><i class="icofont-ui-add"></i></div>
            <!-- <h2>{{ product.id }}</h2> -->
        </div>
    </div>
</template>
<script>
export default {
    props: ['product'],

    // data() {
    //     return {
          
    //         card:{},
    //     }
    // },
    computed: {
        getproductCard() {
            let count = 0;
            // console.log('Add Card' + this.product.id);
            // szukam w state.cart czy mam już towar w koszyku, towar przekazany przez props
            let prod = this.$store.state.cart.find(item => item.id === this.product.id);
            if(prod) {
                //console.log('Mam towar w koszyku');
                count = prod.quantity;
            }
            // } else {
            //     console.log('Nie mam go w koszyku');
                
            // }
            return count;
            // console.log('w koszyku mam: '+prod.quantity);
        //    return this.$store.getters.getProductCard(this.product.id);
        }
    },
     methods: {
        addProductToCart(product) {
            this.$store.dispatch('addToCart',product);
        },
        removeProductItem(product) {
            this.$store.dispatch('decrementProductItem',product);
        }
    }
}
</script>
<style lang="sass" scoped>
    
</style>