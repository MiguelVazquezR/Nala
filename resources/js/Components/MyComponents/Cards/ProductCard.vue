<template>
    <div class="border rounded-[3px] py-3 border-secondary h-64 lg:h-80 lg:w-11/12 flex flex-col justify-center">
        <figure class="h-2/3 bg-secondary">
        </figure>
        <main class="mt-3">
            <p class="text-center">Pulsera Pantera Oro amarillo 14K Zirconias blancas y verdes {{ product }}</p>
        </main>
        <footer class="mt-auto flex items-center justify-center space-x-10">
            <p class="text-gray1 line-through">$550</p>
            <p class="text-center">$450</p>
        </footer>
    </div>
</template>
<script>
export default {
    props: {
        product: Number,
    }
}
</script>