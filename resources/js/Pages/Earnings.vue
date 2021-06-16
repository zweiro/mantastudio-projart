<template>
    <div>
        <h1 class="text-4xl mx-auto text-center mb-16">Gains</h1>
        <manta-city-earnings :points="lausanne" :purcent="lausanne_percent" cityName="Lausanne"></manta-city-earnings>
        <manta-city-earnings :points="neuchatel" :purcent="neuchatel_percent" cityName="Neuchâtel"></manta-city-earnings>
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

    export default {
        layout: Layout,
        components: {
            JetAuthenticationCard,
            MantaPrimaryButton,
            MantaCityEarnings

        },
        setup() {
            const lausanne = usePage().props.value.lausanne;
            const neuchatel = usePage().props.value.neuchatel;
            const lausanne_percent = usePage().props.value.lausanne_percent;
            const neuchatel_percent = usePage().props.value.neuchatel_percent;
            return {
                lausanne,
                neuchatel,
                lausanne_percent,
                neuchatel_percent,
            }
        },
    }
</script>

