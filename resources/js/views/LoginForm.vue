<template>
    <div class="loginform1">
        <!-- <form @submit.prevent="submitedform" id="loginform"> -->
        <div id="loginform">
            <!-- <p v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <ul>
                <li v-for="error in errors">{{ error }}</li>
                </ul>
            </p> -->

            <input type="text" name="email" v-model="user.email"/>
            <input type="password" name="password" v-model="user.password" />
              <!-- <input type="submit" value="Submit" > -->
            <button @click="login">Loguj</button>
        </div>
        <a href="/login">Loguj jako rolnik</a>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: {
                email: "",
                password: "",
            }, 
            zalogowany:null
        }
    },
    methods: {
        // login: function() {
        //     axios.post('/api/login_store2',{
        //         email: this.email,
        //         password: this.password,
        //     })
        //     .then((response) =>{
        //        console.log(response.data.data);
        //     })
        //     .catch(function (error) {
        //         console.log(error);
               
        //     });
        // },
        login() {
            //wywołuje akcje loginuser z store.js
            this.$store.dispatch('loginuser',this.user);
            //this.$store.dispatch('loginus',this.user);
        }
        
    }
    
}
</script>