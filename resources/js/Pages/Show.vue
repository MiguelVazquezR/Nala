<template>
    <LandingLayout title="Ver producto">
        <Back class="mt-5 lg:mt-8 mx-3 lg:mx-24" />
        <section class="mt-2 py-8 lg:mx-48 lg:grid grid-cols-2 gap-x-1">
            <Carousel v-bind="settings" :itemsToShow="1">
                <Slide v-for="slide in 3" :key="slide">
                    <img src="@/../../public/images/jewerly.png" class="h-full object-contain">
                </Slide>
                <template #addons>
                    <Pagination />
                </template>
            </Carousel>
            <main class="mt-5 lg:mt-0 mx-2">
                <p class="text-center">Pulsera Pantera Oro amarillo 14K Zirconias blancas y verdes {{ product }}</p>
                <footer class="mt-5 flex items-center justify-center space-x-10">
                    <p class="text-gray1 line-through">$550</p>
                    <p class="text-center">$450</p>
                </footer>
                <div class="flex justify-center mx-10 mt-5">
                    <a :href="wpUrl" target="_blank" class="w-full">
                        <PrimaryButton class="w-full flex justify-center">Enviar mensaje</PrimaryButton>
                    </a>
                </div>
            </main>
        </section>
    </LandingLayout>
</template>
<script>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Back from '@/Components/MyComponents/Back.vue';
import LandingLayout from '@/Layouts/LandingLayout.vue';
import { Carousel, Navigation, Pagination, Slide } from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';

export default {
    data() {
        return {
            settings: {
                wrapAround: true,
                itemsToShow: 1,
                snapAlign: 'start',
            },
            wpUrl: 'https://api.whatsapp.com/send?phone=523310223000&text=Hola!%20vi%20tu%20página,%20me%20interesa%20el%20producto%20*' + this.product + '*',
        };
    },
    components: {
        LandingLayout,
        Back,
        Carousel,
        Slide,
        Pagination,
        Navigation,
        PrimaryButton
    },
    props: {
        product: String,
    }
}
</script>