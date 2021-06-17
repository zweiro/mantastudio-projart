<template>
    <div class="flex">
        <div class="flex-1">
            <div class="mx-auto mb-8">
                <div class="flex 1 text-xl uppercase text-center items-center justify-center">{{username1}}</div>
            </div>
        </div>
        <div class="flex-1">
            <div class="mx-auto mb-8">
                <div class="flex 1 text-xl uppercase text-center items-center justify-center">{{username2}}</div>
            </div>
        </div>
    </div>
    <div class="flex">
        <div class="flex-1">
            <div class="mx-auto mb-8">
                <img class="mx-auto w-32 h-32 bg-gray-800 rounded-full" :src="avatar" alt="avatar"/>
            </div>

        </div>
        <div class="flex-1">
            <div class="mx-auto mb-8">
                <img class="mx-auto w-32 h-32 bg-gray-800 rounded-full" :src="avatar" alt="avatar"/>
            </div>
        </div>
    </div>
    <div class="flex">
        <div class="flex-1">
            <div class="mx-auto mb-8">
                <div class="flex 1 text-xl font-semibold text-center items-center justify-center">{{ score }} / {{ total }}</div>
            </div>
        </div>
        <div class="flex-1">
            <div class="mx-auto mb-8">
                <div class="flex 1 text-xl font-semibold text-center items-center justify-center">{{ score }} / {{ total }}</div>
            </div>
        </div>
    </div>
    
</template>

<script>
export default {
    props: {
        avatar: String,
        score: String,
        total: String,
        username1: String,
        username2: String,
    },
    setup(props) {  
        return {
            avatar: props.avatar,
            score: props.score,
            total: props.total,
            username1: props.username1,
            username2: props.username2
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