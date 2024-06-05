<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <AppLayout title="Bienvenida">
        <div class="py-6 bg-gray-700 w-full">
            <div class="w-full px-4 sm:px-6 lg:px-8">
                <div class="bg-gray-400 shadow-xl sm:rounded-lg p-6">
                    <h1 class="text-3xl font-semibold mb-4 text-gray-800">¡Bienvenido a PORKA-TEC, <b
                            class="text-black">{{ $page.props.auth.user.name }}</b>!</h1>
                    <div class="mt-16">
                        <p class="text-gray-800 mb-6">
                            Esta aplicación está diseñada para optimizar la gestión de las explotaciones porcinas,
                            ofreciendo funcionalidades para el registro y seguimiento de cerdas, manejo de usuarios y
                            permisos, y mucho más.
                        </p>
                        <p class="text-gray-800 mb-6">
                            Nuestro objetivo es proporcionar una herramienta integral que facilite la administración
                            diaria
                            de tu explotación porcina. Desde el registro de nuevos animales hasta el seguimiento
                            detallado
                            del rendimiento y la salud de las cerdas, cada característica ha sido desarrollada pensando
                            en
                            las necesidades del productor.
                        </p>
                    </div>
                    <div class="img-container mx-auto my-8">
                        <img class="banner mx-auto h-80 w-auto rounded-lg" src="/assets/banner.jpg" alt="banner">
                    </div>
                    <div mt-16>

                        <p class="text-gray-800 mb-6">
                            Además, la aplicación permite gestionar eficientemente los recursos humanos, asignando roles
                            y
                            permisos específicos a cada usuario, garantizando así un acceso seguro y controlado a la
                            información sensible. Con una interfaz intuitiva y fácil de usar, podrás acceder a todos los
                            datos relevantes de tu explotación en cualquier momento y lugar.
                        </p>
                        <p class="text-gray-800 mb-6">
                            También contarás con herramientas avanzadas para el manejo de medicamentos y tratamientos,
                            asegurando un control riguroso y preciso de la salud de tus animales. Esta función es clave
                            para mantener altos estándares de bienestar animal y cumplir con las normativas vigentes.
                        </p>
                    </div>
                    <div class="flex place-content-center space-x-4">
                        <Link v-if="$page.props.user.permissions.includes('read_user')" :href="route('usuarios')"
                            class="text-black hover:text-gray-800 underline">Gestión de
                        usuarios</Link>
                        <Link :href="route('cerdas')" class="text-black hover:text-gray-800 underline">Registro de las
                        cerdas</Link>
                        <Link :href="route('naves')" class="text-black hover:text-gray-800 underline">Naves de crianza
                        </Link>
                        <Link :href="route('medicamentos')" class="text-black hover:text-gray-800 underline">Gestión de
                        medicamentos</Link>
                        <Link :href="route('nfcreader')" class="text-black hover:text-gray-800 underline">Lector NFC
                        </Link>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style>
.banner {
    filter: grayscale(100%);
    transition: filter 0.5s ease;
}

.banner:hover {
    filter: grayscale(0%);
    transition: filter 2s ease;
}
</style>