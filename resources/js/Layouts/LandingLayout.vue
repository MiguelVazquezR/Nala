<template>
    <div>

        <Head :title="title" />

        <div class="min-h-screen bg-white dark:bg-gray-900">
            <nav class="bg-white dark:bg-gray-800 border-b border-secondary dark:border-gray-700">
                <!-- Primary Navigation Menu -->
                <div class="mx-auto px-4 sm:px-6 lg:px-10">
                    <div class="flex justify-between h-20">
                        <!-- Logo -->
                        <Link :href="route('dashboard')">
                        <ApplicationMark class="block w-36" />
                        </Link>
                        <!-- barra de busqueda -->
                        <SearchBar class="hidden sm:flex self-center" />
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
                                            <path
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16" />
                                            <!-- <path
                                                :class="{ 'hidden': !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" /> -->
                                        </svg>
                                    </button>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('profile.show')">
                                        Profile
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>
                </div>
            </nav>
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
<script>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import SearchBar from '@/Components/MyComponents/Landing/SearchBar.vue';
import Nav from '@/Components/MyComponents/Landing/Nav.vue';

export default {
    data() {
        return {
            showingNavigationDropdown: false,
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
    },
    props: {
        title: String,
    }
}
</script>