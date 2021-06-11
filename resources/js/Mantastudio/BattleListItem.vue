<template>
    <div class="flex grayBackground py-2 items-cente m-auto border-b-2 border-t-2 border-black">
        <img class="flex-none w-12 h-12 ml-4 bg-gray-800 rounded-full" :src="avatar" alt="avatar"/>
        <div class="flex-grow h-12 text-center text-3xl font-semibold flex flex-col justify-center items-start ml-4">{{username}}</div>
    </div>
</template>

<script>
export default {
    props: {
        avatar: String,
        username: String
    },
    setup(props) {  
        return {
            avatar: props.avatar,
            username: props.username
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