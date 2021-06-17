<template>
    <div>
        <h1 class="text-4xl mx-auto text-center mb-16">Résultats</h1>
        <manta-battle-score class="mt-24" :score="nbRightAnswers" username1="Givros" username2="Grieff" total="10" avatar="/images/avatar/photoPasseportMarmotte.svg"></manta-battle-score>
        <div class="flex flex-col">
            <div class="mx-auto mb-8">
                <p class="mx-auto">+{{ nbPoints }} Trophés</p>
            </div>
        </div>
        
        <a :href="gainLink">
            <manta-primary-button class="mt-36">Voir mes gains</manta-primary-button>
        </a>
        <a href="/start">
            <manta-primary-button class="mt-8 inversedPrimaryButtonColor">Rejouer</manta-primary-button>
        </a>
    </div>
</template>

<script>
    import MantaPrimaryButton from '../Mantastudio/PrimaryButton'
    import { usePage } from '@inertiajs/inertia-vue3'
    import Layout from '../Layouts/AppLayout.vue'
    import MantaBattleScore from '../Mantastudio/BattleScore'
    import { computed } from 'vue';

    export default {
        layout: Layout,
        components: {
            MantaPrimaryButton,
            MantaBattleScore,
        },
        setup(props) {
            const nbRightAnswers = usePage().props.value.nbRightAnswers;
            const nbPoints = usePage().props.value.nbPoints;
            const game_id = usePage().props.value.game_id;
            const gainLink = computed(() => "/gains/" + game_id);
            return {
                nbRightAnswers,
                nbPoints,
                game_id,
                gainLink,
            }
        },
    }
</script>

