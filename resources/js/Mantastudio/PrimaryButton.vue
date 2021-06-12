<template>
    <button :class="{ primaryButtonColor: !inverseColor, inversedPrimaryButtonColor: inverseColor }" class="shadow-md pushed text-white border-none w-60 h-10 text-xl rounded-full button_background primary-button-color focus:ring-2 focus:ring-blue-400 focus:border-transparent">
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
    background: linear-gradient(90deg, rgba(106,174,190,1) 0%, rgba(243,150,161,1) 100%);
    box-shadow: 0px 2px 2px #c0c0c0;
    transform: translateX(-50%);
    }

    
</style>