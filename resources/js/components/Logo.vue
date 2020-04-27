<template>
    <div class="logo_wrapper">
        <router-link :to="{name: 'welcome'}">Home</router-link>
        <Search />
        <Login />
        <CardHeader />
    </div>
    
</template>
<script>
import Search from '../components/Search.vue';
import Login from '../components/Login.vue';
import CardHeader from '../components/CardHeader.vue';

export default {
    components: {
    Search,
    Login,
    CardHeader,    
   },
}
</script>