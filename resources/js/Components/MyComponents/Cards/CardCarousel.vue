<template>
    <div class="carousel-container">
        <div ref="carousel" class="carousel-track"
            :style="{ transform: `translateX(${translateValue}px)`, transition: `transform ${slidingAnimationTimeInMs}ms ease-in-out` }">
            <slot></slot>
        </div>

        <button @click="prevSlide" class="carousel-button prev">&lt;</button>
        <button @click="nextSlide" class="carousel-button next">&gt;</button>

        <div v-if="withPagination" class="pagination">
            <span v-for="(item, index) in totalPages" :key="index" @click="goToSlide(index)"
                :class="{ active: index === currentPage }"></span>
        </div>
    </div>
</template>
  
<script>
export default {
    props: {
        itemsPerSlide: {
            type: Number,
            default: 4,
        },
        itemMarginRightInPx: {
            type: Number,
            default: 5,
        },
        withPagination: {
            type: Boolean,
            default: false,
        },
        slidingAnimationTimeInMs: {
            type: Number,
            default: 1000,
        },
        minDraggingDisplacementInPx: {
            type: Number,
            default: 20,
        },
    },
    data() {
        return {
            currentPage: 0,
            translateValue: 0,
        };
    },
    computed: {
        totalPages() {
            return Math.ceil(this.$slots.default.length / this.itemsPerSlide);
        },
    },
    methods: {
        prevSlide() {
            this.goToSlide(this.currentPage - 1);
        },
        nextSlide() {
            this.goToSlide(this.currentPage + 1);
        },
        goToSlide(index) {
            if (index < 0) {
                index = this.totalPages - 1;
            } else if (index >= this.totalPages) {
                index = 0;
            }

            this.currentPage = index;
            this.translateValue = -index * this.getSlideWidth();
        },
        getSlideWidth() {
            const containerWidth =
                this.$refs.carousel.offsetWidth - this.itemsPerSlide * this.itemMarginRightInPx;
            return containerWidth / this.itemsPerSlide;
        },
    },
};
</script>
  
<style scoped>
/* Estilos para tu carrusel, ajusta según tus necesidades */
.carousel-container {
    position: relative;
    overflow: hidden;
}

.carousel-track {
    display: flex;
}

.carousel-button {
    position: absolute;
    top: 50%;
    font-size: 1.5em;
    background-color: #000;
    color: #fff;
    border: none;
    cursor: pointer;
    padding: 10px;
}

.prev {
    left: 10px;
}

.next {
    right: 10px;
}

.pagination {
    margin-top: 10px;
    display: flex;
    justify-content: center;
}

.pagination span {
    margin: 0 5px;
    cursor: pointer;
    display: inline-block;
    width: 10px;
    height: 10px;
    background-color: #ccc;
    border-radius: 50%;
}

.pagination span.active {
    background-color: #000;
}
</style>
  