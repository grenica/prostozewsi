<template>
    <div>
        <h1>Strona startowa</h1>
        <!-- <router-link to="/about">O nas</router-link> -->
        <News />
        <!-- <passport-authorized-clients></passport-authorized-clients> -->
    </div>
    
</template>

<script>
// import CategoryList from '../components/CategoryList.vue'
import News from '../components/News.vue';
export default {
    components: {
        News,       
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