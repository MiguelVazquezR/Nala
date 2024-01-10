<template>
    <ul class="flex items-center space-x-10 text-xl">
        <li>
            <Link href="#">
            Inicio
            </Link>
        </li>
        <li>
            <Link href="#">
            Productos
            </Link>
        </li>
        <button class="bg-black text-white rounded-full size-6 flex items-center justify-center">
            <i class="fa-brands fa-whatsapp text-sm"></i>
        </button>
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