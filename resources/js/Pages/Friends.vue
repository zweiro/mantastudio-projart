<template>
    <div>
        <h1 class="text-4xl mx-auto text-center mb-16">Mode de jeu</h1>
        <inertia-link href="/start/category" method="get">
            <manta-primary-button class="mt-8">Solo</manta-primary-button>
        </inertia-link>
        <inertia-link href="/start/battle" method="get">
            <manta-primary-button class="mt-8 inversedPrimaryButtonColor">Duel</manta-primary-button>
        </inertia-link>
        <manta-tabs-menu tab1="Liste" tab2="Activités" tab3="Demandes">
            <template v-slot:content1>
                <manta-tabs-item>
                    <manta-form-search @filter="filterFriends()" id="searchFriends" class="mt-4 mb-4" placeholder="Rechercher un ami" name="friend"></manta-form-search>
                    <manta-friends-list-item v-for="friend in friends" link="/start/category" :key="friend.id" :src="friend.avatar" :username="friend.username" :friendId="+friend.id">
                    </manta-friends-list-item>
                </manta-tabs-item>
            </template>
            <template v-slot:content2>
                <manta-tabs-item>
                    Activités
                </manta-tabs-item>
            </template>
            <template v-slot:content3>
                <manta-tabs-item>
                    <manta-tabs-item>
                    <manta-form-search @filter="filterUsers()" id="searchUsers" class="mt-4 mb-4" placeholder="Rechercher un utilisateur" name="user"></manta-form-search>
                    <manta-users-list-item v-for="user in users" link="/start/category" :key="user.id" :src="user.avatar" :username="user.username" :userId="+user.id">
                    </manta-users-list-item>
                </manta-tabs-item>
                </manta-tabs-item>
            </template>
        </manta-tabs-menu>
        
    </div>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import MantaPrimaryButton from '../Mantastudio/PrimaryButton'
    import { usePage } from '@inertiajs/inertia-vue3'
    import Layout from '../Layouts/AppLayout.vue'
    import MantaTabsMenu from '../Mantastudio/TabsMenu'
    import MantaTabsItem from '../Mantastudio/TabsItem'
    import MantaFriendsListItem from '../Mantastudio/FriendsListItem'
    import MantaUsersListItem from '../Mantastudio/UsersListItem'
    import MantaFormSearch from '../Mantastudio/FormSearch'
    
    
    import { computed, ref } from 'vue'

    export default {
        layout: Layout,
        components: {
            JetAuthenticationCard,
            MantaPrimaryButton,
            MantaTabsMenu,
            MantaTabsItem,
            MantaFriendsListItem,
            MantaFormSearch,
            MantaUsersListItem

        },
        setup(props) {
            const friends = usePage().props.value.friends;
            const friendList = usePage().props.value.friends;
            const users = null;
            const userList = usePage().props.value.users;
            return {
                friends: ref(friends),
                friendList,
                userList,
                users: ref(users),
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
                console.log('Hello!');
                this.form.post(this.route('game'));
            },
            filterFriends(){
                let content = document.getElementById("searchFriends").value;
                const filteredFriends = this.friendList.filter(friend => friend.username.includes(content));
                if(content == "") {
                    this.friends = this.friendList;
                }
                else {
                    this.friends = filteredFriends;
                }
                
            },
            filterUsers(){
                let content = document.getElementById("searchUsers").value;
                console.log(content);
                const filteredUsers = this.userList.filter(user => user.username.includes(content));
                if(content == "") {
                    this.users = null;
                }
                else {
                    this.users = filteredUsers;
                    console.log("not empty");
                }
                
            }
            
            
        }
    }
</script>

