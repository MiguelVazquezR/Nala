<template>
    <LandingLayout title="Inicio">
        <!-- banner -->
        <section class="h-36 bg-secondary mt-2"></section>

        <!-- productos populares -->
        <section>
            <h1 class="text-lg mx-3 mr-2">Productos populares</h1>
            <PrimaryButton>Ver todos</PrimaryButton>
        </section>

    </LandingLayout>
</template>
<script>
import LandingLayout from '@/Layouts/LandingLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

export default {
    components: {
        LandingLayout,
        PrimaryButton,
    }    
}
</script>