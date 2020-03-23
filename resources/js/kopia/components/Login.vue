<template>
    <div class="login_wrapper">
        <!-- <div v-if="isloged">Wyloguj</div> -->
        <!-- <div v-if="loged()">Wyloguj</div> -->
        <!-- <span v-if="islogedUser">wyloguj</span> -->
        <!-- <p>{{currentUser.name }}</p> -->
        <p @click="jakiUser"> User: {{ user1.name }}</p>
        <router-link :to="{ name:'login2'}">Loguj</router-link>
        <button @click="logout"> Wyloguj2</button>
        <!-- <a href="#">Loguj</a> -->
    </div>
</template>
<script>
export default {
    // data() {
    //     return {
    //         isloged: false,
    //     }
    // },
//    mounted: {
//        login: function(){
//            this.isloged = true;
//            return this.$store.state.user;
//        }
//    }
    // created() {
        
    //         axios.defaults.headers.common["Authorization"] = "Bearer "+localStorage.getItem("token");
    //         this.$store.dispatch('getUser');
  
    // },
    computed: {
        currentUser() {
            return this.$store.state.user;
        },
        // islogedUser() {
        //     var u = this.$store.state.user;
        //     console.log("islogedUser: "+Object.getOwnPropertyNames(u).length);
        //     if(Object.getOwnPropertyNames(u).length === 1 ) {
        //         return false;
        //     } else {
        //         return true;
        //     }
        // }
        isLoggedIn() {
            //return this.$store.state.user;
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