<template>
    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <manta-form-input name="username" type="text" label="Pseudo" v-model="form.username">
            </manta-form-input>
            <manta-form-input name="email" type="email" label="Email" v-model="form.email">
            </manta-form-input>
            <manta-form-input name="password" type="password" label="Mot de passe" v-model="form.password">
            </manta-form-input>
            <manta-form-input name="password_confirmation" type="password" label="Confirmation" v-model="form.password_confirmation">
            </manta-form-input>
            <manta-form-select label="Canton" name="canton_id">
                <option value="">Choisir votre canton</option>
                <option value="dog">Vaud</option>
                <option value="dog">Genève</option>
            </manta-form-select>
            <div class="relative h-20">
            <manta-primary-button class="m-0 absolute top-2/4 left-2/4 transform -translate-x-2/4 -translate-y-2/4">
                Suivant
            </manta-primary-button>
        </div>
        </form>
        
    </jet-authentication-card>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from "@/Jetstream/Checkbox";
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    import MantaPrimaryButton from '../../Mantastudio/PrimaryButton'
    import MantaFormInput from '../../Mantastudio/FormInput'
    import MantaFormSelect from '../../Mantastudio/FormSelect'
    import MantaFormSearch from '../../Mantastudio/FormSearch'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            MantaPrimaryButton,
            MantaFormInput,
            MantaFormSelect,
            MantaFormSearch
        },

        data() {
            return {
                form: this.$inertia.form({
                    username: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                    canton_id: 1
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>

