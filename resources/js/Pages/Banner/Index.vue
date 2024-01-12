<template>
    <AppLayout title="Banners">
        <div class="mx-2 lg:mx-9">
            <div class="">

                <InputFilePreview v-show="currentImage == 1" @imagen="this.form.image_cover1 = $event;" />
                <InputFilePreview v-show="currentImage == 2" @imagen="this.form.image_cover2 = $event;" />
                <InputFilePreview v-show="currentImage == 3" @imagen="this.form.image_cover2 = $event;" />
                <p class="text-center mt-2">
                    <i @click="currentImage = currentImage - 1" v-if="currentImage > 1" class="fa-solid fa-angle-left text-xs mr-2 cursor-pointer p-1"></i>
                    Imagen {{ currentImage }} de 3
                    <i @click="currentImage = currentImage + 1" v-if="currentImage < 3" class="fa-solid fa-angle-right text-xs ml-2 cursor-pointer p-1"></i>
                </p>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputFilePreview from '@/Components/MyComponents/InputFilePreview.vue';

export default {
data() {
    return {
        currentImage: 1
    }
},
components:{
AppLayout,
InputFilePreview
},
props:{
},
methods:{

},
    
}
</script>