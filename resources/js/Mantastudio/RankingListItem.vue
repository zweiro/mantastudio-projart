<template>
    <div class="flex grayBackground py-2 items-cente m-auto border-b-2 border-t-2 border-black">
        <div class="flex-none w-12 h-12 text-center text-3xl flex flex-col justify-center font-semibold">#{{rank}}</div>
        <img class="flex-none w-12 h-12 ml-4 bg-gray-800 rounded-full" :src="avatar" alt="avatar"/>
        <div class="ml-4 flex-grow h-12 text-center text-xl font-medium flex flex-col justify-center items-start">{{username}}</div>
        <div class="mr-4 flex-none w-20 h-12 text-center text-xl font-medium flex flex-col justify-center items-end">{{points}} Pts</div>
    </div>
</template>

<script>
export default {
    props: {
        rank: String,
        avatar: String,
        username: String,
        points: String
    },
    setup(props) {  
        return {
            rank: props.rank,
            avatar: props.avatar,
            username: props.username,
            points: props.points
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