<template>
    <div class="logo_wrapper">
        
        <router-link :to="{name: 'welcome'}"> 
             
        Prosto ze wsi</router-link>
        <Search />
        <Login />
        <CardHeader />
        <!-- <Hamburger /> -->
        <MobileMenu />
        <!-- <Categories /> -->
    </div>
    
</template>
<script>
import Search from '../components/Search.vue';
import Login from '../components/Login.vue';
import CardHeader from '../components/CardHeader.vue';
// import Hamburger from '../components/Hamburger';
import MobileMenu from '../components/MobileMenu';
// import Categories from './Categories.vue';

export default {
    components: {
    Search,
    Login,
    CardHeader,
    // Hamburger,
    MobileMenu,
    // Categories,
   },
}
</script>