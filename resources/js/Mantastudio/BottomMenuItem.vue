<template>
  <li class="h-full p-4" :class="{ isActive: active }">
      <inertia-link :href="link">
        <img 
        class="inline-block align-middle" 
        :src="src" 
        :alt="alt" 
        style="height:50px;"
        >
      </inertia-link>
      
  </li>
</template>

<script>
export default {
    props: {
        src: String,
        alt: String,
        link: String,
        active: {
            type: Boolean,
            default: false
        }
    },
    setup(props) {
        return {
            src: props.src,
            alt: props.alt,
            active: props.active,
            link: props.link
        }
    }
    
}
</script>

<style scoped>
    li {
        color:tomato;
    }
    li:hover{
        background-color:#F0EFF0;
        cursor: pointer;
    }
    .isActive {
        background-color: #F0EFF0;
    }

    .isActive img{
        filter: invert(61%) sepia(54%) saturate(272%) hue-rotate(144deg) brightness(94%) contrast(92%);
    }
</style>