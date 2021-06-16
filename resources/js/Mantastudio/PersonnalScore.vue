<template>
    <div class="flex flex-col">
        <div class="mx-auto mb-8">
            <img class="mx-auto w-32 h-32 bg-gray-800 rounded-full" :src="avatar" alt="avatar"/>
        </div>
        <div class="mx-auto text-xl font-semibold">{{ score }} / {{ total }}</div>
    </div>
</template>

<script>
export default {
    props: {
        avatar: String,
        score: String,
        total: String,
    },
    setup(props) {  
        return {
            avatar: props.avatar,
            score: props.score,
            total: props.total
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