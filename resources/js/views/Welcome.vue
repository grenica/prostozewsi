<template>
    <div>
        <h1>Strona startowa</h1>
        <!-- <router-link to="/about">O nas</router-link> -->
        <NewsMain />
        
    </div>
    
</template>

<script>

// import News from '../components/News.vue';
import NewsMain from '../components/NewsMain.vue';
export default {
    components: {
        // News,    
        NewsMain,
    },
    // data() {
    //     return {
    //         categories: null,
    //     }
    // },
    // methods: {
        
    // },
    // mounted: function(){
    //     axios.get('http://localhost/api/category')
    //         .then(response => this.categories = response.data);
    // },
}
</script>