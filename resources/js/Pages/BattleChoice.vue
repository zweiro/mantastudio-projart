<template>
    <div>
        <h1 class="text-4xl mx-auto text-center">Duel</h1>
        <inertia-link :href="'/start/category/' + randomId(users)" method="get">
            <manta-primary-button class="mt-8">Aléatoire</manta-primary-button>
        </inertia-link>
        <manta-form-search @filter="filterFriends()" id="search" class="mt-4 mb-4" placeholder="Rechercher un ami" name="friend"></manta-form-search>
        <manta-friends-list-item v-for="friend in friends" avatar="/images/avatar/photoPasseportMarmotte.svg" :link="'/start/category/' + friend.id" :key="friend.id" :src="friend.avatar" :username="friend.username" :friendId="+friend.id">
        </manta-friends-list-item>
    </div>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import MantaPrimaryButton from '../Mantastudio/PrimaryButton'
    import { usePage } from '@inertiajs/inertia-vue3'
    import Layout from '../Layouts/AppLayout.vue'
    import MantaFormSearch from '../Mantastudio/FormSearch'
    import MantaFriendsListItem from '../Mantastudio/FriendsListItem'
    import MantaCategoryItem from '../Mantastudio/CategoryItem'
    import MantaCategoryContainer from '../Mantastudio/CategoryContainer'
    import { computed, ref } from 'vue'

    export default {
        layout: Layout,
        components: {
            JetAuthenticationCard,
            MantaPrimaryButton,
            MantaFormSearch,
            MantaFriendsListItem ,
            MantaCategoryItem,
            MantaCategoryContainer

        },
        setup(props) {
            const friends = usePage().props.value.friends;
            const friendList = usePage().props.value.friends;
            const users = usePage().props.value.users;
            const currentUser = usePage().props.value.user;
            return {
                friends: ref(friends),
                friendList,
                users,
                currentUser,
            }
        },
        data() {
            return {
                form: this.$inertia.form({
                    city_id: 2,
                    opponent_id: 2
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('game'));
            },
            randomId() {
                let randomId = null;
                do {
                    randomId = this.users[Math.floor(Math.random()*this.users.length)];
                } while (randomId.id == this.currentUser);
                return randomId.id;
            },
            filterFriends(){
                let content = document.getElementById("search").value;
                const filteredFriends = this.friendList.filter(friend => friend.username.includes(content));
                if(content == "") {
                    this.friends = this.friendList;
                }
                else {
                    this.friends = filteredFriends;
                }
                
            }
        }
    }
</script>

