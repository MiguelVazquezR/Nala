<template>
    <div class="border border-secondary rounded-r-md py-7 px-5 text-sm w-48">
        <div class="mb-2">
            <p @click="inicioOptions = !inicioOptions" class="flex items-center cursor-pointer">Inicio
                <i v-if="inicioOptions" class="fa-solid fa-angle-down text-xs ml-3"></i>
                <i v-else class="fa-solid fa-angle-up text-xs ml-3"></i>
            </p>
            <ul v-if="inicioOptions" class="ml-2 *:cursor-pointer *:py-1 *:px-2 *:rounded-md space-y-1">
                <li @click="$inertia.get(route('banners.index'))" :class="route().current('banners.*') ? 'bg-primary' : '' " class="hover:bg-primary">Banners</li>
                <li  @click="$inertia.get(route('categories.index'))" :class="route().current('categories.*') ? 'bg-primary' : '' " class="hover:bg-primary">Categorías</li>
                <li @click="$inertia.get(route('galeries.index'))" :class="route().current('galeries.*') ? 'bg-primary' : '' " class="hover:bg-primary">Galería</li>
            </ul>
        </div>
        <div class="mb-2">
            <p @click="productOptions = !productOptions" class="flex items-center cursor-pointer">Productos
                <i v-if="productOptions" class="fa-solid fa-angle-down text-xs ml-3"></i>
                <i v-else class="fa-solid fa-angle-up text-xs ml-3"></i>
            </p>
            <ul v-if="productOptions" class="ml-2 *:cursor-pointer *:py-1 *:px-2 *:rounded-md space-y-1">
                <li @click="$inertia.get(route('products.create'))" :class="route().current('products.create') ? 'bg-primary' : '' " class="hover:bg-primary">Nuevo producto</li>
                <li @click="$inertia.get(route('products.index'))" :class="route().current('products.index') || route().current('products.edit') ? 'bg-primary' : '' " class="hover:bg-primary">Lista de productos</li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
data(){
    return {
        inicioOptions: true,
        productOptions: true,
    }
},
methods:{

}
}
</script>
