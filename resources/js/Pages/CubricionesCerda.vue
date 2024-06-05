<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CubricionesTable from '@/Components/CubricionesTable.vue';

</script>

<template>
    <AppLayout title="Ficha Cerdas">

        <div class="py-6">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="sm:rounded-lg">
                    <CubricionesTable />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
