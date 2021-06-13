<template>
    
    <jet-authentication-card>
        <form @submit.prevent="submit">
            <div class="relative h-20">
                <manta-primary-button class="m-0 absolute top-2/4 left-2/4 transform -translate-x-2/4 -translate-y-2/4">
                    Créer une partie
                </manta-primary-button>
            </div>
        </form>
    </jet-authentication-card>

</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import MantaPrimaryButton from '../Mantastudio/PrimaryButton'
    import { usePage } from '@inertiajs/inertia-vue3'
    import Layout from '../Layouts/PublicLayout.vue'

    export default {
        layout: Layout,
        components: {
            JetAuthenticationCard,
            MantaPrimaryButton,
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
            }
        }
    }
</script>

