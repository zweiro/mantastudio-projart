<template>
    <a class="card relative mr-4 w-48">
            <div class="absolute top-0 left-0 pt-2 ml-2 text-center text-xl font-bold">
                {{categoryName}}
            </div>
        <img class="" :src="src" :alt="alt">
    </a>
</template>

<script>
export default {
    props: {
        src: String,
        alt: String,
        categoryName: String,
    },
    setup(props) {  
        return {
            src: props.src,
            alt: props.alt,
            categoryName: props.categoryName,
        }
    },

}
</script>

<style scoped>
    .manta-pink{
        background-color: #F396A1;
    }

    .manta-lightgray{
        background-color: #F0EFF0;
    }

    .grayText {
        color: #6F6F6F;
    }

    .card {
        flex: 0 0 auto;
    }
</style>