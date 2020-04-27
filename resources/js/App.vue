<template>
    
    <div class="app_wrapper">
        <!-- <router-view name="l"></router-view> -->
       <Header />
       <!-- <router-link to="/">Home</router-link>
        <router-link to="/about">O nas</router-link> -->
        <!-- <h3>Hello world</h3> -->
        <!-- <a class="btn btn-danger" href="#">Czesc</a> -->
        <router-view></router-view>
        <Footer />
    </div>
   
</template>

<script>

import Vuex from 'vuex';
import axios from 'axios';
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';

export default {
    components: {
        Header,
        Footer
    },

    // mounted: function(){
    //     console.log('mouted w App');
    // },
    // created: function() {
    //     console.log('created w App');
    // }
    // created() {
    //     axios.defaults.headers.common["Authorization"] = "Bearer "+localStorage.getItem("token");
    //     this.$store.dispatch('getUser');
    // }
    
}
</script>
