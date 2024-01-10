<template>
    <div>

        <Head :title="title" />

        <div class="min-h-screen bg-white dark:bg-gray-900">
            <nav class="bg-white dark:bg-gray-800 border-b border-secondary dark:border-gray-700">
                <div class="flex items-center justify-between h-20 px-8">
                    <Link :href="route('dashboard')">
                        <ApplicationMark class="block w-36" />
                    </Link>
                    <SearchBar />
                    <Nav />
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
import SearchBar from '@/Components/MyComponents/Landing/SearchBar.vue';
import Nav from '@/Components/MyComponents/Landing/Nav.vue';

export default {
    components: {
        Head,
        Link,
        ApplicationMark,
        SearchBar,
        Nav,
    },
    props: {
        title: String,
    }
}
</script>