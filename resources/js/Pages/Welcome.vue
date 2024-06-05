<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});

</script>

<template>
    <div class="relative flex flex-col lg:flex-row items-center justify-center min-h-screen bg-gray-700">
        <!-- Logo -->
        <div class="ml-24  w-full lg:w-1/3 flex items-center justify-center lg:justify-end mb-8 lg:mb-0">
            <img class="h-auto w-auto" src="/assets/logo.png" alt="Logo">
        </div>

        <!-- Bienvenida y mensajes -->
        <div class="w-full lg:w-2/3 h-full flex flex-col items-center justify-between">
            <div
                class="h-1/2  welcome-message text-center font-Georgia font-semibold leading-tight flex flex-col justify-end">
                <p class="pb-12 text-green-500 text-5xl lg:text-6xl">BIENVENIDO A PORKA-TEC</p>
                <p class="pb-24 text-green-700 text-3xl lg:text-4xl font-extrabold italic tracking-wide leading-tight text-center">
                    "Tecnología porcina al alcance de tus manos"
                </p>

            </div>

            <!-- Login y Register -->
            <div v-if="canLogin" class="h-1/2 flex justify-center lg:justify-between ">
                <div>
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                    class="ml-8 bg-green-300 rounded-md shadow-sm hover:bg-green-400 hover:border-black border-gray-400 border inline-flex items-center px-10 py-3 border rounded-md font-semibold text-gray-700 uppercase tracking-widest shadow-sm">
                    ACCEDER
                    </Link>
                    <template v-else>
                        <div class="flex justify-center lg:justify-start">
                            <Link :href="route('login')"
                                class="ml-2 bg-green-300 rounded-md shadow-sm hover:bg-green-400 hover:border-black border-gray-400 border inline-flex items-center px-10 border rounded-md font-semibold text-gray-700 uppercase tracking-widest shadow-sm">
                            Iniciar sesión
                            </Link>
                            <Link v-if="canRegister" :href="route('register')"
                                class="ml-8 bg-green-300 rounded-md shadow-sm hover:bg-green-400 hover:border-black border-gray-400 border inline-flex items-center px-10 py-3 border rounded-md font-semibold text-gray-700 uppercase tracking-widest shadow-sm">
                            Registrarse
                            </Link>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>
