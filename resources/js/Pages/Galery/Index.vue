<template>
  <AppLayout title="Galería">
    <div class="mx-2 lg:mx-16">
        <h1 class="font-bold text-lg">Galería</h1>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
            <InputFilePreview v-for="(file,index) in form.images" :key="index" :canDelete="index == (form.images.length - 2)"
                @imagen="saveImage" @cleared="handleCleared(index)" class="my-2"
                :imageUrl="galery?.media[index]?.original_url" />
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
        const currentIndex = this.form.images.length -1;
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
      this.form.images = this.galery.media;
      this.form.images.push(null);
    }
  }
};
</script>
