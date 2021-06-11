<template>
    <div class="flex grayBackground py-2 items-cente m-auto border-b-2 border-t-2 border-black">
        <img class="flex-none w-12 h-12 ml-4 bg-gray-800 rounded-full" :src="avatar" alt="avatar"/>
        <div class="ml-4 flex-grow h-12 text-center font-semibold flex flex-col justify-start items-start">{{activity}}</div>
        <div class="mr-4 flex-none w-20 h-12 text-center text-xs flex flex-col justify-end items-end">{{date}}</div>
    </div>
</template>

<script>
export default {
    props: {
        activity: String,
        avatar: String,
        username: String,
        date: String
    },
    setup(props) {  
        return {
            activity: props.activity,
            avatar: props.avatar,
            username: props.username,
            date: props.date
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