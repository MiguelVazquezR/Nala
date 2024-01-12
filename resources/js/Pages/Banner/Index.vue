<template>
    <AppLayout title="Banners">
        <div class="mx-2 lg:mx-16">
            <div class="">
                <InputFilePreview v-show="currentImage == 1" @imagen="this.form.banner1 = $event;" :imageUrl="banners.media[0]?.original_url" />
                <InputFilePreview v-show="currentImage == 2" @imagen="this.form.banner2 = $event;" :imageUrl="banners.media[1]?.original_url" />
                <InputFilePreview v-show="currentImage == 3" @imagen="this.form.banner3 = $event;" :imageUrl="banners.media[2]?.original_url" />
                <p class="text-center mt-2">
                    <i @click="currentImage = currentImage - 1" v-if="currentImage > 1" class="fa-solid fa-angle-left text-xs mr-2 cursor-pointer p-1"></i>
                    Imagen {{ currentImage }} de 3
                    <i @click="currentImage = currentImage + 1" v-if="currentImage < 3" class="fa-solid fa-angle-right text-xs ml-2 cursor-pointer p-1"></i>
                </p>
                <div class="text-right">
                    <PrimaryButton @click="store">Guardar</PrimaryButton>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputFilePreview from '@/Components/MyComponents/InputFilePreview.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";

export default {
data() {
    const form = useForm({
        banner1: this.banners?.media[0],
        banner2: this.banners?.media[1],
        banner3: this.banners?.media[2],
    });
    return {
        form,
        currentImage: 1
    }
},
components:{
AppLayout,
PrimaryButton,
InputFilePreview
},
props:{
banners: Object
},
methods:{
store() {
    this.form.post(route("banners.store"), {
      onSuccess: () => {
        this.$notify({
          title: "Correcto",
          message: "Se ha agregado banners",
          type: "success",
        });
      },
    });
  },
},
    
}
</script>