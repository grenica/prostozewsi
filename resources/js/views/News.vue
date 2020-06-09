<template>
    <div class="category_wrapper">
        <!-- <h1>Tu nowości</h1> -->
        <div class="filters">
            <Filters />
        </div>
        <div>
            <ul>
                <li v-for="item in categories" :key="item.id">
                    <label>
                        <input type="checkbox" name="feat_input[]" id="">
                        {{item.name }} 
                    </label>
                    <span> {{item.count}}</span>
                </li>
            </ul>
            <hr/>
            <ul>
                <li v-for="item in features" :key="item.id" class="features_filter">
                    <label>
                        <input type="checkbox" name="feat_input[]" id="">
                        {{item.name }} 
                    </label>
                    <span> {{item.count}}</span>
                </li>
            </ul>
        </div>
        <!-- <div class="filters">
            <ul>
                <li v-for="item in categories" :key="item" class="category_filter">
                    <div>
                        <label>
                            <input type="checkbox" name="cat_input[]" id="">
                            {{ item.name }}
                        </label>
                        <span>{{ item.count }}</span>
                    </div>
                </li>
            </ul>
        </div> -->
        <div v-for="item in products" v-bind:key="item.id" class="item_pos">
            <router-link :to="{ name:'product', params:{id:item.id}}">
                 <div v-for="item2 in item.images" :key="item2.id">
                      <img v-if="item2.isdefault" class="card_img" v-bind:src="'/storage/produkty/thumbnail/'+item2.image+'.webp'" /> 
                 </div>
             </router-link>
             <!-- <p>{{ item.farmer.name }}</p> -->
             <h2>{{ item.name }}</h2>
             <p><span class="strong">{{ item.price }}</span> zł / </p>
             <!-- {{ item }} -->
            <AddCard :product="item"/>
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
    created() {
        this.$store.dispatch('fetchProductsNewsAll');
    },
    computed: {
        products() {
            return this.$store.state.products;
        },
        products_old() {
            //  return this.$store.state.products;

            // zmieniam obiekt w tablice []
            //let ls = Object.entries(this.$store.state.products) ;
            //usuwam ostatnie dwa elementy z tablicy products
            let ls = this.$store.state.products;
            const wynik = ls.slice(0,-2);

            // console.log(wynik);
            // wynik spowrotem zamieniam z tablicy na obiekt
            //const w = Object.fromEntries(wynik);

            // console.log(w);
            return wynik;
        },
        categories() {
            let ls2 = this.$store.state.products.category_list;
            // const wynik2 = ls2.slice(-1);
            // const w = Object.fromEntries(wynik);
            // console.log('cat: '+wynik2);
            // const last =ls2.pop(); category_list
            // console.log(last)
            return ls2;
        },
        features() {
            return this.$store.state.products.features_list;
        },
        // findDefault(obj) {
        //     //let lista = Object.entries(obj);
        //     // let obj2 = lista.filter(ob => {
        //     //     return ob.isdefault = 1;
        //     // });
        //     // let lista = Object.values(obj);//.filter(v => v.isdefault === 1);
        //     // console.log(lista);
        //     return obj;
        // }
       
    },
    methods: {
        addProductToCart(product) {
            this.$store.dispatch('addToCart',product);
        }
    }
}
</script>

        // <ul>
        //     <li v-for="item in products.category_list" :key="item.name" class="category_filter">
            
        //         <div>
        //             <label>
        //                 <input type="checkbox" name="cat_input[]" id="">
        //                 {{ item.name }}
        //             </label>
        //             <span>{{ item.count }}</span>
        //         </div>
        //     </li>
        // </ul>
        // <hr>
        // <ul>
        //     <li v-for="item in products.features_list" :key="item.name" class="features_filter">
                
        //         <label>
        //             <input type="checkbox" name="feat_input[]" id="">
        //             {{item.name }} 
        //         </label>
        //         <span> {{item.count}}</span>
        //     </li>
        // </ul>
        // <div v-for="item in products" v-bind:key="item.id" class="item_pos">
        //     <router-link :to="{ name:'product', params:{id:item.id}}">
        //         <div v-for="item2 in item.images" :key="item2.id">
        //              <img v-if="item2.isdefault" class="card_img" v-bind:src="'/storage/produkty/thumbnail/'+item2.image+'.webp'" /> 
        //         </div>
        //     </router-link>
        //     <div v-for="(item4,name) in item.farmer" :key="item4">
        //         <p v-if="name=='name'"> {{ item4 }}</p>
        //     </div>
            
        //     <h2>{{ item.name }}</h2>
        //     <div v-for="(item3,name) in item.unit" :key="item3">
        //        <span v-if="name =='name'">{{ item3 }}</span>
        //     </div>
        //     <!-- <div class="add-card" @click="addProductToCart(item)"><i class="icofont-cart"></i>Dodaj do koszyka</div> -->
        //     <AddCard :product="item"/>
        // </div>