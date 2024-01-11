<template>
    <LandingLayout title="Inicio">
        <header class="hidden lg:block mx-3 lg:mx-56 mt-5">
            <ul class="flex items-center justify-between w-full">
                <li v-for="(item, index) in categories" :key="index"
                    class="border-b-2 border-transparent hover:border-primary">
                    <Link :href="route('landing.products', { filter: item })">{{ item }}</Link>
                </li>
            </ul>
        </header>

        <!-- banner -->
        <section class="h-28 lg:h-64 mt-2">
            <Carousel v-bind="bannerSettings" :itemsToShow="1">
                <Slide v-for="slide in 3" :key="slide" class="px-[2px]">
                    <img src="@/../../public/images/banner1.png" class="h-full object-contain">
                </Slide>
                <template #addons>
                    <Pagination />
                </template>
            </Carousel>
        </section>

        <!-- productos populares -->
        <section>
            <h1 class="flex items-center space-x-2 text-lg py-2 md:px-16 mx-3 mt-5 lg:mt-12">
                <span>Productos populares</span>
                <Link :href="route('landing.products', { filter: 'Todos' })">
                <PrimaryButton class="!py-1 !px-2">Ver todos</PrimaryButton>
                </Link>
            </h1>

            <article class="items-center rounded-[3px] mt-3 py-2 px-3 lg:px-14 active:cursor-grabbing">
                <Carousel v-bind="popularSettings" :breakpoints="breakpoints">
                    <Slide v-for="slide in popularProducts" :key="slide" class="px-1">
                        <ProductCard :product="slide" />
                    </Slide>
                    <template #addons>
                        <Navigation />
                    </template>
                </Carousel>
            </article>
        </section>

        <!-- Galeria -->
        <section>
            <h1 class="text-lg mx-3 md:mx-16 mt-5">
                <span>Galería</span>
            </h1>

            <article class="items-center rounded-[3px] mt-1 py-1 px-3 lg:px-14 active:cursor-grabbing">
                <Carousel v-bind="galerySettings" :breakpoints="breakpoints">
                    <Slide v-for="slide in 20" :key="slide" class="px-1">
                        <img src="@/../../public/images/galery1.png" class="w-full">
                    </Slide>
                </Carousel>
            </article>
        </section>
    </LandingLayout>
</template>
<script>
import { Link } from '@inertiajs/vue3';
import LandingLayout from '@/Layouts/LandingLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ProductCard from '@/Components/MyComponents/Cards/ProductCard.vue';
import { Carousel, Navigation, Pagination, Slide } from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';

export default {
    data() {
        return {
            categories: [
                'Todos',
                'Collares y colgantes',
                'Aretes',
                'Puseras',
                'Anillos',
                'Relojes',
                'Hombres',
            ],
            popularProducts: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            popularSettings: {
                wrapAround: true,
                itemsToShow: 2,
                snapAlign: 'start',
                autoplay: 5000,
            },
            galerySettings: {
                wrapAround: true,
                itemsToShow: 2.7,
                snapAlign: 'start',
                autoplay: 7000,
            },
            bannerSettings: {
                wrapAround: true,
                itemsToShow: 1,
                snapAlign: 'start',
                autoplay: 10000,
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
        ProductCard,
        Link,
    },
}
</script>