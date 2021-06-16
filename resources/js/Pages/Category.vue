<template>
    <h1 class="text-4xl mx-auto text-center">Quiz</h1>
    <manta-city-category-container>
        <manta-city-category-item src="/images/cities/lausanne_smartphone.svg" alt="Lausanne" cityName="Lausanne" :purcent="lausanne_percent" @citySelected="selectCity(2)">
        </manta-city-category-item>
        <manta-city-category-item src="/images/cities/neuchatel_smartphone.svg" alt="Neuchâtel" cityName="Neuchâtel" :purcent="neuchatel_percent" @citySelected="selectCity(4)">
        </manta-city-category-item>
    </manta-city-category-container>
    <manta-category-container>
        <manta-category-item src="/images/categories/categorie_mobile_art.svg" alt="Art et Culture" categoryName="Art et Culture" @categorySelected="selectCategory(2)">
        </manta-category-item>
        <manta-category-item src="/images/categories/categorie_mobile_gastronomie.svg" alt="Histoire" categoryName="Histoire" @categorySelected="selectCategory(3)">
        </manta-category-item>
        <manta-category-item src="/images/categories/categorie_mobile_histoire.svg" alt="Gastronomie" categoryName="Gastronomie" @categorySelected="selectCategory(1)">
        </manta-category-item>
    </manta-category-container>
    

</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import MantaPrimaryButton from '../Mantastudio/PrimaryButton'
    import { usePage } from '@inertiajs/inertia-vue3'
    import Layout from '../Layouts/AppLayout.vue'
    import MantaCityCategoryItem from '../Mantastudio/CityCategoryItem'
    import MantaCityCategoryContainer from '../Mantastudio/CityCategoryContainer'
    import MantaCategoryItem from '../Mantastudio/CategoryItem'
    import MantaCategoryContainer from '../Mantastudio/CategoryContainer'

    export default {
        layout: Layout,
        components: {
            JetAuthenticationCard,
            MantaPrimaryButton,
            MantaCityCategoryItem,
            MantaCityCategoryContainer ,
            MantaCategoryItem,
            MantaCategoryContainer

        },
        data() {
            let form = null;
            const opponent_id = usePage().props.value.opponent_id;
            const lausanne_percent = usePage().props.value.lausanne_percent;
            const neuchatel_percent = usePage().props.value.neuchatel_percent;
            return {
                form: form,
                opponent_id,
                lausanne_percent,
                neuchatel_percent,
            }
        },

        methods: {
            selectCity(id) {
                this.form = this.$inertia.form({
                    city_id: id,
                    opponent_id: this.opponent_id
                });
                this.submit();
            },
            selectCategory(id) {
                this.form = this.$inertia.form({
                    question_category_id: id,
                    opponent_id: this.opponent_id
                });
                this.submit();
            },
            submit() {
                this.form.post(this.route('game'));
            }
        }
    }
</script>

