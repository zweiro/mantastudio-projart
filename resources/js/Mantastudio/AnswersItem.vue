<template>
    <button class="flex-shrink-0 h-32 w-32 border-4 answer mt-6 text-xl mx-4 flex flex-col justify-center items-start" :class="{ isRight: rightAnswer, isWrong: wrongAnswer }">
        <div class="mx-auto">
            <slot></slot>
        </div>
    </button>
</template>

<script>
export default {
    props: {
        rightAnswer: {
        type: Boolean,
        default: false
        },
        wrongAnswer: {
        type: Boolean,
        default: false
        },
    },
    setup(props) {  
        return {
            rightAnswer: props.rightAnswer,
            wrongAnswer: props.wrongAnswer
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
    .isWrong {
        border-color: #F35D51;
        background-color: #F35D51;
    }

    .grayText {
        color: #6F6F6F;
    }

    button:focus { outline:0 !important; }
</style>