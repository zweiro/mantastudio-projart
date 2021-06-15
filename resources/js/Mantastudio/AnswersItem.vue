<template>
    <button @click="$emit('response')" class="disabled:opacity-50 flex-shrink-0 h-16 w-full border-4 answer mb-6 text-lg mx-2 flex flex-col justify-center items-start" :class="{ isRight: rightAnswer, isWrong: wrongAnswer }">
        <div class="mx-auto">
            <slot></slot>
        </div>
    </button>
</template>

<script>
import { computed } from 'vue'

export default {
    emits:['response'],
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
            rightAnswer: computed(()=>props.rightAnswer),
            wrongAnswer: computed(()=>props.wrongAnswer)
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