<template>
    <AppLayout title="Productos">
        <div v-if="products.length > 0" class="grid grid-cols-2 lg:grid-cols-4 gap-4 mx-2 lg:mx-5">
            <ProductCard v-for="product in products" :key="product" :product="product" />
        </div>
            <p v-else class="text-gray-500 text-center text-sm">No hay productos registrados. <a :href="route('products.create')" class="text-blue-500 cursor-pointer">Registra uno</a></p>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import ProductCard from "@/Components/MyComponents/Product/ProductCard.vue";

export default {
data() {
    return {

    }
},
components:{
AppLayout,
ProductCard
},
props:{
products: Array
},
methods:{

},
    
}
</script>