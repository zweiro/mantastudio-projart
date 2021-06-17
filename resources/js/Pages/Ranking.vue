<template>
    <div>
        <h1 class="text-4xl mx-auto text-center mb-16">Classement</h1>
        <manta-ranking-list-item class="blueBackground mb-16" avatar="/images/avatar/photoPasseportMarmotte.svg" rank="3" username="Givros" points="57"></manta-ranking-list-item>
        <manta-ranking-list-item avatar="/images/avatar/photoPasseportMarmotte.svg" rank="1" username="Grieff" points="89"></manta-ranking-list-item>
        <manta-ranking-list-item avatar="/images/avatar/photoPasseportMarmotte.svg" rank="2" username="Ali" points="72"></manta-ranking-list-item>
    </div>
</template>

<script>
    import { usePage } from '@inertiajs/inertia-vue3'
    import Layout from '../Layouts/AppLayout.vue'
    import MantaRankingListItem from '../Mantastudio/RankingListItem'
    import { computed, ref } from 'vue'

    export default {
        layout: Layout,
        components: {
            MantaRankingListItem

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
            
        }
    }
</script>

<style scoped>
    .blueBackground {
            background-color: #6BAEBE;
        }   
</style>