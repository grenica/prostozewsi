<template>
    <div>
        <h5>Filter TODO</h5>
        <ul>
            <li v-for="item in filters" :key="item.cat_name"> 
                <label> <input type="checkbox" name="cat_filter" id="">
                {{ item.cat_name }}</label>
                <span> {{ item.count }}</span>
                </li>
        </ul>
    </div>
</template>
<script>
export default {
    // props:['typ'],

    created() {
        this.$store.dispatch('fetchFilter');
    },
    computed: {
        filters() {
            return this.$store.state.filters;
        }
    },
}
</script>