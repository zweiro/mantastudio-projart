<template>
  <ul class="w-full flex justify-evenly sm:justify-center fixed bottom-0 h-16 border-t-2 border-gray-500">
      <bottom-menu-item>Test 1</bottom-menu-item>
      <bottom-menu-item>Test 2</bottom-menu-item>
      <bottom-menu-item>Test 3</bottom-menu-item>
      <bottom-menu-item>Test 4</bottom-menu-item>
  </ul>
</template>

<script>
import BottomMenuItem from './BottomMenuItem'

export default {
    mounted() {
        console.log("MantaStudio menu mounted!");
    },
    components: {
        BottomMenuItem,
    }
}
</script>

<style>
    
</style>