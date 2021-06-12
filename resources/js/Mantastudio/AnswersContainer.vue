<template>
        <div class="flex flex-wrap place-content-center">
            <!-- <button class="flex-1 h-36 border-4 answer mt-6 text-center text-2xl mx-4 flex flex-col justify-center items-start" :class="{ isRight: rightAnswer }">
                <div class="mx-auto">{{answer1}}</div>
            </button>
            <button class="flex-1 h-36 border-4 answer mt-6 text-center text-2xl mx-4 flex flex-col justify-center items-start" :class="{ isRight: rightAnswer }">
                <div class="mx-auto">{{answer2}}</div>
            </button>
            <button class="flex-1 h-36 border-4 answer mt-6 text-center text-2xl mx-4 flex flex-col justify-center items-start" :class="{ isRight: rightAnswer }">
                <div class="mx-auto">{{answer3}}</div>
            </button>
            <button class="flex-1 h-36 border-4 answer mt-6 text-center text-2xl mx-4 flex flex-col justify-center items-start" :class="{ isRight: rightAnswer }">
                <div class="mx-auto">{{answer4}}</div>
            </button> -->
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