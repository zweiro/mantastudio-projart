<template>
    <div>
        <h1 class="text-4xl mx-auto text-center mb-16">Résultats</h1>
        <manta-personnal-score class="mt-24" score="8" total="10" avatar="/images/avatar/photoPasseportMarmotte.svg"></manta-personnal-score>
        <a href="/results/">
            <manta-primary-button class="mt-36">Voir mes gains</manta-primary-button>
        </a>
        <a href="/start">
            <manta-primary-button class="mt-8 inversedPrimaryButtonColor">Rejouer</manta-primary-button>
        </a>
        
    </div>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import MantaPrimaryButton from '../Mantastudio/PrimaryButton'
    import { usePage } from '@inertiajs/inertia-vue3'
    import Layout from '../Layouts/AppLayout.vue'
    import MantaPersonnalScore from '../Mantastudio/PersonnalScore'
    import { computed, ref } from 'vue'

    export default {
        layout: Layout,
        components: {
            JetAuthenticationCard,
            MantaPrimaryButton,
            MantaPersonnalScore

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

