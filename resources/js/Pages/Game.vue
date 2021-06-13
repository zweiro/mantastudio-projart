<template>
    <div class="w-full py-8">
        <a>Retour</a>
    </div>
    <manta-question-frame currentNumber="7" totalNumber="10" question="Combien il y a-t-il de fromage dans la fondue à Neuchâtel ?">
    </manta-question-frame>
    <manta-circular-timer>
    </manta-circular-timer>
    <manta-answers-container>
        <manta-answers-item>
            blaba blab alba dfds
        </manta-answers-item>
        <manta-answers-item>
            Les filets de perche façon meunière
        </manta-answers-item>
        <manta-answers-item>
            Le bircher müesli
        </manta-answers-item>
        <manta-answers-item>
            1
        </manta-answers-item>
    </manta-answers-container>
    

</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import MantaPrimaryButton from '../Mantastudio/PrimaryButton'
    import { usePage } from '@inertiajs/inertia-vue3'
    import Layout from '../Layouts/GameLayout.vue'
    import MantaQuestionFrame from '../Mantastudio/QuestionFrame'
    import MantaAnswersItem from '../Mantastudio/AnswersItem'
    import MantaAnswersContainer from '../Mantastudio/AnswersContainer'
    import MantaCircularTimer from '../Mantastudio/CircularTimer'

    export default {
        layout: Layout,
        components: {
            JetAuthenticationCard,
            MantaPrimaryButton,
            MantaQuestionFrame,
            MantaAnswersItem,
            MantaAnswersContainer,
            MantaCircularTimer

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

