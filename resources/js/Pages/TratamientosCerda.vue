<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import TratamientosTable from '@/Components/TratamientosTable.vue';
</script>

<template>
    <AppLayout class="bg-gray-600" title="Dashboard">

        <div class="py-6">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="sm:rounded-lg">
                    <TratamientosTable />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
