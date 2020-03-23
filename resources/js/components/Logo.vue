<template>
    <div class="logo_wrapper">
        <p>Logo</p>
        <Search />
        <Login />
        <Card />
    </div>
    
</template>
<script>
import Search from '../components/Search.vue';
import Login from '../components/Login.vue';
import Card from '../components/Card.vue';

export default {
    components: {
    Search,
    Login,
    Card,    
   },
}
</script>