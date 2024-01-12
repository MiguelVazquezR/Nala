<template>
    <AppLayout title="Categorías">
        <div class="mx-2 lg:mx-9">
            <h1 class="font-bold border-b border-secondary py-2">Categorías</h1>
            <p class="border-b border-secondary py-2" v-for="category in categories" :key="category">{{ category.name }}</p>
            
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";

export default {
data() {
    return {

    }
},
components:{
AppLayout,
},
props:{
categories: Array
},
methods:{

},
    
}
</script>