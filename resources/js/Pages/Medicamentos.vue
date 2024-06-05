<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import MedicamentosTable from '@/Components/MedicamentosTable.vue';
</script>

<template>
    <AppLayout title="Dashboard">

        <div class="py-6">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white sm:rounded-lg">
                    <MedicamentosTable />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
