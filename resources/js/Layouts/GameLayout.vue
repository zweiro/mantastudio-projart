<template>
    <div class="mantasettings">

        <div class="min-h-screen">
            

            <!-- Page Content -->
            <main class="layoutsettings">
                <slot></slot>
            </main>
        </div>
        <manta-menu>

        </manta-menu>
    </div>
</template>

<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
    import MantaHeader from '../Mantastudio/MainHeader'
    import MantaMenu from '../Mantastudio/BottomMenu'

    export default {
        components: {
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
            MantaHeader,
            MantaMenu,
        },
        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
<style scoped>
    .mantasettings {
        background-color: #FEF9F7;
        font-family: 'Poppins', sans-serif;
    }

    .layoutsettings {
        padding-left: 2em;
        padding-right: 2em;
        padding-bottom: 6em;
    }
</style>
