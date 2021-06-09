<template>
    <label :for="name" class="font-bold">{{label}}</label>
    <div class="focus-within:border-blue-400 flex items-center border-b border-black mb-10 mt-2">   
        <input :name="name" class="form-input appearance-none bg-transparent border-none w-full text-gray-700 p-0 leading-tight" :type="type">
    </div>
</template>

// focus-within:border-blue-400

<script>
export default {
    props: {
        name: String,
        type: String,
        label: String
    },
    setup(props) {
        return {
            name: props.name,
            type: props.type,
            label: props.label
        }
    }
    
}
</script>

<style scoped>
    .form-input:focus {
            border-color: inherit;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

</style>