<template>
    <LandingLayout title="Productos">
        <!-- mobil -->
        <header class="flex items-center justify-between my-4 mx-3 lg:hidden">
            <span>{{ currentCategory }}</span>
            <Dropdown align="right" width="48">
                <template #trigger>
                    <button class="border rounded-[2px] border-secondary bg-white flex items-center space-x-3 px-2 py-1">
                        <span>Filtro</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                        </svg>
                    </button>
                </template>

                <template #content>
                    <div class="px-4">
                        <div v-for="(item, index) in categories" :key="index" class="flex items-center mb-1">
                            <input v-model="currentCategory" :id="'country-option-' + index" type="radio" name="countries"
                                :value="item.name"
                                class="size-3 border-gray-300 checked:text-primary active:text-primary focus:ring-0"
                                :aria-labelledby="'country-option-' + index" :aria-describedby="'country-option-' + index">
                            <label :for="'country-option-' + index" class="text-sm font-medium text-gray-900 ml-2 block">
                                {{ item.name }}
                            </label>
                        </div>
                    </div>
                </template>
            </Dropdown>
        </header>
        <!-- desktop -->
        <header class="hidden lg:block mx-3 lg:mx-56 mt-5">
            <ul class="flex items-center justify-between w-full">
                <li v-for="(item, index) in categories" :key="index" class="border-b-2 hover:border-primary"
                    :class="item.name == currentCategory ? 'border-primary' : 'border-transparent'">
                    <button @click="currentCategory = item.name">{{ item.name }}</button>
                </li>
            </ul>
        </header>
        <div v-if="currentQuery" class="mt-8 mb-4 mx-3 lg:mx-24">
            <span class="bg-secondary px-1 py-px rounded-sm">
                Estas buscando: "{{ currentQuery }}"
                <button @click="removeQuery()" class="ml-2">
                    <i class="fa-solid fa-xmark text-xs"></i>
                </button>
            </span>
        </div>
        <section class="grid grid-cols-2 lg:grid-cols-4 gap-2 lg:mt-11 mx-3 lg:mx-24 mb-5">
            <ProductCard v-for="(item, index) in filteredProducts" :key="index" :product="item" class="!w-full" />
            <p v-if="!filteredProducts.length" class="text-gray1 text-center my-8 col-span-full">No hay productos para mostrar</p>
        </section>
    </LandingLayout>
</template>
<script>
import LandingLayout from '@/Layouts/LandingLayout.vue';
import ProductCard from '@/Components/MyComponents/Cards/ProductCard.vue';
import Dropdown from '@/Components/Dropdown.vue';
import { Link } from '@inertiajs/vue3';

export default {
    data() {
        return {
            currentCategory: 'Todos',
            currentQuery: null,
            filteredProducts: [],
        };
    },
    components: {
        LandingLayout,
        ProductCard,
        Dropdown,
        Link,
    },
    props: {
        products: Array,
        filter: {
            type: String,
            default: "Todos"
        },
        query: String,
        categories: Array,
    },
    methods: {
        removeQuery() {
            // Obtener la URL actual
            const url = new URL(window.location.href);

            // Remover la variable "query"
            url.searchParams.delete('query');

            this.currentQuery = null;
            // Actualizar la URL sin recargar la página
            window.history.replaceState({}, '', url.toString());

            this.filterProducts();
        },
        filterByQuery() {
            if (this.currentQuery) {
                const regex = new RegExp(this.currentQuery, 'i'); // 'i' hace la búsqueda sin distinguir mayúsculas y minúsculas
                this.filteredProducts = this.filteredProducts.filter(product => regex.test(product.name));
            }
        },
        filterProducts() {
            if (this.currentCategory == 'Todos') {
                this.filteredProducts = this.products;
            } else {
                this.filteredProducts = this.products.filter(item => item.category == this.currentCategory);
            }

            // buscar también por query
            this.filterByQuery();
        }
    },
    watch: {
        currentCategory(newVal) {
            this.removeQuery();
            // Agrega la variable currentTab=newVal a la URL para mejorar la navegacion al actalizar o cambiar de pagina
            const currentURL = new URL(window.location.href);
            currentURL.searchParams.set('filter', newVal);


            // Actualiza la URL
            window.history.replaceState({}, document.title, currentURL.href);

            // cambiar productos a mostrar
            this.filterProducts();
        },
    },
    mounted() {
        this.currentCategory = this.filter;
        this.currentQuery = this.query;
        this.filterProducts();
    },
}
</script>