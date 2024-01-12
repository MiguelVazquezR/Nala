<template>
  <AppLayout title="Editar producto">
    <div class="w-2/3 mx-auto rounded-md border border-secondary p-5">
      <h1 class="font-bold text-lg">
        Editar <span class="text-primary ml-2">{{ product.name }}</span>
      </h1>
      <div class="grid grid-cols-3 space-x-3 mt-3">
        <div>
          <InputFilePreview
            v-show="currentImage == 1"
            :imageUrl="getMediaUrl('cover1')"
            @imagen="this.form.image_cover1 = $event; form.clearedCover1 = false"
            @cleared="form.clearedCover1 = true"
          />
          <InputFilePreview
            v-show="currentImage == 2"
            :imageUrl="getMediaUrl('cover2')"
            @imagen="this.form.image_cover2 = $event; form.clearedCover2 = false"
            @cleared="form.clearedCover2 = true"
          />
          <p class="text-center mt-2">
            <i
              @click="currentImage = currentImage - 1"
              v-if="currentImage == 2"
              class="fa-solid fa-angle-left text-xs mr-2 cursor-pointer p-1"
            ></i>
            Imagen {{ currentImage }} de 2
            <i
              @click="currentImage = currentImage + 1"
              v-if="currentImage == 1"
              class="fa-solid fa-angle-right text-xs ml-2 cursor-pointer p-1"
            ></i>
          </p>
        </div>

        <div class="col-span-2">
          <div class="mt-3">
            <div class="flex items-center">
              <InputLabel value="Nombre del producto*" class="ml-3 mb-1" />
              <el-tooltip
                content="Escribe el nombre y una breve descripción del producto, este se mostrará en la vista de la sección de los productos"
                placement="top"
              >
                <i class="fa-regular fa-circle-question ml-2 text-primary text-xs"></i>
              </el-tooltip>
            </div>
            <input
              v-model="form.name"
              class="input"
              type="text"
              placeholder="Escribe el nombre del producto"
            />
            <InputError :message="form.errors.name" />
          </div>

          <div class="mt-2">
            <InputLabel value="Categría*" class="ml-3 mb-1" />
            <el-select
              v-model="form.category"
              clearable
              placeholder="Seleccione"
              no-data-text="No hay opciones disponibles"
              no-match-text="No se encontraron coincidencias"
            >
              <el-option
                v-for="category in categories"
                :key="category"
                :label="category.name"
                :value="category.name"
              />
            </el-select>
            <InputError :message="form.errors.category" />
          </div>

          <div class="flex items-center space-x-4 mt-3">
            <div class="relative">
              <InputLabel value="Precio*" class="ml-3 mb-1" />
              <input
                v-model="form.price"
                step="0.01"
                class="input pl-7"
                type="number"
                placeholder="0"
              />
              <p
                class="text-sm text-secondary absolute top-[26px] left-2 border-r border-secondary pr-[5px] py-[5px]"
              >
                $
              </p>
              <InputError :message="form.errors.price" />
            </div>

            <div class="relative">
              <div class="flex items-center">
                <InputLabel value="Precio con descuento" class="ml-3 mb-1" />
                <el-tooltip
                  content="Agregar el precio solo si el artículo tiene descuento"
                  placement="right"
                >
                  <i class="fa-regular fa-circle-question ml-2 text-primary text-xs"></i>
                </el-tooltip>
              </div>
              <input
                v-model="form.discount_price"
                step="0.01"
                class="input pl-7"
                type="number"
                placeholder="0"
              />
              <p
                class="text-sm text-secondary absolute top-[26px] left-2 border-r border-secondary pr-[5px] py-[5px]"
              >
                $
              </p>
              <InputError :message="form.errors.discount_price" />
            </div>
          </div>
        </div>
      </div>
      <div class="flex justify-end items-center space-x-2">
        <el-popconfirm
          confirm-button-text="Si"
          cancel-button-text="No"
          icon-color="#D90537"
          title="¿Eliminar?"
          @confirm="deleteProduct"
        >
          <template #reference>
            <i
              @click.stop=""
              class="fa-regular fa-trash-can text-sm text-white cursor-pointer py-1 px-2 rounded-full bg-black"
            ></i>
          </template>
        </el-popconfirm>
        <PrimaryButton :disabled="form.processing" @click="update">Actualizar</PrimaryButton>
      </div>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Back from "@/Components/MyComponents/Back.vue";
import InputFilePreview from "@/Components/MyComponents/InputFilePreview.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import { useForm } from "@inertiajs/vue3";

export default {
  data() {
    const form = useForm({
      name: this.product.name,
      category: this.product.category,
      price: this.product.price,
      discount_price: this.product.discount_price,
      image_cover1: this.product.media[0],
      image_cover2: this.product.media[1],
      clearedCover1: false,
      clearedCover2: false,
    });
    return {
      form,
      currentImage: 1,
    };
  },
  components: {
    AppLayout,
    PrimaryButton,
    InputFilePreview,
    InputLabel,
    InputError,
    Back,
  },
  props: {
    product: Object,
    categories: Array,
  },
  methods: {
    update() {
      if (this.form.image_cover1 != null || this.form.image_cover1 != null) {
        this.form.post(route("products.update-with-media", this.product.id), {
          method: "_put",
          onSuccess: () => {
            this.$notify({
              title: "Correcto",
              message: "Se ha editado el producto",
              type: "success",
            });
          },
        });
      } else {
        this.form.put(route("products.update", this.product.id), {
          onSuccess: () => {
            this.$notify({
              title: "Correcto",
              message: "Se ha editado el producto",
              type: "success",
            });
          },
        });
      }
    },
    deleteProduct() {
      this.$inertia.delete(route("products.destroy", this.product.id));
      this.$notify({
        title: "Correcto",
        message: "Se ha eliminado el producto",
        type: "success",
      });
    },
    getMediaUrl(collectionName) {
        const media = this.product.media.find(img => img.collection_name === collectionName);
        return media ? media.original_url : null;
    },
  },
};
</script>
