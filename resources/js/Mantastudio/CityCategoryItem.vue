<template>
    <a>
        <div class="relative w-5/12">
            <img class="" :src="src" :alt="alt">
            <div class="absolute top-0 left-0 pt-2 ml-2 text-center text-xl font-bold">
                {{cityName}}
            </div>    
        </div>
        <div class="relative w-5/12">
        <div class="overflow-hidden h-8 mb-4 text-xs flex rounded-b-lg manta-lightgray">
            <div :style="progressWidth()" class="text-2xl shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center manta-pink"></div>
                <div class="mx-auto flex flex-col justify-center item">{{purcent}}%</div>
            </div>
        </div>
    </a>
</template>

<script>
export default {
    props: {
        src: String,
        alt: String,
        cityName: String,
        purcent: String,
    },
    setup(props) {  
        return {
            src: props.src,
            alt: props.alt,
            cityName: props.cityName,
            purcent: props.purcent
        }
    },
    methods: {
        progressWidth(){
            return 'width:' + this.purcent + '%';
        }
    }

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
</style>