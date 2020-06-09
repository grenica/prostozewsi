<template>
    <div class="login_wrapper">
        <router-link class="store_link" v-if="!isLoggedIn" :to="{ name:'login2'}">
            <i class="icofont-user-alt-7"></i> <span>Loguj</span>
        </router-link>
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
        },
        isMobile() {
            if( screen.width <= 760 ) {
                    return true;
                }
                else {
                    return false;
                }
        },
    }
}
</script>