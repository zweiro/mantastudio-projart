<template>
    <div class="flex grayBackground py-2 items-cente m-auto border-t-2 border-black">
        <img class="flex-none w-12 h-12 ml-4 bg-gray-800 rounded-full" :src="avatar" alt="avatar"/>
        <div class="flex-grow h-12 text-center text-xl font-medium flex flex-col justify-center items-start">
            <div class="ml-4">{{username}}</div>
        </div>
        <inertia-link @click="$emit('removeUser')" :href="link" method="post" :data="{ user: userId }">
            <img class="flex-none w-12 h-12 mr-4" src="/images/friendlist/plusnoir.svg"/>
        </inertia-link>
    </div>
</template>

<script>
export default {
    props: {
        avatar: String,
        username: String,
        link: String,
        userId: Number
    },
    setup(props) {  
        return {
            avatar: props.avatar,
            username: props.username,
            link: props.link,
            userId: props.userId
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