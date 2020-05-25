<template>
    <div class="login_wrapper">
        <router-link class="store_link" v-if="!isLoggedIn" :to="{ name:'login2'}">Loguj</router-link>
        <a href="#" class="store_link" v-if="isLoggedIn" @click="logout">Wyloguj</a>
    </div>
</template>
<script>
export default {
    
    computed: {
        currentUser() {
            return this.$store.state.user;
        },
        
        isLoggedIn() {
            return this.$store.getters.isLoggedIn;
        }
    },
    methods: {
        logout() {
            //z store.js wywołuje logout
            this.$store.dispatch('logoutuser');
        },
        jakiUser() {
            let u =  this.$store.state.user;
            console.log(u);
        }
    }
}
</script>