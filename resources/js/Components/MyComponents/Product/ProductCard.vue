<template>
    <div class="rounded-md border border-secondary py-7 px-8 relative group">
        <svg @click="$inertia.get(route('products.edit', product.id))" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute top-2 right-2 rounded-full p-1 cursor-pointer bg-black text-white lg:opacity-0 lg:group-hover:opacity-100 transition ease-linear duration-200">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
        </svg>

        <figure class="size-32 border mx-auto flex items-center">
            <img class="object-cover" :src="product.media[0]?.original_url" alt="">
        </figure>
        <p class="text-center mt-4">{{ product.name }}</p>
        <div class="flex items-center justify-center space-x-5 text-[14px]">
            <p :class="product.discount_price ? 'text-gray-400' : ''" class="text-center mt-5 line-through">${{ product.price?.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",")  }}</p>
            <p v-if="product.discount_price" class="text-center mt-5">${{ product.discount_price?.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",")  }}</p>
        </div>
    </div>
</template>

<script>
export default {
data(){
    return {

    }
},
props:{
product: Object
},
}
</script>
