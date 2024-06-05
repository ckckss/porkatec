<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Login" />

    <AuthenticationCard>
        <template #logo>
            <img class="mx-auto h-80 w-auto" src="/assets/logo.png" alt="PORKA-TEC">
        </template>

        <div v-if="status" class=" font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <template #title>
            <h1 class="pb-8 text-center text-5xl font-bold text-green-400">
                INICIO DE SESION
            </h1>
        </template>
        <template #content>
            <form @submit.prevent="submit">
                <div>
                    <InputLabel class=text-green-500 for="email" value="Correo electronico" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="mt-1 block w-full text-black bg-gray-400 border-green-500"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel class="text-green-500" for="password" value="Contraseña" />
                    <TextInput
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full text-black bg-gray-400 border-green-500"
                        required
                        autocomplete="current-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <Checkbox class="focus:outline-green-400" v-model:checked="form.remember" name="remember" />
                        <span class="ms-2 text-sm text-green-500">Recuerdame</span>
                    </label>
                </div>

                <div class="flex justify-between mt-4">
                    <div>
                        <Link :href="route('register')" class="text-sm text-green-400 hover:text-green-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            ¿No tienes usuario? - Registro
                        </Link>
                    </div>
                    <div>
                        <Link v-if="canResetPassword" :href="route('password.request')" class="text-sm text-green-400 hover:text-green-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            ¿Has olvidado tu contraseña?
                        </Link>
                        <button class="ml-4 bg-green-300 rounded-md shadow-sm hover:bg-green-400 hover:border-black border-gray-400 border px-4 inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Login
                        </button>
                    </div>
                </div>

            </form>
        </template>
    </AuthenticationCard>
</template>

