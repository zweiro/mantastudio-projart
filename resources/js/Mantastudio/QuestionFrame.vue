<template>
    <div class="overflow-hidden h-4 my-4 text-xs flex rounded-full manta-lightgray">
            <div :style="progressWidth()" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center manta-blue"></div>
            </div>
    <div class="border-4 questionFrame h-44">
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
    },
    methods: {
        progressWidth(){
            return 'width:' + this.currentNumber + '0%';
        }
    }
    
}
</script>

<style scoped>
    .questionFrame {
        border-color: #F396A1;
    }

    .grayText {
        color: #6F6F6F;
    }

    .manta-blue{
        background-color: #6AAEBE;
    }

    .manta-lightgray{
        background-color: #F0EFF0;
    }
</style>