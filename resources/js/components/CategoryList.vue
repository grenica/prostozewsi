<template>
    <ul >
    <li v-for="category in categories" :key="category.id" >
        <router-link :to="{ name:'category', params:{id:category.id} }">{{ category.name }}</router-link>
    </li>
    </ul>
</template>

<script>
export default {
    data() {
       return {
            categories: null,
        }
    },
    mounted: function(){
        axios.get('http://localhost/api/category')
            .then(response => this.categories = response.data);
    }
}
</script>