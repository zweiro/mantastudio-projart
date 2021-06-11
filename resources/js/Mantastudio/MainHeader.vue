<template>
  <ul class="w-full flex items-center justify-between sm:justify-between fixed top-0 h-20 border-t-2 border-gray-500 px-5 sm:px-10 mantacolor">
        <li>
            <span v-if="notiftoread" class="absolute h-3 w-3">
                <span id="animate-notif" class="notif left-4 animate-ping absolute inline-flex h-3 w-3 rounded-full bg-purple-400 opacity-75"></span>
                <span class="notif left-4 relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span>
            </span>
            <img src="/images/header/bell.svg" alt="notifications" id="notifications">
        </li>
      <li><inertia-link href="/start"><img src="/images/header/logo_reponzi.svg" alt="menu de l'application reponzi" id="logo"></inertia-link></li>
      <li>Profil</li>
  </ul>
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