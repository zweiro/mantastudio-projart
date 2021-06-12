<template>
    <div class="mx-auto pt-28 px-6 w-full md:w-2/3 lg:w1/2 text-lg leading-6 break-words lg:grid lg:grid-cols-2 lg:gap-4">
        <div>
            <h1 class="mb-3 text-lg font-bold">Qu’est-ce que Reponzi ?</h1>
            <p class="mb-2">C’est une application web qui vous fait découvrir ou redécouvrir les villes de Suisse romande à travers <span class="importantWord font-bold">plusieurs quiz de culture générale.</span></p>
            <p class="mb-2">Il vous sera possible de <span class="importantWord font-bold">tester vos connaissances</span> en affrontant vos adversaires ou simplement en apprendre plus sur un patrimoine souvent peu connu du grand public.</p> 
            <p class="mb-2">Alors pourquoi ne pas vous inscrire !</p>
        </div>
        <div>
            <inertia-link :href="route('register')">
                <manta-primary-button class="mt-10">
                    S'inscrire
                </manta-primary-button>
            </inertia-link>
            <inertia-link :href="route('login')">
                <manta-primary-button inverse="true" class="mt-4">
                    Se connecter
                </manta-primary-button>
            </inertia-link>
        </div>
    </div>
</template>
<script>
    import Layout from '../Layouts/PublicLayout.vue'
    import MantaPrimaryButton from '../Mantastudio/PrimaryButton'

    export default {
        layout: Layout,
        components: {
            MantaPrimaryButton,
        }
    }
</script>
<style scoped>
    .importantWord {
        color: rgba(106,174,190,1);
    }   
</style>