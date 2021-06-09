<template>
    <label :for="name" class="font-bold"><slot></slot></label>
    <div class="flex items-center border-b border-black mb-10 mt-2">   
        <input :name="name" class="appearance-none bg-transparent border-none w-full text-gray-700 p-0 leading-tight focus:outline-none" :type="type">
    </div>
</template>

<script>
export default {
    props: {
        name: String,
        type: String
    },
    setup(props) {
        return {
            name: props.name,
            type: props.type
        }
    }
    
}
</script>

<style scoped>

</style>