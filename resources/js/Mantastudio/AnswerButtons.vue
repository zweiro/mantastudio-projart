<template>
    <div class="h-44" flex flex-col>
        <div class="flex flex-row place-content-center">
            <button class="p-14 border-4 answer mt-6 text-center text-2xl mx-4 flex flex-col justify-center items-start">
                {{answer1}}
            </button>
            <button class="p-14 border-4 answer mt-6 text-center text-2xl mx-4 flex flex-col justify-center items-start">
                {{answer2}}
            </button>
        </div>
        <div class="flex flex-row place-content-center">
            <button class="p-14 border-4 answer mt-6 text-center text-2xl mx-4 flex flex-col justify-center items-start">
                {{answer3}}
            </button>
            <button class="p-14 border-4 answer mt-6 text-center text-2xl mx-4 flex flex-col justify-center items-start">
                {{answer4}}
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        answer1: String,
        answer2: String,
        answer3: String,
        answer4: String
    },
    setup(props) {  
        return {
            answer1: props.answer1,
            answer2: props.answer2,
            answer3: props.answer3,
            answer4: props.answer4
        }
    }
    
}
</script>

<style scoped>
    .answer {
        border-color: #F396A1;
        background-color: #F0EFF0;
    }

    .grayText {
        color: #6F6F6F;
    }

    button:focus { outline:0 !important; }
</style>