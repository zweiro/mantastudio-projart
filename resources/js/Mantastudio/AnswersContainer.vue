<template>
        <div class="flex flex-wrap place-content-center">
            <slot></slot>
        </div>
</template>

<script>
export default {
    props: {
    },
    setup(props) {  
        return {

        }
    }
    
}
</script>

<style scoped>
    .answer {
        border-color: #F396A1;
        background-color: #F0EFF0;
    }

    .isRight {
        border-color: #669966;
        background-color: #669966;
    }

    .grayText {
        color: #6F6F6F;
    }

    button:focus { outline:0 !important; }
</style>