<template>
    <button class="mx-auto flex rounded-full border-2 justify-center items-center shadow-md pushed text-white border-none w-60 h-10 text-xl button_background primary-button-color focus:ring-2 focus:ring-blue-400 focus:border-transparent" :class="{ primaryButtonColor: !inverseColor, inversedPrimaryButtonColor: inverseColor }">
        <slot></slot>
    </button>
</template>

<script>

export default {
    props: {
        inverse: {
            type: Boolean,
            default: false
        }
    },
    setup(props) {
        return {
            inverseColor: props.inverse
        }
    }
}

</script>

<style scoped>


    .primaryButtonColor {
        background: linear-gradient(90deg, rgba(106,174,190,1) 0%, rgba(243,150,161,1) 100%);
    }
    
    .inversedPrimaryButtonColor {
        background: linear-gradient(90deg, rgba(243,150,161,1) 0%, rgba(106,174,190,1) 100%);
    }

    button:focus { outline:0 !important; }

    .pushed:active {
    box-shadow: 0px 2px 2px #c0c0c0;
    transform: translateY(0.25em);
    }

    
</style>