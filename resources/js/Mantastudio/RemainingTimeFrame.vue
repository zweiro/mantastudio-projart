<template>
    <div class="grayBackground py-8">
        <div class="text-center text-xl mx-14 grayText">
            Temps restant avant la prochaine saison :
        </div>
        <div class="text-center text-3xl font-bold grayText">
            {{remainingTime}}  
        </div>
    </div>
</template>

<script>
export default {
    props: {
        remainingTime: String,
    },
    setup(props) {  
        return {
            remainingTime: props.remainingTime,
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