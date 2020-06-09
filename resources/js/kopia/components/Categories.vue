<template>
<div>
    <!-- <h1>Kategorie </h1> -->
    <!-- <p>{{this.joke}}</p> -->
    <!-- <div class="cat"> -->
        
        <ul class="cat">
            <li v-for="category in categories" :key="category.id" >
                <router-link :to="{ name:'category', params:{id:category.id} }">{{ category.name }}</router-link>
            </li>
        </ul>
    <!-- </div> -->
</div>
</template>
<script>

export default {
    
    data() {
        return {
            categories: null,
            joke: 'Jasiek',
        }
    },
    methods: {
        ss: function(a) {
            //alert('sss='+a)
            axios.get('/api/category/'+a)
            .then(function() {
                console.log(response.data);
                
            });
        }
    },

    mounted: function(){
        axios.get('http://localhost/api/category')
            .then(response => this.categories = response.data);
    },
}
</script>
// <style lang="scss" scoped>
// .cat {
//     background-color: #be9a9a;
// }
// </style>