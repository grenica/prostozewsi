<template>
<div class="cat">
    <!-- <h1>Kategorie </h1> -->
    <!-- <p>{{this.joke}}</p> -->
    <!-- <div class="cat"> -->
        
        <ul>
            <li v-for="category in categories" :key="category.id" >
                <!-- <router-link class="strong store_link" :to="{ name:'category', params:{id:category.id} }">{{ category.name }}</router-link> -->
                <router-link class="strong store_link" :to="{ name:'category', params:{name:category.name} }">{{ category.name }}</router-link>
            </li>
        </ul>
    <!-- </div> -->
</div>
</template>
<script>

export default {
    
    // data() {
    //     return {
    //         categories: null,
    //        // joke: 'Jasiek',
    //     }
    // },
    // methods: {
    //     ss: function(a) {
    //         //alert('sss='+a)
    //         axios.get('/api/category/'+a)
    //         .then(function() {
    //             console.log(response.data);
                
    //         });
    //     }
    // },
    created() {
        // console.log('CREATED');
        this.$store.dispatch('fetchCategories');
    },
    // mounted: function(){
    //     // console.log('MOUNTED');
    //     axios.get('/api/category')
    //         .then(response => this.categories = response.data);
    // },
    computed: {
        categories() {
            return this.$store.state.categories;
        },
    }
}
</script>
// <style lang="scss" scoped>
// .cat {
//     background-color: #be9a9a;
// }
// </style>