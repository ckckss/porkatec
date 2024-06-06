<template>

    <!-- component -->
    <div class="text-gray-900 bg-gray-700">
        <div class="w-2/3 text-left mr-10 pb-8">
            <p class="pl-4 ml-16 pt-8 font-bold text-3xl text-green-400">
                <b class="text-green-300"> <b class="text-5xl">/</b class="text-4xl"> CUBRICIONES CERDA <b
                        class="text-5xl text-green-500">{{ this.idficha }}</b>(ID)</b>
            </p>
        </div>
        <div class="px-3 pt-4 flex justify-center">
            <div class="w-full">
                <table class="w-full text-md bg-white shadow-md">
                    <thead class="bg-gray-900">
                        <!-- CABECERA -->
                        <tr class="ml-4">
                            <th class="text-md h-10 bg-gray-600 text-green-400 text-center w-1/12"></th>
                            <th
                                class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/14 date-cell">
                                FECHA CUBRICION</th>
                            <th
                                class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/14">
                                ESTADO</th>
                            <th
                                class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/14 date-cell">
                                FECHA PARTO</th>
                            <th
                                class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/14 numeric-cell">
                                VIVOS</th>
                            <th
                                class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/14 numeric-cell">
                                MUERTOS</th>
                            <th
                                class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/14 numeric-cell">
                                MOMIFICADOS</th>
                            <th
                                class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/14 numeric-cell">
                                ADOPTADOS</th>
                            <th
                                class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/14 numeric-cell">
                                CEDIDOS</th>
                            <th
                                class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/14 numeric-cell">
                                BAJAS</th>
                            <th
                                class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/14 date-cell">
                                FECHA DESTETE</th>
                            <th
                                class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/14 numeric-cell">
                                DESTETADOS</th>
                            <th
                                class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/14">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="border-t bg-gray-500">
                        <!-- DATOS -->
                        <tr v-for="ficha in fichas" :key="ficha.id" class="border-t text-black">
                            <!-- Columnas de datos -->
                            <td class="py-3 text-center w-auto text-xl text-green-400 bg-gray-600">{{ ficha.id_cubricion
                                }}</td>
                            <td class="py-3 text-center date-cell">{{ ficha.fecha_cubricion }}</td>
                            <td class="py-3 text-center w-1/15">
                                <img v-if="ficha.estado === 'aborto'" class="w-6 h-6 mx-auto"
                                    src="/assets/selectCondicion/A.png">
                                <img v-else-if="ficha.estado === 'vacia'" class="w-6 h-6 mx-auto"
                                    src="/assets/selectCondicion/V.png">
                                <img v-else-if="ficha.estado === 'repetida'" class="w-6 h-6 mx-auto"
                                    src="/assets/selectCondicion/R.png">
                                <img v-else-if="ficha.estado === 'sucia'" class="w-6 h-6 mx-auto"
                                    src="/assets/selectCondicion/circulo.png">
                                <img v-else-if="ficha.estado === 'ca'" class="w-6 h-6 mx-auto"
                                    src="/assets/selectCondicion/circuloA.png">
                                <img v-else-if="ficha.estado === 'cv'" class="w-6 h-6 mx-auto"
                                    src="/assets/selectCondicion/circuloV.png">
                            </td>
                            <td class="py-3 text-center w-2/15 date-cell">{{ ficha.fecha_parto }}</td>
                            <td class="py-3 text-center w-1/15 numeric-cell">{{ ficha.nacidos_vivos }}</td>
                            <td class="py-3 text-center w-1/15 numeric-cell">{{ ficha.nacidos_muertos }}</td>
                            <td class="py-3 text-center w-1/15 numeric-cell">{{ ficha.nacidos_momificados }}</td>
                            <td class="py-3 text-center w-1/15 numeric-cell">{{ ficha.num_adoptados }}</td>
                            <td class="py-3 text-center w-1/15 numeric-cell">{{ ficha.num_cedidos }}</td>
                            <td class="py-3 text-center w-1/15 numeric-cell">{{ ficha.num_bajas }}</td>
                            <td class="py-3 text-center w-2/15 date-cell">{{ ficha.fecha_destete }}</td>
                            <td class="py-3 text-center text-xl text-white w-1/15 numeric-cell">{{ calcularNumDestetados(ficha) }}</td>

                            <!-- Acciones -->
                            <td class="py-3 text-center">
                                <div v-if="$page.props.user.permissions.includes('update_cerda')"
                                    class="w-1/2 mt-3 mb-1">
                                    <button type="button" @click="openModal(ficha)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="hover:text-green-500 text-green-400 w-8 h-8">
                                            <path stroke-linecap="round" stroke-linejoin="round" class="mx-auto"
                                                d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Botón para añadir cubrición -->
        <div class="">
            <button @click="createCubricion" type="button" class="w-full py-12 h-10 mt-10 text-xl bg-green-500 hover:bg-green-400 
                            text-gray-700 font-bold flex items-center justify-center rounded 
                            focus:outline-none focus:shadow-outline mb-3">
                AÑADIR CUBRICIÓN
            </button>
        </div>
        <!-- Modal de edición -->
        <div v-if="modalOpen"
            class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none">
            <div class="relative w-auto max-w-lg rounded-md mx-auto my-6">
                <div class="relative bg-gray-300 rounded-lg shadow-lg">
                    <div class="flex p-6 bg-gray-900 rounded-t-md justify-center">
                        <p class=" text-lgl"><b class="text-white">CERDA</b> <b class="text-green-600 text-xl">{{
                            editedFicha.id_cerda }}</b> <b class="text-gray-500">/</b> <b
                                class="text-white">CUBRICION </b> <b class="text-green-600 text-xl">{{
                                    editedFicha.id_cubricion }} </b> </p>
                    </div>
                    <form @submit.prevent="submitForm" class="flex flex-wrap">
                        <div class="p-6 w-full md:w-1/3">
                            <label for="fecha_cubricion" class="mt-2 block text-sm font-medium text-gray-700">FEC.
                                CUBRICION</label>
                            <input type="date" v-model="editedFicha.fecha_cubricion" id="fecha_cubricion"
                                name="fecha_cubricion" class="border rounded-md w-full" required>

                            <label for="estado" class="mt-2 block text-sm font-medium text-gray-700">ESTADO</label>
                            <select v-model="editedFicha.estado" id="estado" name="estado"
                                class="p-2 border rounded-md w-full">
                                <option value="aborto">Aborto</option>
                                <option value="vacia">Vacia</option>
                                <option value="repetida">Repetida</option>
                                <option value="sucia">Sucia</option>
                                <option value="ca">CA</option>
                                <option value="cv">CV</option>
                            </select>
                        </div>
                        <div class="p-6 w-full md:w-1/3">
                            <label for="fecha_parto" class="mt-2 block text-sm font-medium text-gray-70">FEC.
                                PARTO</label>
                            <input type="date" v-model="editedFicha.fecha_parto" id="fecha_parto" name="fecha_parto"
                                class="p-2 border rounded-md w-full">

                            <label for="nacidos_vivos" class="mt-2 block text-sm font-medium text-gray-70">NAC.
                                VIVOS</label>
                            <input type="number" v-model="editedFicha.nacidos_vivos" id="nacidos_vivos"
                                name="nacidos_vivos" class="p-2 border rounded-md w-full" min="0" max="15000">

                            <label for="nacidos_muertos" class="mt-2 block text-sm font-medium text-gray-70">NAC.
                                MUERTOS</label>
                            <input type="number" v-model="editedFicha.nacidos_muertos" id="nacidos_muertos"
                                name="nacidos_muertos" class="p-2 border rounded-md w-full" min="0" max="15000">

                            <label for="nacidos_momificados"
                                class="mt-2 block text-sm font-medium text-gray-70">MOMIFICADOS</label>
                            <input type="number" v-model="editedFicha.nacidos_momificados" id="nacidos_momificados"
                                name="nacidos_momificados" class="p-2 border rounded-md w-full" min="0" max="15000">

                            <label for="num_adoptados"
                                class="mt-2 block text-sm font-medium text-gray-70">ADOPTADOS</label>
                            <input type="number" v-model="editedFicha.num_adoptados" id="num_adoptados"
                                name="num_adoptados" class="p-2 border rounded-md w-full" min="0" max="15000">

                            <label for="num_cedidos" class="mt-2 block text-sm font-medium text-gray-70">CEDIDOS</label>
                            <input type="number" v-model="editedFicha.num_cedidos" id="num_cedidos" name="num_cedidos"
                                class="p-2 border rounded-md w-full" min="0" max="15000">
                        </div>
                        <div class="p-6 w-full md:w-1/3">
                            <label for="fecha_destete" class="mt-2 block text-sm font-medium text-gray-7">FEC.
                                DESTETE</label>
                            <input type="date" v-model="editedFicha.fecha_destete" id="fecha_destete"
                                name="fecha_destete" class="p-2 border rounded-md w-full">

                            <label for="num_bajas" class="mt-2 block text-sm font-medium text-gray-70">BAJAS</label>
                            <input type="number" v-model="editedFicha.num_bajas" id="num_bajas" name="num_bajas"
                                class="p-2 border rounded-md w-full" min="0" max="15000">

                            <label for="num_destetados"
                                class="mt-2 block text-sm font-medium text-gray-70">DESTETADOS</label>
                            <input type="number" v-model="editedFicha.num_destetados" id="num_destetados"
                                name="num_destetados" class="p-2 border rounded-md w-full" min="0" max="15000" readonly>

                        </div>
                        <div class="w-full bg-gray-900 rounded-b-md p-4 flex justify-center">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Guardar
                                cambios</button>
                            <button type="button" @click="closeModal"
                                class="ml-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import { ref, watchEffect } from 'vue';
import axios from 'axios';

export default {
    data() {
        return {
            modalOpen: false,
            editedFicha: {
                id_cubricion: '',
                fecha_cubricion: '',
                estado: '',
                fecha_parto: '',
                nacidos_vivos: '',
                nacidos_muertos: '',
                nacidos_momificados: '',
                num_adoptados: '',
                num_cedidos: '',
                num_bajas: '',
                fecha_destete: '',
                num_destetados: ''
            }
        }
    },
    methods: {
        openModal(ficha) {
            this.editedFicha = Object.assign({}, ficha);
            this.modalOpen = true;
        },
        closeModal() {
            this.modalOpen = false;
        },
        submitForm() {
            axios.put('/api/cubriciones/' + this.editedFicha.id_cubricion, this.editedFicha)
                .then(response => {
                    console.log('Datos actualizados correctamente');
                    // Buscamos la ficha modificada en this.fichas y la actualizamos
                    const index = this.fichas.findIndex(ficha => ficha.id_cubricion === this.editedFicha.id_cubricion);
                    if (index !== -1) {
                        this.fichas.splice(index, 1, response.data.cubricion);
                    }
                    this.closeModal();
                })
                .catch(error => {
                    console.error('Error al actualizar los datos:', error);
                    // Manejar el error adecuadamente
                });
        },
        calcularNumDestetados(ficha) {
            const resultado = parseInt(ficha.nacidos_vivos) + parseInt(ficha.num_adoptados) -
                parseInt(ficha.num_cedidos) - parseInt(ficha.num_bajas);

            // Verificamos si el resultado es un número
            if (!isNaN(resultado)) {
                return resultado;
            } else {
                return ''; // Devolvemos una cadena vacía si el resultado no es un número
            }
        },
        async createCubricion() {
            try {
                // Crear la fecha de cubrición como la fecha actual
                const fechaCubricion = new Date().toISOString().split('T')[0];

                const response = await axios.post(`/api/cubriciones`, {
                    id_cerda: this.idficha,
                    fecha_cubricion: fechaCubricion
                    // Puedes agregar otros campos aquí si es necesario
                });

                if (response.status === 201) {
                    // Creación exitosa, puedes mostrar un mensaje o realizar otras acciones
                    console.log('Cubrición creada con éxito');

                    // Actualizar la lista de cubriciones
                    const updatedResponse = await axios.get(`/api/cubriciones/${this.idficha}`);
                    this.fichas = updatedResponse.data;

                } else {
                    // Manejo de errores si la solicitud falla
                    console.error('Error al crear cubrición');
                }
            } catch (error) {
                // Manejo de errores si hay algún problema de red
                console.error('Error de red al crear cubrición:', error);
            }
        }
    },
    setup() {
        const idficha = ref(window.location.pathname.split('/').pop());
        const indicesCabecera = [
            "",
            "Fecha Cubricion", "Estado", "Fecha Parto",
            "Vivos", "Muertos", "Momificados",
            "Adoptados", "Cedidos", "Bajas", "Fecha Destete",
            "Destetados"
        ];
        const fichas = ref([]);

        watchEffect(() => {
            const fetchData = async () => {
                try {
                    const response = await axios.get(`/api/cubriciones/${idficha.value}`);
                    fichas.value = response.data;
                    console.log(fichas.value);
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
            };

            fetchData();
        });

        return {
            idficha,
            indicesCabecera,
            fichas
        };
    }
};
</script>
<style>
.numeric-cell {
    width: 7vw;
    /* Ajusta este valor según sea necesario */
}

.date-cell {
    width: 9vw;
    /* Ajusta este valor según sea necesario */
}
</style>
