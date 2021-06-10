<template>
    <div>
        <label :for="name" class="font-bold">{{label}}</label>
        <div class="focus-within:border-blue-400 flex items-center border-b-2 border-black mb-10 mt-2">   
            <input 
                :name="name" 
                class="form-input appearance-none bg-transparent border-none w-full text-gray-700 p-0 leading-tight" 
                :type="type" 
                :value="modelValue"
                :autocomplete="autoComplete()"
                @input="$emit('update:modelValue', $event.target.value)"
            >
        </div>
    </div>
</template>

<script>
export default {
    props: {
        name: String,
        type: String,
        label: String,
        modelValue: String,
    },
    emits: ['update:modelValue'],
    setup(props) {
        return {
            name: props.name,
            type: props.type,
            label: props.label
        }
    },
    methods: {
        autoComplete() {
            switch(this.type) {
                case 'password':
                    return 'new-password';
                default:
                    return 'off';
            }
        }
    },
    
}
</script>

<style scoped>
    .form-input:focus {
            border-color: inherit;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

</style>