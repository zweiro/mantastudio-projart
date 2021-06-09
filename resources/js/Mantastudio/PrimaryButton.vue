<template>
    <button class="shadow-md pushed text-white border-none w-60 h-10 text-xl rounded-full button_background primary-button-color">
        <slot></slot>
    </button>
</template>

<script>

</script>

<style scoped>


    .primary-button-color {
        background: linear-gradient(90deg, rgba(106,174,190,1) 0%, rgba(243,150,161,1) 100%);
        
    }

    button:focus { outline:0 !important; }

    .pushed:active {
    background: linear-gradient(90deg, rgba(106,174,190,1) 0%, rgba(243,150,161,1) 100%);
    box-shadow: 0px 2px 2px #c0c0c0;
    transform: translateY(2px);
    } 
</style>