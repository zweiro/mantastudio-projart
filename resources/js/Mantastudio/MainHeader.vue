<template>
    <div class="fixed top-0 w-full">
        <ul class="flex items-center justify-between sm:justify-between h-20 px-5 sm:px-10 mantacolor">
                <li @click="toggleNotif">
                    <span v-if="notiftoread" class="absolute h-3 w-3">
                        <span id="animate-notif" class="notif left-4 animate-ping absolute inline-flex h-3 w-3 rounded-full bg-purple-400 opacity-75"></span>
                        <span class="notif left-4 relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span>
                    </span>
                    <img src="/images/header/bell.svg" alt="notifications" id="notifications">
                </li>
            <li><inertia-link href="/start"><img src="/images/header/logo_reponzi.svg" alt="menu de l'application reponzi" id="logo"></inertia-link></li>
            <li class="cursor-pointer" @click="toggleProfile" ><img class="w-10 h-10 rounded-full" src="/images/avatar/photoPasseportMarmotte.svg" alt="Image de l'avatar"></li>
        </ul>
        <div v-show="isNotifToggled" class="fixed inset-0 z-40" @click="toggleNotif()"></div>
            <ul v-show="isNotifToggled" class="overflow-auto max-h-96 fixed z-50 border-b-2 sm:border-r-2 border-gray-300 w-full sm:w-1/2 lg:w-1/4 divide-y divide-light-gray-400">
                <slot></slot>
            </ul>
        <div v-show="isProfileToggled" class="fixed inset-0 z-40" @click="toggleProfile()"></div>
        <ul v-show="isProfileToggled" class="fixed z-50 border-b-2 sm:border-l-2 border-gray-300 w-full sm:w-1/4 lg:w-1/6 right-0 divide-y divide-light-gray-400">
            <li class="p-4 profileLink">Mon profil</li>
            <li @click="logout()" class="p-4 profileLink">Me déconnecter</li>
        </ul>
    </div>
</template>

<script>
import {ref} from 'vue';

export default {
    props: {
        notiftoread: {
            type: Boolean,
            default: false
        }
    },
    setup(props) {
        const isProfileToggled = ref(false);
        const isNotifToggled = ref(false);
        return {
            notiftoread: props.notiftoread,
            isProfileToggled,
            isNotifToggled,
        }
    },
    methods: {
        toggleProfile() {
            this.isProfileToggled = !this.isProfileToggled;
        },
        toggleNotif() {
            this.isNotifToggled = !this.isNotifToggled;
        },
        logout() {
            this.$inertia.post(route('logout'));    
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
    .profileLink:hover{
        background-color:#F0EFF0;
        cursor: pointer;
    }
</style>