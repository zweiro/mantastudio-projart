<template>
        <div class="flex flex-nowrap overflow-x-auto container mt-14">
            <slot></slot>
        </div>
</template>



<script>
</script>

<style>
    .container{
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar;
    }

    .container::-webkit-scrollbar {
        display: none;
    }
</style>