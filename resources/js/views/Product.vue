<template>
    <div>
        <div class="product_container">
        <div class="product_info" v-if="product">
            <div v-if="product.images  && sortedProductImages.length > 1" class="product_images">
                    <!-- <div v-if="sortedProductImages.length > 1" class="product_images"> -->
                        <img v-for="(p,index) in sortedProductImages" :key="index" v-bind:src="'/storage/produkty/'+p.image" @mouseover="hover(index)" />
                    <!-- </div> -->
            </div>
            <!-- <div v-if="product.images"> -->
            <div  v-if="product.images" class="product_preview">
                <img v-for="(p,index) in sortedProductImages" :key="index" v-bind:src="'/storage/produkty/'+p.image" v-bind:class="{active: index === ActiveItem }" />
            </div>
                <!-- </div> -->
            <!-- <div class="image_container"> -->
                <!-- <img v-bind:src="'/storage/produkty/'+defaultImage" class="imageDefault" /> -->
                <!-- <div v-for="(prod,index) in product.images" :key="index" class="anotherImages"> -->
                    <!-- <img  v-if="prod.isdefault" v-bind:src="'/storage/produkty/'+prod.image" v-bind:class="{imageDefault :prod.isdefault }"/> -->
                    <!-- <img  v-if="!prod.isdefault" v-bind:src="'/storage/produkty/'+prod.image" class="imageDefault" /> -->
                    <!-- <div v-else class="product_images">
                        <img v-bind:src="'/storage/produkty/'+prod.image" />
                    </div> -->
                <!-- </div> -->
                <!-- <div v-if="nondefaultImage" class="product_images">
                    <img v-for="(p,index) in nondefaultImage" :key="index" v-bind:src="'/storage/produkty/'+p.image"/>
                </div> -->

                <!-- v-if="sortProductImages.length > 1" -->  
            <!-- </div> -->

            <div class="product_title">
                <router-link :to="{name:'welcome'}">{{ product.FarmerName}}</router-link>
                <h5 v-if="product">{{ product.name }}</h5>
                <div class="price_info">
                    <span>{{product.price}} zł</span>/{{ product.Unit }}
                </div>
                <AddCard :product="product"/>
            </div>
        </div>
        </div>
    </div>
</template>
<script>

import AddCard from '../components/AddCard.vue';
export default {
    components: {
        AddCard,       
    },

    data() {
       return {
            prodID: this.$route.params.id,
            ActiveItem: null
        }
    },
    //  mounted: function(){
    //      console.log('jestem w Products');
    //     axios.get('http://localhost/api/product/')
    //         .then(response => this.product = response.data);
    // }
    
    created: function() {
        //let param = this.$route.params.id;
        console.log("Product - fetchProduct"+ this.prodID);
        this.$store.dispatch('fetchProduct',this.prodID);
    },
    computed: {
        product() {
            //console.log('jest computed');
            return this.$store.getters.getProductId(this.prodID);
        },
        // defaultImage() {
        //     let wynik = '';
        //     let products = this.$store.getters.getProductId(this.prodID);
        //     // console.log(products.images);
        //     //szukam image z tablicy "images" gdzie jest default=1
        //     products.images.forEach(element => {
        //         if(element.isdefault) {
        //             console.log(element.image);
        //             wynik = element.image;
        //         }
        //     });
        //     return wynik;
        // },
        // nondefaultImage() {
        //     let products = this.$store.getters.getProductId(this.prodID);
            
        //     // const def = products.images.find(element => element.isdefault === 1 );
        //     // console.log('tablica obrazków:'+ JSON.stringify(products.images)  );
            
        //     // wszystkie elementy z tablicy products gdzie w obiekcie nie ma w polu default 1
        //     let arr = products.images.filter(item => item.isdefault !== 1);
        //     return arr;
        // },
        sortedProductImages() {
             //this.$store.dispatch('fetchProduct',this.prodID);

           let products = this.$store.getters.getProductId(this.prodID);
           // wszystkie elementy z tablicy products gdzie w obiekcie nie ma w polu default 1
            let arr = products.images.filter(item => item.isdefault !== 1); 
            // szukam elementu gdzie jest zaznaczony domyślny obraz (isdefault = 1)
            const def = products.images.find(element => element.isdefault === 1 );
            // dodaje znaleziony element na początku tablicy arr
            arr.unshift(def);
            console.log(arr);
            return arr;
        }
        
    },
    methods: {
        hover(index) {
            this.ActiveItem = index;
            console.log("hover: "+index);
        }
    }
}
</script>