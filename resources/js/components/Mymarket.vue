<template>
    <div class="cat">
        
        <ul>
            <li v-for="category in categories" :key="category.id">{{ category.name }}</li>
        </ul>
    </div>
</template>
<script>

export default {
    
    data() {
        return {
            categories: [],
        }
    },

    mounted() {
        axios.get('/api/category')
            .then((response) =>{
                this.categories = response.data.data;
            });
    },
}
</script>
<style lang="scss" scoped>
.cat {
    background-color: #be9a9a;
}
</style>