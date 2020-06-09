<template>
    <div class="filters_desktop">
        <h1>{{ paramURL }}</h1>
        <ul>
            <li v-for="(item,index) in categories" :key="item.index">{{ item.name }}</li>
        </ul>
    </div>
</template>
<script>
export default {
    props: ['paramURL'],
    
    computed: {
        categories() {
            return this.$store.state.filters;
        },
    }
}
</script>
<style lang="sass">

    .filters_desktop {
                h1 {
                    font-size: 1.4em;
                    font-weight: bold;
                }
                ul {
                    display: flex;
                    flex-direction: column;
                    li {
                        padding: 2% 0;
                    }
                }
            }

</style>