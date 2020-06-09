import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import router from './router';
import Cookies from "js-cookie"; 

Vue.use(Vuex);

// export default new Vuex.Store({
export const store =  new Vuex.Store({
    state: {   // = data
        // user:{},
        user:localStorage.getItem('user') || null,
        token: localStorage.getItem('token') || null,
       // isLoggedIn: false,
    //    market: {},
       marketID: null,
       marketslug: null,
       products: [],
    //    productsNew: [],
       cart: [],
       filters: [],
       categories:[],
       meta: {},
    },
    getters: {   // = computed properties
        isLoggedIn(state) {
            return state.token !== null;
        },
        // cartCount(state) {
        //     return state.cart.length;
        // },
        getProductId: (state) => (id) => {
            const prodId =  state.products.find(item => item.id === id);
             //console.log('jest getters getProductId :'+prodId);
            return prodId;
        },
        getProductCard: (state) => (id) => {
            const product =  state.cart.find(item => item.id === id);
             //console.log('jest getters getProductId :'+prodId);
            return product;
        },
        cartProducts(state) {
            return state.cart.map(cartItem => {
                const product = state.products.find(item => item.id === cartItem.id)
                return {
                    id: cartItem.id,
                    name: product.name,
                    price: product.price,
                    quantity: cartItem.quantity,
                    unit: product.Unit
                }
            })
        },
        cartTotal(state,getters) {
            //console.log("jest Total");
            let total = 0;
            getters.cartProducts.forEach(item => {
                total += item.price * item.quantity;
            });
            return total;
        }
        // getProduct: (state) => (productId) {
        //     const prodId = state.products.find(item => item.id === productId);
        //     //console.log('getProduct '+productId.id);
        //     // if(prodId) {
        //     //     console.log('jest już w store');
        //     // } else {
        //     //     console.log('nie na w store');
        //     // }
        //     return prodId;
        // }

    },
    mutations: {
        setUser(state,data) {
            state.user = data;
            // zapisuje do web storage
            localStorage.setItem("user",data);
        },
        setToken(state,token) {
            state.token = token;
            localStorage.setItem("token",token);
        },
        setProducts(state,products) {
            state.products = products;
        },
        setMeta(state,meta) {
            state.meta = meta;
        },
        setCategories(state,cat) {
            state.categories = cat;
        },
        setFilter(state,filters) {
            state.filters = filters;
        },
        setProductsNews(state,products) {
            state.productsNew=products;
        },
        updateProduct(state,product) {
            const productItem = this.state.products.find(item => item.id === product.id);
           //usuwam znalezniony element, pobieram pełne dane z API
           this.state.products.splice(this.state.products.indexOf(productItem),1);
            state.products.push({
                FarmerName: product.FarmerName,
                FarmerId: product.FarmerId,
                id: product.id,
                images: product.images,
                Unit: product.Unit,
                name: product.name,
                price: product.price,
                desc: product.desc
            });
        },
        // const cartItem ={id: 1234, quantity =1 }
        pushProductToCart(state,productId) {
            state.cart.push({
                id: productId,
                quantity: 1
            });
        },
        
        incrementItemQuantity(state,cartItem) {
            //cartItem.quantity++;
           let myItem = state.cart.find(item => item.id === cartItem.id);
           myItem.quantity++;
           
        },
        decrementItemQuantity(state,cartItem) {
            // cartItem.quantity--;
           // console.log('Usuwam ilosc z koszyka');
             let myItem = state.cart.find(item => item.id === cartItem.id);
            let index = state.cart.indexOf(myItem);
            //console.log('Index: '+index);
            myItem.quantity--;
            if(myItem.quantity === 0 ) {
                //console.log('To usuń z tablicy CART');
                state.cart.splice(index,1);
            }
        },
        removeItem(state,productId) {
            //znajduje pozycje w state.cart == productid
            const productItem = this.state.cart.find(item => item.id === productId);
            //usuwam z tablicy pozycje o okreslonym indexie
            state.cart.splice(state.cart.indexOf(productItem),1);
        },
        clearCart(state) {
            state.cart = [];
        },
        setMarket(state) {
            //biorę obiekt market z cookie
            let cookie = Cookies.get('market');
            
            // state.marketID = JSON.parse(cookie).id;
            state.marketslug = JSON.parse(cookie).name.replace(' ','-');
        }

    },
    actions: {  // = methods
        // getUser({commit}) {
        //     axios.get('/api/current')
        //     .then(response => {
        //         commit('setUser',response.data );
        //     });
        // },
        setMyMarket({commit}) {
            commit('setMarket');
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
                       commit('setMarket');
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
            axios.get('/api/news_main/'+marketID)
            .then(
                response => {
                   // commit('setProductsNews',response.data);
                    commit('setProducts',response.data);
                }
            ); 
        },
        fetchProductsNewsAll({commit}) {
            // let cookie = Cookies.get('market');
            // let marketID = JSON.parse(cookie).id;
            console.log('fetchProductsNewsAll');
            
            axios.get('/api/'+this.state.marketslug+'/news')
            .then(
                response => {
                    //zamieniam pobrany objekt na tablicę
                    // commit('setProducts',Object.entries(response.data));
                    commit('setProducts',response.data["data"]);
                    commit('setMeta',response.data["meta"]);
                }
            );
        },
        fetchProductsByCategory({commit},category) {
            // console.log(category);
            // $this.state.filters=[];
            const categoryItem = this.state.categories.find(item => item.name === category);
            console.log('categoryItem:  '+categoryItem.name+ 'ID: '+categoryItem.id);

            axios.get('/api/'+this.state.marketslug+'/category/'+categoryItem.id)
            .then(
                response => {
                    //zamieniam pobrany objekt na tablicę
                    // commit('setProducts',Object.entries(response.data));
                    commit('setProducts',response.data["data"]);
                    commit('setMeta',response.data["meta"]);
                }
            )
            .catch(function (error) {
                console.log('Error:  '+error);
            });
            //odpytuje API - Filter
            axios.get('/api/'+this.state.marketslug+'/filter/'+categoryItem.id)
            .then(
                response => {
                    commit('setFilter',response.data);
                }
            );
        },
        fetchFilter({commit}) {
            axios.get('/api/'+this.state.marketslug+'/filter/news')
            .then(
                response => {
                    commit('setFilter',response.data);
                }
            );
        },
        fetchCategories({commit}) {
            axios.get('/api/category')
            .then(
                response => {
                    commit('setCategories',response.data);
                }
            );
        },
        addToCart(context,product) {
            //find cart
            const cartItem = context.state.cart.find(item => item.id === product.id );
            // console.log(cartItem);
            if(!cartItem) {
                //pushProductToCart
                context.commit('pushProductToCart', product.id);
               // context.commit('pushProductToCart', cartItem);
                console.log('push product to card');
            } else {
                //incrementItemQuantity
                context.commit('incrementItemQuantity',cartItem);
                console.log('increment Item');
            }
        },
        decrementProductItem({commit},product) {
            const cartItem = this.state.cart.find(item => item.id === product.id );
            commit('decrementItemQuantity',cartItem);
        },
        // getProductCart({commit},product) {

        // },
        fetchProduct1(state,productId) {
            console.log(" state - fetchProducts1 " +productId);
        },
        // fetchProduct({commit},productId) {
        fetchProduct({commit},productId) {
           const productItem = this.state.products.find(item => item.id === productId);
           console.log('szukam produkt ID:'+productId);
           //usuwam znalezniony element, pobieram pełne dane z API
           //this.state.products.splice(this.state.products.indexOf(productItem),1);
           console.log('pobieram z API ....');
            axios.get('/api/product/'+productId)
                .then(
                    response => {
                        commit('updateProduct',response.data[0]);
                    }
                ); 
        //    if(!productItem) {
        //        //pobierz dane z API
        //        console.log('pobieram z API ....');
        //         axios.get('/api/product/'+productId)
        //         .then(
        //             response => {
        //                commit('pushProduct',response.data[0]);
        //             }
        //         ); 
        //        //dodaj do tablicy products
        //    }
        },
        removeItem({commit},productId) {
            //const productItem = this.state.products.find(item => item.id === productId);
            commit('removeItem',productId);
        },
        
        // order({commit}) {
        //     axios.post('/api/order',{
        //         user: 8, 
                
        //     })
        //     .then(response => {
        //         //commit('pushProduct',response.data[0]);
        //         console.log(response.data)
        //     })
        //     .catch(function (error) {
        //         console.log(error);
        //         // alert(response.data.message);
               
        //     });
        // },
        order2({commit}) {
            var config = {
                headers: {'Authorization': 'Bearer '+this.state.token}
            };
            axios.post('/api/order2', {
                // firstName: 'Fred',
                // lastName: 'Flintstone',
                cart: this.state.cart,
                market: this.state.marketID,
              }, config)
              .then(function (response) {
                console.log(response);
                console.log('pomyslnie zapisano zamównienie');
                //czyscze liste cart
                commit('clearCart');
              })
              .catch(function (error) {
                console.log(error);
              });
        }

    }
});