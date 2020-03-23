import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import router from './router';
import Cookies from "js-cookie"; 

Vue.use(Vuex);

export default new Vuex.Store({
    state: {   // = data
        user:{},
        token: localStorage.getItem('token') || null,
       // isLoggedIn: false,
       products: [],
       productsNew: [],
       card: []
    },
    getters: {   // = computed properties
        isLoggedIn(state) {
            return state.token !== null;
        },
        productsCount() {

        }
    },
    mutations: {
        setUser(state,data) {
            state.user = data;
        },
        setToken(state,token) {
            state.token = token;
            localStorage.setItem("token",token);
        },
        setProducts(state,products) {
            state.products = products;
        },
        setProductsNews(state,products) {
            state.productsNew=products;
        }
    },
    actions: {  // = methods
        getUser({commit}) {
            axios.get('/api/current')
            .then(response => {
                commit('setUser',response.data );
            });
        },
        loginus({commit},user) {
            commit('setUser',user);
           // this.$router.push({ name: 'category', params: { id: '1' } });
        },
        loginuser({commit},user) {
            axios.post('/api/login_store',{
                email: user.email,
                password: user.password,
            })
            .then((response) =>{
                console.log(response.data);
                   if(response.data.access_token) {
                       //console.log(response.data.user);
                       //zapisz do store
                       commit('setUser',response.data.user);
                       
                       // zapisz token
                    //     localStorage.setItem("token",response.data.access_token);
                    commit('setToken',response.data.access_token);
                      // window.location.replace("/");
                      router.push('/');
                   }
                   if(response.data.message) {
                       alert(response.data.message);
                   }
                })
                .catch(function (error) {
                    console.log(error);
                   
                });
        },
        logoutuser() {
            // remove token
            localStorage.removeItem("token");
            // window.location.replace("#/login2");
           // window.location.replace("/");
        },
        fetchProductsNews({commit}) {
            let cookie = Cookies.get('market');
            let marketID = JSON.parse(cookie).id;
            axios.get('/api/news/'+marketID)
            .then(
                response => {
                    commit('setProductsNews',response.data);
                }
            ); 
        }

    }
});