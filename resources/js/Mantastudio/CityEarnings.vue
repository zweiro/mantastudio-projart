<template>
<div class="text-3xl font-semibold">{{cityName}}</div>
<div class="flex py-2 m-auto">
        <div class="flex-none w-12 h-12 ml-4 text-lg font-semibold">+ {{points}} </div>
            <div class="relative w-full">
                <div class="overflow-hidden h-8 mb-4 text-xs flex rounded-full manta-lightgray">
                    <div :style="progressWidth()" class="text-2xl shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center manta-blue"></div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    props: {
        points: Number,
        cityName: String,
        purcent: Number,
    },
    setup(props) {  
        return {
            points: props.points,
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
    .manta-blue{
        background-color: #6AAEBE;
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