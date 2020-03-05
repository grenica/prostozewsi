<template>
    
    <main>
       <Header />
       <!-- <router-link to="/">Home</router-link>
        <router-link to="/about">O nas</router-link> -->
        <!-- <h3>Hello world</h3> -->
        <!-- <a class="btn btn-danger" href="#">Czesc</a> -->
        
        <router-view></router-view>
        
    </main>
   
</template>

<script>

import Vuex from 'vuex';
import Header from './components/Header.vue';
// import Footer from './components/Footer.vue';

export default {
    components: {
        Header,
     //   Footer
    },

    // mounted: function(){
    //     console.log('mouted w App');
    // },
    // created: function() {
    //     console.log('created w App');
    // }
    
}
</script>
