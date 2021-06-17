<template>
    <div>
        <h1 class="text-4xl mx-auto text-center mb-16">Classement</h1>
        <manta-ranking-list-item class="blueBackground mb-16" avatar="/images/avatar/photoPasseportMarmotte.svg" :rank="currentUserRank" :username="currentUser" :points="+scores[currentUserRank-1]['score']"></manta-ranking-list-item>
        <manta-ranking-list-item v-for="(score, index) in scores" :key="index" avatar="/images/avatar/photoPasseportMarmotte.svg" :rank="index+1" :username="score['username']" :points="+score['score']"></manta-ranking-list-item>
    </div>
</template>

<script>
    import { usePage } from '@inertiajs/inertia-vue3'
    import Layout from '../Layouts/AppLayout.vue'
    import MantaRankingListItem from '../Mantastudio/RankingListItem'
    import { ref } from 'vue'

    export default {
        layout: Layout,
        components: {
            MantaRankingListItem

        },
        setup() {
            const scores = usePage().props.value.scores;
            const currentUser = usePage().props.value.current_user;
            let currentUserRank = ref(1);
            while(currentUser != scores[currentUserRank.value-1]['username']){
                currentUserRank.value++;
            }
            
            return {
                currentUser,
                scores,
                currentUserRank
            }
        },
    }
</script>

<style scoped>
    .blueBackground {
            background-color: #6BAEBE;
        }   
</style>