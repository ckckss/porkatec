<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div>
        <Head :title="title" />
        <div class="min-h-screen bg-gray-700">
            <nav class="bg-green-300 border-b border-gray-700">
                <!-- Primary Navigation Menu -->
                <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="w-full flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('home')">
                                    <img class="block h-16 w-auto" src="/assets/logo.png">
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <NavLink v-if="$page.props.user.permissions.includes('admin_bypass')" :href="route('admin')" :active="route().current('admin')">
                                    ADMINISTRADOR
                                </NavLink>
                                <NavLink v-if="$page.props.user.permissions.includes('read_user')" :href="route('usuarios')" :active="route().current('usuarios')">
                                    USUARIOS
                                </NavLink>
                                <NavLink :href="route('cerdas')" :active="route().current('cerdas')">
                                    CERDAS
                                </NavLink>
                                <NavLink :href="route('naves')" :active="route().current('naves')">
                                    NAVES
                                </NavLink>
                                <NavLink :href="route('medicamentos')" :active="route().current('medicamentos')">
                                    MEDICAMENTOS
                                </NavLink>
                                <NavLink :href="route('nfcreader')" :active="route().current('nfcreader')">
                                    LECTOR NFC
                                </NavLink>
                            </div>
                            
                        </div>
                        <div class="my-auto p-2 bg-green-400 text-gray-600 border-green-400 rounded-xl"><p>Nivel de acceso: <b class="text-xl">{{ $page.props.user.roles[0] }}</b></p></div>
                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center">
                            <div class="relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <button v-if="$page.props.jetstream.managesProfilePhotos"
                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover"
                                                :src="$page.props.auth.user.profile_photo_url"
                                                :alt="$page.props.auth.user.name">
                                        </button>

                                        <span v-else class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>
                                    
                                    <template #content>
                                        
                                        <!-- Account Management -->
                                        <DropdownLink :href="route('profile.show')">
                                            Perfil
                                        </DropdownLink>

                                        <div class="border-t border-gray-200" />

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <DropdownLink as="button">
                                                Cerrar Sesion
                                            </DropdownLink>
                                        </form>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                @click="showingNavigationDropdown = !showingNavigationDropdown">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{ 'hidden': showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path
                                        :class="{ 'hidden': !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{ 'block': showingNavigationDropdown, 'hidden': !showingNavigationDropdown }"
                    class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink v-if="$page.props.user.permissions.includes('admin_bypass')" :href="route('admin')" :active="route().current('admin')">
                            ADMINISTRADOR
                        </ResponsiveNavLink>
                        <ResponsiveNavLink v-if="$page.props.user.permissions.includes('read_user')" :href="route('usuarios')" :active="route().current('usuarios')">
                            USUARIOS
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('cerdas')" :active="route().current('cerdas')">
                            CERDAS
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('naves')" :active="route().current('naves')">
                            NAVES
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('medicamentos')" :active="route().current('medicamentos')">
                            MEDICAMENTOS
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('nfcreader')" :active="route().current('nfcreader')">
                            LECTOR NFC
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.show')" :active="route().current('profile.show')">
                                Perfil
                            </ResponsiveNavLink>

                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="logout">
                                <ResponsiveNavLink as="button">
                                    Cerrar Sesión
                                </ResponsiveNavLink>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
