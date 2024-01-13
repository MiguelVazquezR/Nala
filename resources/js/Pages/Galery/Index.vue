<template>
  <AppLayout title="Galería">
    <div class="mx-2 lg:mx-16 mb-5">
      <h1 class="text-xl">Galería</h1>
      <div v-if="uploadedImages.length" class="grid grid-cols-6 gap-2 my-5">
        <h2 class="col-span-full">Galería actual</h2>
        <img v-for="(item, index) in uploadedImages" :key="index" :src="item.original_url"
          class="h-full w-full object-contain border">
      </div>
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-x-3 gap-y-px">
        <h2 class="col-span-full mb-2">Subir nuevas fotos</h2>
        <div class="text-gray1 col-span-full flex space-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
          </svg>
          <p>Sube nuevas fotos para actualizar la galería. Ten en cuenta que al subirlos, reemplazarás las fotos anteriores.</p>
          </div>
        <InputFilePreview v-for="(file, index) in form.images" :key="index" :canDelete="index == (form.images.length - 2)"
          @imagen="saveImage" @cleared="handleCleared(index)" class="my-2" />
      </div>
      <div class="text-right">
        <PrimaryButton :disabled="form.processing" @click="update">Guardar</PrimaryButton>
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
      images: [null]
    });
    return {
      form,
      uploadedImages: [],
    };
  },
  components: {
    AppLayout,
    PrimaryButton,
    InputFilePreview,
  },
  props: {
    galery: Object
  },
  methods: {
    update() {
      this.form.post(route("galeries.update-with-media", this.galery.id), {
        method: '_put',
        onSuccess: () => {
          this.$notify({
            title: "Correcto",
            message: "Se ha actualizado tu galería",
            type: "success",
          });
          window.location.reload();
        },
      });
    },
    saveImage(image) {
      const currentIndex = this.form.images.length - 1;
      this.form.images[currentIndex] = image;
      this.form.images.push(null);
    },
    handleCleared(index) {
      // Eliminar el componente y su informacion correspondiente cuando se borra la imagen
      this.form.images.splice(index, 1);
    }

  },
  mounted() {
    if (this.galery.media?.length > 0) {
      this.uploadedImages = this.galery.media;
    }
  }
};
</script>
