<template>
    <AppLayout title="Nuevo producto">
        <div v-if="products_quantity < 50 " class="lg:w-2/3 mx-auto rounded-md lg:border border-secondary p-5">
            <h1 class="font-bold text-lg text-center lg:text-left">Agregar producto</h1>
            <div class="lg:grid grid-cols-3 space-x-3 mt-3">
                <div>
                    <InputFilePreview v-show="currentImage == 1" @imagen="this.form.image_cover1 = $event;" />
                    <InputFilePreview v-show="currentImage == 2" @imagen="this.form.image_cover2 = $event;" />
                    <p class="text-center mt-2">
                        <i @click="currentImage = currentImage - 1" v-if="currentImage == 2" class="fa-solid fa-angle-left text-xs mr-2 cursor-pointer p-1"></i>
                        Imagen {{ currentImage }} de 2
                        <i @click="currentImage = currentImage + 1" v-if="currentImage == 1" class="fa-solid fa-angle-right text-xs ml-2 cursor-pointer p-1"></i>
                    </p>
                </div>

                <div class="col-span-2">
                    <div class="mt-3">
                        <div class="flex items-center">
                            <InputLabel value="Nombre del producto*" class="ml-3 mb-1" />
                            <el-tooltip content="Escribe el nombre y una breve descripción del producto, este se mostrará en la vista de la sección de los productos" placement="top">
                                <i class="fa-regular fa-circle-question ml-2 text-primary text-xs"></i>
                            </el-tooltip>
                        </div>
                        <input v-model="form.name" class="input" type="text" placeholder="Escribe el nombre del producto" />
                        <InputError :message="form.errors.name" />
                    </div>

                    <div class="mt-2">
                        <InputLabel value="Categría*" class="ml-3 mb-1" />
                        <el-select v-model="form.category" clearable placeholder="Seleccione"
                        no-data-text="No hay opciones disponibles" no-match-text="No se encontraron coincidencias">
                        <el-option v-for="category in categories" :key="category" :label="category.name" :value="category.name" />
                        </el-select>
                        <InputError :message="form.errors.category" />
                    </div>

                    <div class="flex items-center space-x-4 mt-3">
                        <div class="relative">
                            <InputLabel value="Precio*" class="ml-3 mb-1" />
                            <input v-model="form.price" step="0.01" class="input pl-7" type="number" placeholder="0" />
                            <p class="text-sm text-secondary absolute top-[26px] left-2 border-r border-secondary pr-[5px] py-[5px]">$</p>
                            <InputError :message="form.errors.price" />
                        </div>

                        <div class="relative">
                            <div class="flex items-center">
                                <InputLabel value="Precio con descuento" class="ml-3 mb-1" />
                                <el-tooltip content="Agregar el precio solo si el artículo tiene descuento" placement="right">
                                    <i class="fa-regular fa-circle-question ml-2 text-primary text-xs"></i>
                                </el-tooltip>
                            </div>
                            <input v-model="form.discount_price" step="0.01" class="input pl-7" type="number" placeholder="0" />
                            <p class="text-sm text-secondary absolute top-[26px] left-2 border-r border-secondary pr-[5px] py-[5px]">$</p>
                            <InputError :message="form.errors.discount_price" />
                        </div>
                    </div>
                </div>
            </div>
                <div class="text-right mt-7 lg:mt-0">
                    <PrimaryButton :disabled="form.processing" @click="store">Publicar</PrimaryButton>
                </div>
        </div>
        <div v-else class="text-center text-gray-500">
            <p class="text-3xl mb-3">¡Lo sentimos!</p>
            <p class="">Has excedido el límite de productos disponibles (50). Para poder aumentar el límite ponte en contacto con el equipo de DTW</p>
        </div>
    </AppLayout>
  
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Back from '@/Components/MyComponents/Back.vue';
import InputFilePreview from '@/Components/MyComponents/InputFilePreview.vue';
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import { useForm } from "@inertiajs/vue3";

export default {
data(){
     const form = useForm({
        name: null,
        category: null,
        price: null,
        discount_price: null,
        image_cover1: null,
        image_cover2: null,
    });
    return {
        form,
        currentImage: 1
    }
},
components:{
AppLayout,
PrimaryButton,
InputFilePreview,
InputLabel,
InputError,
Back
},
props:{
categories: Array,
products_quantity: Number
},
methods:{
    store() {
    this.form.post(route("products.store"), {
      onSuccess: () => {
        this.$notify({
          title: "Correcto",
          message: "Se ha agregado un nuevo producto",
          type: "success",
        });
      },
    });
  },

}
}
</script>
