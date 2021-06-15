<template>
    <div>
        <h1 class="text-4xl mx-auto text-center mb-16">Mode de jeu</h1>
        <inertia-link href="/start/category" method="get">
            <manta-primary-button class="mt-8">Solo</manta-primary-button>
        </inertia-link>
        <inertia-link href="/start/battle" method="get">
            <manta-primary-button class="mt-8 inversedPrimaryButtonColor">Duel</manta-primary-button>
        </inertia-link>
        <manta-remaining-time-frame remainingTime="6 jours" class="my-24">
        </manta-remaining-time-frame>
        
    </div>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import MantaPrimaryButton from '../Mantastudio/PrimaryButton'
    import { usePage } from '@inertiajs/inertia-vue3'
    import Layout from '../Layouts/AppLayout.vue'
    import MantaRemainingTimeFrame from '../Mantastudio/RemainingTimeFrame'
    import { computed, ref } from 'vue'

    export default {
        layout: Layout,
        components: {
            JetAuthenticationCard,
            MantaPrimaryButton,
            MantaRemainingTimeFrame

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

