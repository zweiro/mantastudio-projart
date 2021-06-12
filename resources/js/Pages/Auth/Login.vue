<template>
    <div>
        <jet-authentication-card>

            <jet-validation-errors class="mb-4" />

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <form @submit.prevent="submit">
            <manta-form-input name="email" type="email" label="Email" v-model="form.email">
            </manta-form-input>
            <manta-form-input name="password" type="password" label="Mot de passe" v-model="form.password">
            </manta-form-input>
            <div class="relative h-20">
                <manta-primary-button class="m-0 absolute top-2/4 left-2/4 transform -translate-x-2/4 -translate-y-2/4">
                    Me connecter
                </manta-primary-button>
            </div>
        </form>
        </jet-authentication-card>
    </div>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    import MantaPrimaryButton from '../../Mantastudio/PrimaryButton'
    import MantaFormInput from '../../Mantastudio/FormInput'
    import MantaFormSelect from '../../Mantastudio/FormSelect'
    import MantaFormSearch from '../../Mantastudio/FormSearch'
    import Layout from '../../Layouts/PublicLayout.vue'

    export default {
        layout: Layout,
        components: {
            JetAuthenticationCard,
            JetValidationErrors,
            MantaPrimaryButton,
            MantaFormInput,
            MantaFormSelect,
            MantaFormSearch
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>
