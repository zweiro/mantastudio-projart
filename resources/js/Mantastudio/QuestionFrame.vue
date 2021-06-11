<template>
    <div class="grayBackground h-44">
        <div class="pt-2 text-center text-sm font-bold">
            {{currentNumber}}/{{totalNumber}}
        </div>
        <div class="mt-6 text-center text-2xl mx-4 flex flex-col justify-center items-start">
            {{question}}
        </div>
        
    </div>
</template>

<script>
export default {
    props: {
        currentNumber: String,
        totalNumber: String,
        question: String
    },
    setup(props) {  
        return {
            currentNumber: props.currentNumber,
            totalNumber: props.totalNumber,
            question: props.question
        }
    }
    
}
</script>

<style scoped>
    .grayBackground {
        background-color: #F0EFF0;
    }

    .grayText {
        color: #6F6F6F;
    }
</style>