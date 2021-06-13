<template>
    <div class="mx-auto pt-28 px-6 w-full md:w-2/3 lg:w1/2 text-lg lg:text-base leading-6 break-words lg:grid lg:grid-cols-2 lg:gap-10 lg:text-justify">
        <div>
            <h1 class="mb-4 text-lg font-bold">Règles</h1>
            <p class="mb-3">Les quiz se séparent en 2 parties:</p>
            <p class="mb-3">
                <ul class="list-disc list-inside ml-4 text-left">
                    <li>Par ville (Genève, Lausanne, Sion, Fribourg, Delémont, Neuchatel)</li>
                    <li>Par catégorie (Gastronomie, Arts et Cultures, Histoire, Architecture, Sports et Personnalité Publique)</li>
                </ul>
            </p>
            <p class="mt-3">Le quiz par ville prend de manière aléatoire 10 questions tirées des différentes catégories de la ville. Le quiz par catégorie prend également de manière aléatoire 10 questions liées à cette catégorie mais parmi les différentes villes existantes.</p>
        </div>
        <div>
            <h2 class="mb-4 text-lg lg:text-base font-bold">Mode Solo</h2>
            <p class="mb-3">Le mode Solo vous permet de gagner des tickets permettant d’augmenter votre jauge de ville. La jauge de ville se réinitialise périodiquement et offre la possibilité de gagner des récompenses telles que des bons de réduction, des skins pour votre avatar, etc...</p>
            <h2 class="mb-4 text-lg lg:text-base font-bold">Mode Duel</h2>
            <p class="mb-3">Le mode Duel (1 vs 1) est un quiz permettant d’affronter d’autres joueurs ou amis sur plusieurs catégories liées à toutes les villes sans distinction. Les joueurs répondent à une série de 10 questions et gagnent un nombre de points par question en fonction de leur rapidité.Le mode Duel vous permet aussi de gagner des tickets pour la jauge de ville mais ajoute également la possibilité de gagner des trophées pour un classement amical et global</p>

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
    .link {
        color: rgba(243,150,161,1);
    } 
</style>