<template>
    <label :for="name" class="font-bold">{{label}}</label>
    <div class="focus-within:border-blue-400 flex items-center border-b-2 border-black mb-10 mt-2">   
        <select :name="name" :value="modelValue" @change="$emit('update:modelValue', +$event.target.value)" class="form-select appearance-none bg-transparent border-none w-full text-gray-700 p-0">
            <slot></slot>
        </select>
    </div>
</template>

<script>
export default {
    props: {
        name: String,
        label: String,
        modelValue: Number,
    },
    emits: ['update:modelValue'],
    setup(props) {  
        return {
            name: props.name,
            label: props.label
        }
    }
    
}
</script>

<style scoped>
    .form-select:focus {
            border-color: inherit;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
</style>