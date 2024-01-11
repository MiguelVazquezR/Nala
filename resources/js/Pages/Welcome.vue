<template>
    <LandingLayout title="Inicio">
        <!-- banner -->
        <section class="h-36 bg-secondary mt-2"></section>

        <!-- productos populares -->
        <section>
            <h1 class="flex items-center space-x-2 text-lg mx-3 mt-5">
                <span>Productos populares</span>
                <PrimaryButton class="!py-1 !px-2">Ver todos</PrimaryButton>
            </h1>

            <article class="items-center rounded-[3px] mt-3 py-2 px-3 lg:px-14 active:cursor-grabbing">
                <!-- <button @click="navigateCarousel(-1)"
                    class="flex items-center justify-center size-5 rounded-full hover:bg-black hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </button> -->

                <!-- <button @click="navigateCarousel(1)"
                    class="flex items-center justify-center size-5 rounded-full hover:bg-black hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </button> -->
                <Carousel v-bind="settings" :breakpoints="breakpoints">
                    <Slide v-for="slide in popularProducts" :key="slide">
                        <!-- <div class="carousel__item">{{ slide }}</div> -->
                        <ProductCard :product="slide" />
                    </Slide>

                    <template #addons>
                        <Navigation />
                    </template>
                </Carousel>
                <!-- <div class="flex justify-center space-x-2 mt-2">
                    <button v-for="item in 10" :key="item" @click="currentPopularProduct = item"
                        class="w-2 h-2 rounded-full"
                        :class="currentPopularProduct == item ? 'bg-secondary' : 'bg-gray4'"></button>
                </div> -->
            </article>
        </section>

    </LandingLayout>
</template>
<script>
import LandingLayout from '@/Layouts/LandingLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ProductCard from '@/Components/MyComponents/Cards/ProductCard.vue';
import { Carousel, Navigation, Pagination, Slide } from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';

export default {
    data() {
        return {
            currentPopularProduct: 0,
            popularProducts: [1,2,3,4,5,6,7,8,9,10],
            settings: {
                wrapAround: true,
                itemsToShow: 2,
                snapAlign: 'start',
                autoplay: 5000,
            },
            // breakpoints are mobile first
            // any settings not specified will fallback to the carousel settings
            breakpoints: {
                // 700px and up
                700: {
                    itemsToShow: 3,
                    snapAlign: 'start',
                },
                // 1024 and up
                1024: {
                    itemsToShow: 4,
                    snapAlign: 'start',
                },
            },
        };
    },
    components: {
        LandingLayout,
        PrimaryButton,
        ProductCard,
        Carousel,
        Slide,
        Pagination,
        Navigation,
        ProductCard
    },
}
</script>
<style>
.carousel__item {
    min-height: 200px;
    width: 100%;
    background-color: var(--vc-clr-primary);
    color: var(--vc-clr-white);
    font-size: 20px;
    border-radius: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.carousel__slide {
    padding: 10px;
}

.carousel__prev,
.carousel__next {
    box-sizing: content-box;
    border: 5px solid white;
}
</style>