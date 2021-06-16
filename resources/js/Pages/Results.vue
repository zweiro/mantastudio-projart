<template>
    <div>
        <h1 class="text-4xl mx-auto text-center mb-16">Résultats</h1>
        <manta-personnal-score class="mt-24" :score="nbRightAnswers" total="10" avatar="/images/avatar/photoPasseportMarmotte.svg"></manta-personnal-score>
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
    import MantaPersonnalScore from '../Mantastudio/PersonnalScore'
    import { computed } from 'vue';

    export default {
        layout: Layout,
        components: {
            MantaPrimaryButton,
            MantaPersonnalScore,
        },
        setup(props) {
            const nbRightAnswers = usePage().props.value.nbRightAnswers;
            const nbPoints = usePage().props.value.nbPoints;
            const game_id = usePage().props.value.game_id;
            const gainLink = computed(() => "/gains/" + game_id);
            console.log(nbRightAnswers);
            return {
                nbRightAnswers,
                nbPoints,
                game_id,
                gainLink,
            }
        },
    }
</script>

