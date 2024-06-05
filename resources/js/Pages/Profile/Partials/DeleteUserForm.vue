<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ActionSection from '@/Components/ActionSection.vue';
import DangerButton from '@/Components/DangerButton.vue';
import DialogModal from '@/Components/DialogModal.vue';
import InputError from '@/Components/InputError.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    setTimeout(() => passwordInput.value.focus(), 250);
};

const deleteUser = () => {
    form.delete(route('current-user.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <ActionSection>
        <template #title>
            <p class="text-green-600">Eliminar Usuario</p>
        </template>

        <template #description>
            <p class="text-green-300">Eliminar tu usuario permanentemente</p>
        </template>

        <template #content>
            <div class="bg-gray-600 p-8 rounded-md">
            <div class="max-w-xl text-sm bg-gray-600 text-green-400">
                Una vez eliminado el usuario, todos sus recursos e informacion seran eliminados permanentemente. Si quieres conservarlos, descarga los datos antes de eliminarla.
            </div>

            <div class="mt-5">
                <DangerButton @click="confirmUserDeletion">
                    Eliminar usuario
                </DangerButton>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <DialogModal class="bg-gray-400" :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    Eliminar usuario
                </template>

                <template #content>
                   ¿Seguro que quieres eliminar tu usuario? Confirma tu contraseña para eliminarlo

                    <div class="mt-4">
                        <TextInput
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="Contraseña"
                            autocomplete="current-password"
                            @keyup.enter="deleteUser"
                        />

                        <InputError :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <SecondaryButton @click="closeModal">
                        Cancelar
                    </SecondaryButton>

                    <button
                        class="ms-3 bg-green-300 rounded-md shadow-sm hover:bg-green-400 border-gray-400 border px-4
                        inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs 
                        text-gray-700 uppercase tracking-widest shadow-sm"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Eliminar mi usuario
                    </button>
                </template>
            </DialogModal>
        </div>
        </template>
    </ActionSection>
</template>
