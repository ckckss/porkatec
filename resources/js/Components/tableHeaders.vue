<template>
    <div class="w-full h-30 flex justify-end">
        <!-- Panel de Control -->
        <div class="w-2/3 text-left mr-10 pb-8 ">
            <p class="pl-4 pt-8 font-bold text-3xl text-green-400 ">PANEL DE CONTROL 
                <b v-if="tipo === 'naves'" class="text-green-300"> /NAVES</b>
                <b v-else-if="tipo === 'usuarios'" class="text-green-300"> /USUARIOS</b>
                <b v-else-if="tipo === 'cerdas'" class="text-green-300"> /CERDAS</b>
            </p>
        </div>
        <!-- Botón de Crear Nuevo Usuario -->
        <button type="button" class="w-1/4 h-15 flex justify-end items-center pr-8 bg-green-300 hover:bg-green-400 pb-8 rounded-l-lg">

                <div class="flex items-center text-gray-800 pt-8">
                    <div class="w-10 h-10 rounded-full bg-gray-700 text-green-300 hover:bg-gray-600 hover:text-green-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mt-2 ml-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <b class="ml-2 hidden lg:block">Añadir
                        <d v-if="tipo === 'naves'">nave</d>
                        <d v-else-if="tipo === 'usuarios'">usuario</d>
                        <d v-else-if="tipo === 'cerdas'">cerda</d>
                    </b>
                </div>

        </button>
    </div>
</template>

<script>
export default {
    name: "TableHeader",
    props: ['tipo']
}
</script>