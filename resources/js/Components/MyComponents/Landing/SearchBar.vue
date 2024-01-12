<template>
    <div class="border border-secondary rounded-[3px] flex items-center py-0">
        <span class="border-r border-secondary px-3 text-gray1 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </span>
        <input v-model="query" @keyup.enter="search" type="text" placeholder="¿Qué estás buscando?"
            class="placeholder:text-gray1 px-3 py-1 border-0 w-full mr-2 focus:ring-0">
    </div>
</template>
<script>
export default {
    data() {
        return {
            query: null,
        };
    },
    methods: {
        search() {
            this.$inertia.get(route('landing.products', {filter: 'Todos', query: this.query}));
        }
    },
}
</script>