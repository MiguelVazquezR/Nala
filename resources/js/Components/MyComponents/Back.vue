<template>
  <button @click="goBack" class="flex justify-center items-center rounded-full size-5 focus:outline-none hover:bg-black hover:text-white">
        <i class="fa-solid fa-angle-left text-xs"></i>
  </button>
</template>

<script>
export default {
  methods: {
    goBack() {
      // Puedes personalizar esta lógica según tus necesidades
      // En este ejemplo, se utiliza la función history.back() para retroceder una página
      window.history.back();
    },
  },
};
</script>
