<template>
    <ul class="flex items-center space-x-10 text-xl">
        <li>
            <Link :href="route('landing.home')">
            Inicio
            </Link>
        </li>
        <li>
            <Link :href="route('landing.products', {filter: 'Todos'})">
            Productos
            </Link>
        </li>
        <a href="https://api.whatsapp.com/send?phone=523328415143&text=Hola!%20vi%20tu%20página%20,%20me%20interesan%20sus%20productos!"
            target="_blank" class="bg-black text-white rounded-full size-6 flex items-center justify-center">
            <i class="fa-brands fa-whatsapp text-sm"></i>
        </a>
    </ul>
</template>
<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link,
    }
}
</script>