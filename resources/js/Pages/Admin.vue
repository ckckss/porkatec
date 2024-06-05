<script setup>
import AppLayoutAdmin from '@/Layouts/AppLayout.vue';
import AdminPanel from '@/Components/AdminPanel.vue';
</script>

<template>
    <AppLayoutAdmin title="Administrador">

        <div class="py-6">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="sm:rounded-lg">
                    <AdminPanel />
                </div>
            </div>
        </div>
    </AppLayoutAdmin>
</template>
