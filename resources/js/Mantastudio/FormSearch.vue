<template>
    <div class="focus-within:border-blue-400 border-gray-700 flex items-center mb-10 mt-2 rounded-full border-2 w-full">   
        <input :name="name" class="border-none flex-grow form-input py-3 px-6 bg-transparent text-gray-700 p-0 leading-tight" :placeholder="placeholder" type="search">
        <button class="flex-none w-16 rounded-l-full py-3"><img src="/images/form/loupe.svg" class="block m-auto	w-1/2 h-8"></button>
    </div>
</template>


<script>
export default {
    props: {
        name: String,
        placeholder: String,
    },
    setup(props) {
        return {
            name: props.name,
            placeholder: props.placeholder
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

    button:focus { outline:0 !important; }
</style>