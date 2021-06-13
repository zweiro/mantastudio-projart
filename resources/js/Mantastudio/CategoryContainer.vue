<template>
        <h2 class="text-2xl font-semibold mt-12">Par catégorie</h2>
        <div class="flex flex-nowrap overflow-x-auto container mt-4">
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