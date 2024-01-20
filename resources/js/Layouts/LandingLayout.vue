<template>
    <div>

        <Head :title="title" />

        <div class="min-h-screen flex flex-col bg-white darrk:bg-gray-900">
            <nav class="bg-white darrk:bg-gray-800 border-b border-secondary darrk:border-gray-700">
                <!-- Primary Navigation Menu -->
                <div class="mx-auto px-4 sm:px-6 lg:px-10">
                    <div class="flex justify-between items-center h-20">
                        <!-- Logo -->
                        <ApplicationMark class="w-1/3 sm:w-1/12" />
                        <!-- barra de busqueda -->
                        <SearchBar class="hidden sm:flex w-1/3" />
                        <!-- navegacion -->
                        <Nav class="hidden sm:flex" />
                        <!-- btn Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <button
                                        class="inline-flex items-center justify-center p-2 rounded-md darrk:text-gray-500 hover:text-gray-500 darrk:hover:text-gray-400 hover:bg-gray-100 darrk:hover:bg-gray-900 focus:outline-none focus:bg-black focus:text-white darrk:focus:bg-gray-900 darrk:focus:text-gray-400 transition duration-150 ease-in-out"
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
            <header class="sm:hidden mx-3 lg:mx-56 mt-5">
                <SearchBar />
            </header>
            <main>
                <slot />
            </main>
            <footer class="border-t border-secondary pt-3 mt-auto">
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
                            <span>3328415143</span>
                            <a href="https://api.whatsapp.com/send?phone=523328415143&text=Hola!%20vi%20tu%20página%20,%20me%20interesan%20sus%20productos!"
                                target="_blank"
                                class="bg-black text-white rounded-full size-4 flex items-center justify-center">
                                <i class="fa-brands fa-whatsapp text-xs"></i>
                            </a>
                        </p>
                        <p class="flex items-center space-x-2 text-xs">
                            <span>nalajewelry0@gmail.com</span>
                        </p>
                    </div>
                    <div class="mt-2">
                        <h2>Encuentranos en nuestras redes sociales</h2>
                        <ul class="flex items-center space-x-2">
                            <a href="https://www.facebook.com/profile.php?id=100057557755446&mibextid=LQQJ4d">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/nala_jewlry?igsh=MWVraHAzZHY2YXhxaQ%3D%3D&utm_source=qr">
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
                    route: 'https://api.whatsapp.com/send?phone=523328415143&text=Hola!%20vi%20tu%20página%20,%20me%20interesan%20sus%20productos!',
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