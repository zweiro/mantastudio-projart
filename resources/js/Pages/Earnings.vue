<template>
    <div>
        <h1 class="text-4xl mx-auto text-center mb-16">Gains</h1>
        <manta-city-earnings points="8" purcent="20" cityName="Lausanne"></manta-city-earnings>
        <a href="/start/">
            <manta-primary-button class="mt-36">Terminer</manta-primary-button>
        </a>
    </div>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import MantaPrimaryButton from '../Mantastudio/PrimaryButton'
    import { usePage } from '@inertiajs/inertia-vue3'
    import Layout from '../Layouts/AppLayout.vue'
    import MantaCityEarnings from '../Mantastudio/CityEarnings'
    import { computed, ref } from 'vue'

    export default {
        layout: Layout,
        components: {
            JetAuthenticationCard,
            MantaPrimaryButton,
            MantaCityEarnings

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

