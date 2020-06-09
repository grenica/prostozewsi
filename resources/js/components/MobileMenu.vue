<template>
    <div class="mobilemenu_wrapper">
        <div class="hamburger" @click="showMobileMenu" >
            <span></span>
        </div>
        <div class="mobilemenu" :class="{active: isActive }">
           
            <ul>
                <li v-for="item in categories" :key="item.index">
                    <router-link @click.native="hide()" class="strong store_link" :to="{ name:'category', params:{name:item.name} }" >{{ item.name }}</router-link>
                </li>
            </ul>
        </div>
    </div>
    
</template>
<script>
export default {
    // props:['isActive'],
    data() {
        return {
            isActive: false,
        }
    },
    computed: {
        categories() {
            return this.$store.state.categories;
        },
        
    },
    methods: {
        hide() {
            // this.active= false;
            // alert('togle class');
            // $emit()
            this.isActive = false;
            console.log('ukryj menu');
        },
        showMobileMenu() {
            this.isActive = true;
            console.log('Mobile Menu');
        }
    }
}
</script>
<style lang="scss">
.mobilemenu {
    width: 100vw;
    height: 100vh;
    background-color: #9bcf83;
    // display: flex;
    display: none;
    position: absolute;
    top:0;
    left: 0;
    overflow-y: hidden;
    // transform: translateX(-100vw);
    // transition: transform 0.1s ease-out;
}
.active {
    // transform: translateX(0);
    display: flex;
}
// zmienne 
    $szer: 30px;
    $grlinii: 2px;

.hamburger {
    display: flex;
    width: $szer;
    height: $szer;
    align-items: center;
    span {
        display: block;
        width: 70%;
        height: 2px;
        background: green;
        &::before, &::after {
            content: '';
            width: 130%;
            height: $grlinii;
            background-color: green;
            display: flex;
        }
        &::before {
            transform: translateY(-8px);
        }
        &::after {
            transform: translateY(6px);
        }
    }
}
</style>