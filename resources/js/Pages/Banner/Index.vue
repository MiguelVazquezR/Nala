<template>
  <AppLayout title="Banners">
    <div class="mx-2 lg:mx-16">
      <div class="">
    <InputFilePreview
        v-show="currentImage == 1"
        @imagen="this.form.banner1 = $event; clearedBanner1 = false"
        :imageUrl="getMediaUrl('banner1')"
        @cleared="form.clearedBanner1 = true"
    />
    <InputFilePreview
        v-show="currentImage == 2"
        @imagen="this.form.banner2 = $event; clearedBanner2 = false"
        :imageUrl="getMediaUrl('banner2')"
        @cleared="form.clearedBanner2 = true"
    />
    <InputFilePreview
        v-show="currentImage == 3"
        @imagen="this.form.banner3 = $event; clearedBanner3 = false"
        :imageUrl="getMediaUrl('banner3')"
        @cleared="form.clearedBanner3 = true"
    />
    <p class="text-center mt-2">
        <i
            @click="currentImage = currentImage - 1"
            v-if="currentImage > 1"
            class="fa-solid fa-angle-left text-xs mr-2 cursor-pointer p-1"
        ></i>
        Imagen {{ currentImage }} de 3
        <i
            @click="currentImage = currentImage + 1"
            v-if="currentImage < 3"
            class="fa-solid fa-angle-right text-xs ml-2 cursor-pointer p-1"
        ></i>
    </p>
    <div class="text-right">
        <PrimaryButton :disabled="form.processing" @click="update">Guardar</PrimaryButton>
    </div>
</div>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputFilePreview from "@/Components/MyComponents/InputFilePreview.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";

export default {
  data() {
    const form = useForm({
      banner1: null,
      banner2: null,
      banner3: null,
      clearedBanner1: false,
      clearedBanner2: false,
      clearedBanner3: false,
    });
    return {
      form,
      currentImage: 1
    };
  },
  components: {
    AppLayout,
    PrimaryButton,
    InputFilePreview,
  },
  props: {
    banners: Object,
  },
  methods: {
    update() {
        console.log('edit');
        this.form.post(route("banners.update-with-media", this.banners.id), {
          method: '_put',
          onSuccess: () => {
            this.$notify({
                title: "Correcto",
                message: "Se han actualizado los banners",
                type: "success",
            });
            window.location.reload();
          },
        });
    },
    getMediaUrl(collectionName) {
        const media = this.banners.media.find(img => img.collection_name === collectionName);
        return media ? media.original_url : null;
    },
  },
};
</script>
