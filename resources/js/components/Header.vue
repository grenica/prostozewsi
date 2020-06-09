<template>
    <div class="store_header">
        <div class="notification">
            Wybramy rynek =. Cookie = {{ marketObj.name }}
        </div>
        <Logo />
       <Categories />
        
        <!-- <a href="#" class="btn btn-primary" @click="testuj()">CLICK</a> -->
    </div>
   
</template>

<script>
import Vue from 'vue';
import Categories from './Categories.vue';
import Logo from '../components/Logo.vue';


import Cookies from "js-cookie";
// import VueCookies from 'vue-cookies';
// Vue.use(VueCookies);
// Vue.use(require('vue-cookies'));

export default {
   components: {
    Logo,
    Categories,
        
   },
//    mounted: function() {
//        console.log('mouted');
//    },
data() {
    return {
        marketObj:{},
        test:'Grzegorz'
    }
},
   methods: {
       testuj(){
           alert('testuj !!!!')
       }
   },
   created: function() {
        //Cookies.set("greno","Rynek w lubenii",{expires: 20 });
        //var c = Cookies.get('greno');
        let c2 = Cookies.get('market');
        let zm = JSON.parse(c2);
        this.marketObj = zm;
       // console.log(zm);
   }
    
}
</script>