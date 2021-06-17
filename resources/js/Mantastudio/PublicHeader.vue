<template>
  <div class="w-full flex items-center justify-center fixed top-0 h-20 border-t-2 border-gray-500 px-5 sm:px-10 mantacolor">
      <inertia-link href="/"><img src="/images/header/logo_reponzi.svg" alt="menu de l'application reponzi" id="logo"></inertia-link>
  </div>
</template>

<script>
export default {
    props: {
        notiftoread: {
            type: Boolean,
            default: false
        }
    },
    setup(props) {
        return {
            notiftoread: props.notiftoread
        }
    }
}
</script>

<style scoped>
    ul {
        background-color: #FEF9F7;
    }
    #logo {
        height: 30px;
    }
    #notifications {
        height: 30px;
        cursor: pointer;
    }
    #animate-notif {
        top: 0.3rem;
    }
    .notif {
        background-color: #6AAEBE;
    }
    .mantacolor {
        background-color: #FEF9F7;
    }
</style>