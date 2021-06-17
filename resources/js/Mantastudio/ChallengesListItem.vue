<template>
    <div class="flex grayBackground py-2 items-cente m-auto border-t-2 border-black">
        <img class="flex-none w-12 h-12 ml-4 bg-gray-800 rounded-full" :src="avatar" alt="avatar"/>
        <div class="flex-grow h-12 text-center text-xl font-medium flex flex-col justify-center items-start">
            <div class="ml-4">{{username}}</div>
        </div>
        <a :href="game">
            <img class="flex-none w-12 h-12 mr-4" src="/images/friendlist/vunoir.svg"/>
        </a>
    </div>
</template>

<script>
import { computed, ref } from 'vue'

export default {
    props: {
        avatar: String,
        username: String,
        link: String,
        gameId: Number,
    },
    setup(props) { 
        const game = computed(() => "/play/" + props.gameId);
        return {
            avatar: props.avatar,
            username: props.username,
            gameId: props.gameId,
            game
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