<template>
    <div>

        <Head :title="title" />

        <div class="min-h-screen bg-white dark:bg-gray-900">
            <nav class="bg-white dark:bg-gray-800 border-b border-secondary dark:border-gray-700">
                <!-- Primary Navigation Menu -->
                <div class="mx-auto px-4 sm:px-6 lg:px-10">
                    <div class="flex justify-between items-center h-20">
                        <!-- Logo -->
                        <ApplicationMark class="w-1/3 sm:w-1/12" />
                        <!-- barra de busqueda -->
                        <SearchBar class="hidden sm:flex" />
                        <!-- navegacion -->
                        <Nav class="hidden sm:flex" />
                        <!-- btn Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <button
                                        class="inline-flex items-center justify-center p-2 rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-black focus:text-white dark:focus:bg-gray-900 dark:focus:text-gray-400 transition duration-150 ease-in-out"
                                        @click="showingNavigationDropdown = !showingNavigationDropdown">
                                        <svg class="size-7" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                    </button>
                                </template>

                                <template #content>
                                    <DropdownLink v-for="(item, index) in menuOptions" :key="index" :href="item.route"
                                        :as="item.as">
                                        {{ item.label }}
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>
                </div>
            </nav>
            <header class="hidden sm:block mx-56 mt-5">
                <ul class="flex items-center justify-between w-full">
                    <li v-for="(item, index) in categories" :key="index"
                        class="border-b-2 border-transparent hover:border-primary">
                        <Link :href="route('landing.products', { filter: item })">{{ item }}</Link>
                    </li>
                </ul>
            </header>
            <main>
                <slot />
            </main>
            <footer class="mt-7 border-t border-secondary pt-3">
                <section class="px-3 lg:grid grid-cols-4 gap-x-4">
                    <div>
                        <ApplicationMark class="block w-1/3 sm:w-1/3" />
                        <small>Elevando elegancia, definiendo estilo.</small>
                    </div>
                    <div class="mt-2">
                        <h2>Categorías</h2>
                        <ul class="flex flex-col">
                            <Link :href="route('landing.products', { filter: item })" v-for="(item, index) in categories"
                                :key="index" class="text-xs self-start border-b border-transparent hover:border-primary">{{ item }}</Link>
                        </ul>
                    </div>
                    <div class="mt-2">
                        <h2>Contáctanos</h2>
                        <p class="flex items-center space-x-2 text-xs">
                            <span>3310223000</span>
                            <a href="https://api.whatsapp.com/send?phone=523310223000&text=Hola!%20vi%20tu%20página%20,%20me%20interesan%20sus%20productos!"
                                target="_blank"
                                class="bg-black text-white rounded-full size-4 flex items-center justify-center">
                                <i class="fa-brands fa-whatsapp text-xs"></i>
                            </a>
                        </p>
                    </div>
                    <div class="mt-2">
                        <h2>Encuentranos en nuestras redes sociales</h2>
                        <ul class="flex items-center space-x-2">
                            <a href="#">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="#">
                                <i class="fa-brands fa-square-instagram"></i>
                            </a>
                        </ul>
                    </div>
                </section>
                <section class="py-2 border-y border-secondary flex items-center justify-between px-3 text-[10px] sm:text-sm">
                    <p class="text-gray1">&copy; 2024 • Nala.</p>
                    <a href="https://dtw.com.mx" target="_blank" class="flex items-center space-x-2">
                        <small>by Digtital Tech Work</small>
                        <DTWMark class="w-5" />
                    </a>
                </section>
            </footer>
        </div>
    </div>
</template>
<script>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import SearchBar from '@/Components/MyComponents/Landing/SearchBar.vue';
import DTWMark from '@/Components/MyComponents/Layout/DTWMark.vue';
import Nav from '@/Components/MyComponents/Landing/Nav.vue';

export default {
    data() {
        return {
            showingNavigationDropdown: false,
            menuOptions: [
                {
                    label: 'Inicio',
                    route: route('landing.home'),
                    as: ''
                },
                {
                    label: 'Productos',
                    route: route('landing.products'),
                    as: ''
                },
                {
                    label: 'Enviar mensaje',
                    route: 'https://api.whatsapp.com/send?phone=523310223000&text=Hola!%20vi%20tu%20página%20,%20me%20interesan%20sus%20productos!',
                    as: 'a'
                },
            ],
            categories: [
                'Todos',
                'Collares y colgantes',
                'Aretes',
                'Puseras',
                'Anillos',
                'Relojes',
                'Hombres',
            ]
        };
    },
    components: {
        Head,
        Link,
        ApplicationMark,
        SearchBar,
        Nav,
        Dropdown,
        DropdownLink,
        DTWMark,
    },
    props: {
        title: String,
    }
}
</script>