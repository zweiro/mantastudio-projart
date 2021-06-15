<script>
    import { usePage } from '@inertiajs/inertia-vue3'
    import { ref, computed } from 'vue'
    import Layout from '../Layouts/GameLayout.vue'
    import MantaQuestionFrame from '../Mantastudio/QuestionFrame'
    import MantaAnswersItem from '../Mantastudio/AnswersItem'
    import MantaAnswersContainer from '../Mantastudio/AnswersContainer'
    import MantaCircularTimer from '../Mantastudio/CircularTimer'

    export default {
        layout: Layout,
        setup(props) {
            let repeat = ref(0);
            let read = ref(true);
            let state = ref("reading");
            let answerChoosen = ref(false);
            let showAnswers = ref(false);
            const questions = usePage().props.value.questions;
            const question_total = questions.length;
            const question_index = ref(0);
            const correctAnswer = ref(null);
            const question_human_index = computed(() => question_index.value+1);
            const question_title = computed(() => questions[question_index.value].text);
            const question_answers = computed(() => questions[question_index.value].answers);

            let readingTimeout;
            let idChoosenNumber = ref(null);
            return { 
                questions,
                question_index,
                question_title,
                question_total,
                question_human_index,
                question_answers,
                readingTimeout,
                showAnswers,
                answerChoosen,
                idChoosenNumber,
                correctAnswer,
                repeat,
                read,
                state
            }
        },
        mounted() {
            axios.get('../answer/' + this.questions[this.question_index].id).then(response => {
                this.correctAnswer = response.data.id;
            });
        },
        components: {
            MantaQuestionFrame,
            MantaAnswersItem,
            MantaAnswersContainer,
            MantaCircularTimer

        },
        methods: {
            nextQuestion() {
                this.answerChoosen = false;
                this.idChoosenNumber = null;
                this.question_index++;
                axios.get('../answer/' + this.questions[this.question_index].id).then(response => {
                    this.correctAnswer = response.data.id;
                });
            },
            showAnswersContainer() {
                this.showAnswers = !this.showAnswers;
            },
            nextState(){
                switch (this.state) {
                    case "reading":
                        this.state = "answering";
                        this.showAnswersContainer();
                        this.read = false;
                        break;
                    case "answering":
                        this.setChoice(null);
                        this.state = "results";
                        this.read = true;
                        break;
                    case "results":
                        this.state = "reading";
                        this.nextQuestion();
                        this.showAnswersContainer();
                        this.read = true;
                        break;
                    default:
                        break;
                }
                this.repeat++;
            },
            setChoice(id) {
                if(!this.answerChoosen) {
                    this.answerChoosen = true;
                    this.idChoosenNumber = id;
                    if(id != null) {
                        this.nextState();
                    }
                }
            }
        }
    }
</script>

<template>
    <div>
        <div class="w-full pt-4 pb-6">
            <a>Retour</a>
        </div>
        <manta-question-frame :currentNumber="question_human_index" :totalNumber="question_total" :question="question_title">
            {{ question_title }}
        </manta-question-frame>
        <manta-circular-timer :repeat="repeat" :read="read" @timerEnded="nextState()">
        </manta-circular-timer>
        <transition name="fade">
            <manta-answers-container v-show="showAnswers">
                <manta-answers-item :disabled="answerChoosen && (answer.id != idChoosenNumber)" :rightAnswer="answerChoosen && answer.id == correctAnswer" :wrongAnswer="correctAnswer != null && answerChoosen && answer.id == idChoosenNumber && answer.id != correctAnswer" @click="setChoice(answer.id)" v-for="answer in question_answers" :key="answer.id">
                    {{ answer.text }}
                </manta-answers-item>
            </manta-answers-container>
        </transition>
    </div>
    

</template>

<style>
    .fade-enter-from {
        opacity: 0;
    }
    .fade-enter-to {
        opacity: 1;
    }
    .fade-enter-active {
        transition: all 2s ease;
    }
</style>

