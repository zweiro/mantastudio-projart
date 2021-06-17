<template>
    <div>
        <manta-tabs-menu tab1="Liste" tab2="Défis" tab3="Demandes">
            <template v-slot:content1>
                <manta-tabs-item>
                    <h3 class="font-semibold text-lg">Liste d'amis</h3>
                    <manta-form-search @filter="filterFriends()" id="searchFriends" class="mt-4 mb-4" placeholder="Rechercher un ami" name="friend"></manta-form-search>
                    <manta-friends-list-item v-for="friend in friends" avatar="/images/avatar/photoPasseportMarmotte.svg" :link="'/start/category/' + friend.id" :key="friend.id" :src="friend.avatar" :username="friend.username" :friendId="+friend.id">
                    </manta-friends-list-item>
                </manta-tabs-item>
            </template>
            <template v-slot:content2>
                <manta-tabs-item>
                    <h3 class="font-semibold text-lg">Défis</h3>
                    <manta-challenges-list-item v-for="game in games" avatar="/images/avatar/photoPasseportMarmotte.svg" :key="game[0].game_id" :username="game[0].username" :gameId="game[0].game_id"></manta-challenges-list-item>
                    <h3 class="font-semibold text-lg mt-4">Historique des duels</h3>
                    <manta-archives-list-item v-for="archive in archives" avatar="/images/avatar/photoPasseportMarmotte.svg" :key="archive[0].game_id" :username="archive[0].username" :gameId="archive[0].game_id"></manta-archives-list-item>
                </manta-tabs-item>
                
            </template>
            <template v-slot:content3>
                <manta-tabs-item>
                    <manta-tabs-item>
                    <h3 class="font-semibold text-lg">Ajouter un ami</h3>
                    <manta-form-search @filter="filterUsers()" id="searchUsers" class="mt-4 mb-4" placeholder="Rechercher un utilisateur" name="user"></manta-form-search>
                    <manta-users-list-item  v-for="user in users" @removeUser="removeUser(user)" avatar="/images/avatar/photoPasseportMarmotte.svg" link="/friends/ask" :key="user.id" :src="user.avatar" :username="user.username" :userId="user.id"></manta-users-list-item>
                    <h3 class="font-semibold text-lg mt-4">Demandes d'amis</h3>
                    <manta-requests-list-item v-for="request in requests" @accept="acceptRequest(request)" @refuse="refuseRequest(request)" avatar="/images/avatar/photoPasseportMarmotte.svg" linkYes="/friends/accept" linkNo="/friends/refuse" :key="request.id" :src="request.avatar" :username="request.username" :userId="request.id"></manta-requests-list-item>
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
    import MantaRequestsListItem from '../Mantastudio/RequestsListItem'
    import MantaChallengesListItem from '../Mantastudio/ChallengesListItem'
    import MantaArchivesListItem from '../Mantastudio/ArchivesListItem'
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
            MantaUsersListItem,
            MantaRequestsListItem,
            MantaChallengesListItem,
            MantaArchivesListItem

        },
        setup(props) {
            const friends = usePage().props.value.friends;
            const friendList = usePage().props.value.friends;
            const users = null;
            const userList = usePage().props.value.users;
            const requests = usePage().props.value.requests;
            const games = usePage().props.value.games;
            const archives = usePage().props.value.archives;

            archives.forEach(element => {
                console.log(element[0].username);
            });
            return {
                friends: ref(friends),
                friendList,
                userList,
                users: ref(users),
                requests: ref(requests),
                games,
                archives
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
                const filteredUsers = this.userList.filter(user => user.username.includes(content));
                if(content == "") {
                    this.users = null;
                }
                else {
                    this.users = filteredUsers;
                }
                
            },
            removeUser(user){
                let index = this.users.indexOf(user);
                let index2 = this.userList.indexOf(user);
                this.users.splice(index, 1);
                this.userList.splice(index2, 1);
            },
            acceptRequest(request){
                let index = this.requests.indexOf(request);
                this.friends.push(request);
                this.requests.splice(index, 1);
            },
            refuseRequest(request){
                let index = this.requests.indexOf(request);
                this.requests.splice(index, 1);
            },
            acceptGame(game){
                console.log("GAMMMME !!!!");
            },

            
            
        }
    }
</script>

