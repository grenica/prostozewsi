<template>
    <div>
        <div class="notification">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        </div>
       <Categories />
        <!-- <a href="#" class="btn btn-primary" @click="testuj()">CLICK</a> -->
    </div>
   
</template>

<script>
import Categories from './Categories.vue';

export default {
   components: {
    Categories,       
   },
//    mounted: function() {
//        console.log('mouted');
//    },

   methods: {
       testuj(){
           alert('testuj !!!!')
       }
   }
    
}
</script>