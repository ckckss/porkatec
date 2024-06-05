<template>

    <!-- component -->
    <div class="text-gray-900 bg-gray-700 h-screen">
        <div class=" pl-4 pt-8 flex">
            <h1 class="text-3xl font-bold text-green-400">Cerda <b class="text-green-500">{{ idCerda }}</b></h1>
        </div>
        <div class="px-3 pt-4 flex justify-center">
            <form action="">
                <div class="overflow-x-auto">
                    


                    <table class="w-auto text-md bg-white shadow-md">
                        <tbody class="bg-gray-900">
                            <!-- CABECERA -->
                            <tr class="ml-4">
                                <th class="text-md h-10 bg-gray-600 text-green-400 
                                text-center border-t border-b border-gray-600" v-for="(indice, key) in indicesCabecera"
                                    :key="key">{{ indice }}</th>
                            </tr>

                            <!-- DATOS -->
                            <tr v-for="cerda in cerdas" :key="cerda.id" class="border-b bg-gray-500 text-black">

                                <!-- Cubricion -->
                                <td>
                                    <input type="date" v-model="cerda.fecha_cubricion"
                                        class="text-center bg-transparent py-2">
                                </td>

                                <!-- Condicion -->
                                <td class="py-3 flex items-center">
                                    <label class="cursor-pointer">
                                        <div class="grid grid-cols-3 justify-items-center space-between">
                                            <div class="flex flex-col items-center">
                                                <input type="checkbox" name="condicion"
                                                    class="form-checkbox h-4 w-4 text-blue-600 mt-1" value="aborto"
                                                    v-model="cerda.selectedOption" :checked="cerda.estado === 'aborto'">
                                                <img class="w-4 h-4 mt-1" src="/assets/selectCondicion/A.png">
                                            </div>

                                            <div class="flex flex-col items-center mx-1">
                                                <input type="checkbox" name="condicion"
                                                    class="form-checkbox h-4 w-4 text-blue-600 mt-1" value="vacia"
                                                    v-model="cerda.selectedOption" :checked="cerda.estado === 'vacia'">
                                                <img class="w-4 h-4 mt-1" src="/assets/selectCondicion/V.png">
                                            </div>

                                            <div class="flex flex-col items-center">
                                                <input type="checkbox" name="condicion"
                                                    class="form-checkbox h-4 w-4 text-blue-600 mt-1" value="repetida"
                                                    v-model="cerda.selectedOption"
                                                    :checked="cerda.estado === 'repetida'">
                                                <img class="w-4 h-4 mt-1" src="/assets/selectCondicion/R.png">
                                            </div>

                                            <div class="flex flex-col items-center">
                                                <img class="w-4 h-4 mt-1" src="/assets/selectCondicion/circulo.png">
                                                <input type="checkbox" name="condicion"
                                                    class="form-checkbox h-4 w-4 text-blue-600 mt-1" value="sucia"
                                                    v-model="cerda.selectedOption" :checked="cerda.estado === 'sucia'">
                                            </div>

                                            <div class="flex flex-col items-center">
                                                <img class="w-4 h-4 mt-1" src="/assets/selectCondicion/circuloA.png">
                                                <input type="checkbox" name="condicion"
                                                    class="form-checkbox h-4 w-4 text-blue-600 mt-1" value="ca"
                                                    v-model="cerda.selectedOption" :checked="cerda.estado === 'ca'">
                                            </div>

                                            <div class="flex flex-col items-center">
                                                <img class="w-4 h-4 mt-1" src="/assets/selectCondicion/circuloV.png">
                                                <input type="checkbox" name="condicion"
                                                    class="form-checkbox h-4 w-4 text-blue-600 mt-1" value="cv"
                                                    v-model="cerda.selectedOption" :checked="cerda.estado === 'cv'">
                                            </div>
                                        </div>
                                    </label>
                                </td>

                                <!-- Parto -->
                                <td>
                                    <input type="date" v-model="cerda.fecha_parto"
                                        class="text-center w-full bg-transparent py-2">
                                </td>

                                <!-- Vivos -->
                                <td class="text-center">
                                    <input type="number" v-model="cerda.nacidos_vivos"
                                        class="text-center w-full bg-transparent py-2">
                                </td>

                                <!-- Muertos -->
                                <td class="text-center">
                                    <input type="number" v-model="cerda.nacidos_muertos"
                                        class="text-center w-full bg-transparent py-2">
                                </td>

                                <!-- Momificados -->
                                <td class="text-center">
                                    <input type="number" v-model="cerda.nacidos_momificados"
                                        class="text-center w-full bg-transparent py-2">
                                </td>

                                <!-- Adoptados -->
                                <td class="text-center">
                                    <input type="number" v-model="cerda.num_adoptados"
                                        class="text-center w-full bg-transparent py-2">
                                </td>

                                <!-- Cedidos -->
                                <td class="text-center">
                                    <input type="number" v-model="cerda.num_cedidos"
                                        class="text-center w-full bg-transparent py-2">
                                </td>

                                <!-- Bajas -->
                                <td class="text-center">
                                    <input type="number" v-model="cerda.num_bajas"
                                        class="text-center w-full bg-transparent py-2">
                                </td>

                                <!-- Destete -->
                                <td class="text-center">
                                    <input type="date" v-model="cerda.fecha_destete"
                                        class="text-center w-full bg-transparent py-2">
                                </td>

                                <!-- Destetados -->
                                <td class="">
                                    <input type="number" v-model="cerda.num_destetados"
                                        class="text-center w-full bg-transparent py-2">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="mt-3 w-full h-10 text-sm bg-gray-800 hover:bg-gray-400 
                            text-gray-500 hover:text-black font-bold py-1 px-2 rounded
                            focus:outline-none focus:shadow-outline">
                    Guardar
                </button>


            </form>
        </div>
    </div>
</template>

<script>
    import { PlusCircleIcon } from '@heroicons/vue/24/outline'
</script>