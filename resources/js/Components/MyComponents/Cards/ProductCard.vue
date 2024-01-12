<template>
    <Link :href="route('landing.products.show', product)"
        class="border rounded-[3px] py-3 border-secondary h-64 lg:h-80 lg:w-11/12 flex flex-col justify-center">
    <figure class="h-2/3 flex items-center justify-center relative">
        <div v-if="loading"
            class="absolute inset-0 bg-secondary opacity-80 flex items-center justify-center text-black">
            <i class="fa-solid fa-spinner animate-spin text-xl"></i>
        </div>
        <img v-if="product.media" :src="product.media[0].original_url" @load="imageLoaded"
            class="object-cover h-full w-full">
    </figure>
    <main class="mt-3">
        <p class="text-center">{{ product.name }}</p>
    </main>
    <footer class="mt-auto flex items-center justify-center space-x-10">
        <p class="text-gray1" :class="product.discount_price ? 'line-through' : null">${{ product.price }}</p>
        <p v-if="product.discount_price" class="text-center">${{ product.discount_price }}</p>
    </footer>
    </Link>
</template>
<script>
import { Link } from '@inertiajs/vue3';

export default {
    data() {
        return {
            loading: true,
        };
    },
    props: {
        product: Object,
    },
    components: { Link },
    methods: {
        imageLoaded() {
            this.loading = false;
        },
    }
}
</script>