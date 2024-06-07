    <template>
        <div class="p-6 bg-gray-700">
            <!-- Encabezado -->
            <div class="w-full h-30 flex justify-end">
                <!-- Panel de Control -->
                <div class="w-2/3 my-auto ml-24 text-left mr-10 pb-8">
                    <b class="text-green-300 text-4xl"><b class="text-5xl">/</b> CERDAS</b>
                </div>
                <!-- Botón para Crear Nuevo Usuario -->
                <button v-if="$page.props.user.permissions.includes('create_cerda')" type="button"
                    @click="openCreateModal"
                    class="w-1/4 h-15 flex justify-end items-center pr-8 bg-green-300 hover:bg-green-400 pb-8 rounded-l-lg">
                    <div class="flex items-center text-gray-800 pt-8">
                        <div
                            class="w-10 h-10 rounded-full bg-gray-700 text-green-300 hover:bg-gray-600 hover:text-green-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 mt-2 ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <b class="ml-2 hidden lg:block">AÑADIR CERDA</b>
                    </div>
                </button>
                <div class="w-auto text-left border border-green-300 rounded-r">
                    <input type="text" v-model="searchQuery" placeholder="Buscar cerda (NFC o ID)"
                        class="text-left text-black py-16 px-12 bg-gray-300 focus:border-green-300 hover:border-green-300 active:border-green-300 rounded-r active:rounded-r hover:rounded-r focused:rounded-r">
                </div>
            </div>

            <!-- Tabla -->
            <table class="w-full ">
                <thead class="">
                    <tr class="text-center text-xl h-10 bg-gray-600 text-green-500 text-left">
                        <th class="w-auto cursor-pointer" @click="sortByColumn('id_cerda')">
                            ID CERDA
                            <span v-if="sortDesc === false || sortBy === 'nfc'">↑</span>
                            <span v-else>↓</span>
                        </th>

                        <th class="w-auto">ID NAVE</th>
                        <th class="w-auto cursor-pointer" @click="sortByColumn('nfc')">
                            NÚMERO NFC
                            <span v-if="sortDesc === false || sortBy === 'id_cerda'">↑</span>
                            <span v-else>↓</span>
                        </th>
                        <th class="w-auto"></th>
                    </tr>
                </thead>
                <tbody class="border-t">
                    <tr class="text-center h-12 border-t bg-gray-500 text-green-400"
                        v-for="(cerda, index) in visibleCerdas" :key="cerda.id_cerda">
                        <td class="text-green-300">
                            {{ cerda.id_cerda }}
                        </td>
                        <td>
                            {{ cerda.id_nave }}
                        </td>
                        <td>
                            {{ cerda.nfc }}
                        </td>
                        <td class="w-auto flex items-center justify-center">
                            <div class="w-1/3 mt-3 mr-2 mb-1">
                                <button type="button" @click="redirectToMedicamento(cerda.id_cerda)">
                                    <svg class="pill-icon h-8 w-8" fill="#FFD700" viewBox="0 0 512 512">
                                        <path
                                            d="M469.127,42.874C441.479,15.226,404.72,0,365.62,0c-39.1,0-75.859,15.226-103.506,42.873L152.5,152.489
                                                c-0.002,0.002-0.003,0.003-0.005,0.005L42.873,262.114C15.226,289.762,0,326.521,0,365.62s15.226,75.858,42.873,103.506
                                                C70.521,496.774,107.28,512,146.38,512s75.859-15.226,103.506-42.873L359.5,359.511c0.002-0.002,0.003-0.003,0.005-0.005
                                                l109.62-109.62C496.774,222.238,512,185.479,512,146.38C512,107.28,496.774,70.521,469.127,42.874z M235.461,454.702
                                                c-23.794,23.795-55.431,36.9-89.081,36.9c-33.65,0-65.288-13.105-89.082-36.9c-23.795-23.794-36.9-55.431-36.9-89.082
                                                c0-33.651,13.105-65.287,36.9-89.082L159.706,174.13L337.87,352.294L235.461,454.702z M454.702,235.461L352.294,337.87
                                                L174.13,159.706L276.539,57.298c23.794-23.795,55.431-36.9,89.081-36.9c33.65,0,65.288,13.105,89.082,36.9
                                                c23.795,23.794,36.9,55.431,36.9,89.082C491.602,180.03,478.497,211.667,454.702,235.461z" />
                                        <path
                                            d="M77.586,287.544c-3.984-3.983-10.44-3.983-14.424,0.001l-4.08,4.08c-3.983,3.983-3.983,10.441,0,14.425
                                                c1.992,1.991,4.601,2.986,7.212,2.986c2.611,0,5.22-0.995,7.212-2.987l4.08-4.08C81.569,297.986,81.569,291.528,77.586,287.544z" />
                                        <path d="M168.359,196.771c-3.984-3.983-10.44-3.983-14.424,0.001l-65.275,65.275c-3.983,3.983-3.983,10.441,0,14.425
                                                c1.992,1.991,4.601,2.986,7.212,2.986c2.611,0,5.22-0.995,7.212-2.987l65.275-65.275
                                                C172.342,207.213,172.342,200.755,168.359,196.771z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="w-1/3 mt-3 mb-1">
                                <button type="button" @click="redirectToCerda(cerda.id_cerda)">
                                    <svg class="w-8 h-8 hover:text-green-500 text-green-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                                    </svg>
                                </button>
                            </div>
                            <div v-if="$page.props.user.permissions.includes('update_cerda')" class="w-1/3 mt-3 mb-1">
                                <button type="button" @click="openModal(cerda)">
                                    <svg class="h-8 w-8 hover:text-blue-600 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                            </div>
                            <div v-if="$page.props.user.permissions.includes('delete_cerda')" class="w-1/3 mt-3 mb-1">
                                <button type="button" @click="deleteCerda(cerda.id_cerda)">
                                    <svg class="h-8 w-8 hover:text-red-600 text-red-500" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- MODAL UPDATE -->
            <div v-if="showModal" class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen">
                    <div class="relative bg-gray-400 border-green-500 rounded-lg max-w-lg mx-auto">
                        <!-- Modal content -->
                        <div class="p-4 rounded-t-md bg-gray-900">
                            <h2 class="text-lg font-bold text-white">EDITAR CERDA</h2>
                        </div>
                        <!-- Formulario para actualizar usuario -->
                        <form @submit.prevent="updateCerda">
                            <!-- Campos del formulario para actualizar usuario -->
                            <!-- Por ejemplo: -->
                            <div class="mb-4 pt-4 w-5/6 ml-4">
                                <label for="nave" class="block text-sm font-medium">ID Nave</label>
                                <select v-model="selectedCerda.id_nave"
                                    class="mt-1 focus:ring-green-500 focus:border-green-400 block w-full shadow-sm sm:text-sm border-green-300 rounded-md p-2">
                                    <option v-for="(nave, index) in naves" :key="nave.id_nave" :value="nave.id_nave">
                                        {{ nave.nombre }}
                                    </option>
                                </select>
                            </div>
                            <div class="mb-4 pb-2 w-5/6 ml-4">
                                <label for="nave" class="block text-sm font-medium">Numero NFC</label>
                                <input type="number" id="nave" v-model="selectedCerda.nfc"
                                    class="mt-1 focus:ring-green-500 focus:border-green-400 block w-full shadow-sm sm:text-sm border-green-300 rounded-md p-2">
                            </div>
                            <!-- Botones del formulario -->
                            <div class="bg-gray-900 p-4 rounded-b-md">
                                <div class="flex justify-end">
                                    <button type="button" @click="closeModal"
                                        class="mr-2 px-4 py-2 rounded-md shadow-sm hover:bg-gray-600 bg-gray-500 hover:border-black border-gray-400 border px-4 inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Cancelar</button>
                                    <button type="submit"
                                        class="ml-4 bg-green-300 rounded-md shadow-sm hover:bg-green-400 hover:border-green-600 border-gray-400 border px-4 inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- MODAL CREATE -->
            <div v-if="showCreateModal" class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen">
                    <div class="relative bg-gray-400 border-green-500 rounded-lg max-w-lg mx-auto">
                        <!-- Modal content -->
                        <div class="p-4 rounded-t-md bg-gray-900">
                            <h2 class="text-lg font-bold text-white">CREAR CERDA</h2>
                        </div>
                        <!-- Formulario para crear un nuevo nave -->
                        <form @submit.prevent="createCerda">
                            <div class="bg-gray-300 rounded-b-lg">
                                <!-- Campos del formulario para crear una nueva cerda -->
                                <div class="mb-4 pt-4 w-5/6 ml-4">
                                    <label for="newCerdaNFC" class="block text-sm font-medium">Numero NFC</label>
                                    <input type="number" id="newCerdaNFC" v-model="newCerda.nfc"
                                        class="mt-1 focus:ring-green-500 focus:border-green-400 block w-full shadow-sm sm:text-sm border-green-300 py-2 rounded-md">
                                </div>
                                <!-- Campo de selección para la nave -->
                                <div class="mb-4 pb-2 w-5/6 ml-4">
                                    <label for="newCerdaNave" class="block text-sm font-medium">Nave</label>
                                    <select id="newCerdaNave" v-model="newCerda.id_nave"
                                        class="mt-1 focus:ring-green-500 focus:border-green-400 block w-full shadow-sm sm:text-sm border-green-300 rounded-md py-2">
                                        <option v-for="(nave, index) in naves" :key="nave.id_nave"
                                            :value="nave.id_nave">
                                            {{ nave.nombre }}
                                        </option>
                                    </select>
                                </div>
                                <!-- Botones del formulario -->
                                <div class="bg-gray-900 p-4 rounded-b-md">
                                    <div class="flex justify-end">
                                        <button type="button" @click="closeCreateModal"
                                            class="mr-2 px-4 py-2 rounded-md shadow-sm hover:bg-gray-600 bg-gray-500 hover:border-black border-gray-400 border px-4 inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Cancelar</button>
                                        <button type="submit"
                                            class="ml-4 bg-green-300 rounded-md shadow-sm hover:bg-green-400 hover:border-green-600 border-gray-400 border px-4 inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </template>

<script>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';
import tableHeadersVue from './tableHeaders.vue'
export default {
    data() {
        return {
            sortBy: '',
            sortDesc: true,
            showModal: false,
            showCreateModal: false,
            selectedCerda: null,
            newCerda: {
                id_nave: '',
                nfc: '',
            },
            naves: [],
            searchQuery: '',
        }
    },
    setup() {
        const searchQuery = ref('')
        const cerdas = ref([]);
        const naves = ref([]);

        const fetchData = async () => {
            try {
                const response = await axios.get(`/api/cerdas`);
                cerdas.value = response.data;

                const navesResponse = await axios.get(`/api/naves`);
                naves.value = navesResponse.data;
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        };
        onMounted(() => {
            fetchData();
        });
        const visibleCerdas = computed(() => {
            if (searchQuery.value === '') {
                return cerdas.value;
            } else {
                return cerdas.value.filter(cerda => {
                    return cerda.id_cerda.toString().includes(searchQuery.value) || cerda.nfc.toString().includes(searchQuery.value);
                });
            }
        });

        return {
            cerdas,
            naves,
            visibleCerdas,
            searchQuery
        };
    },
    computed: {
        filteredCerdas() {
            const searchTextLower = this.searchText.trim().toLowerCase();
            return this.cerdas.filter(cerda => {
                return cerda.nfc.toString().toLowerCase().includes(searchTextLower) ||
                    cerda.id_nave.toString().toLowerCase().includes(searchTextLower);
            });
        }
    },
    methods: {
        redirectToCerda(id_cerda) {
            // Redirige a la ruta específica pasando el ID de la cerda como parámetro
            window.location.href = `fichas/${id_cerda}`;
        },
        redirectToMedicamento(id_cerda) {
            // Redirige a la ruta específica pasando el ID de la cerda como parámetro
            window.location.href = `tratamientos/${id_cerda}`;
        },
        ////////////////////////////////
        //        MODAL UPDATE        //
        ////////////////////////////////
        openModal(cerda) {
            this.selectedCerda = cerda;
            this.showModal = true;
            // Additional logic for fetching user data or anything else needed when opening the modal
        },
        closeModal() {
            this.selectedCerda = null;
            this.showModal = false;
            // Additional logic for resetting form fields or any other cleanup needed when closing the modal
        },
        async updateCerda() {
            try {
                const response = await fetch(`/api/cerdas/${this.selectedCerda.id_cerda}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        id_nave: this.selectedCerda.id_nave,
                        nfc: this.selectedCerda.nfc
                        // Agrega aquí otros campos si es necesario
                    })
                });
                if (response.ok) {
                    // Actualización exitosa, puedes mostrar un mensaje o realizar otras acciones
                    console.log('Cerda actualizado con éxito');
                    this.closeModal();
                } else {
                    // Manejo de errores si la solicitud falla
                    console.error('Error al actualizar cerda');
                }
            } catch (error) {
                // Manejo de errores si hay algún problema de red
                console.error('Error de red al actualizar cerda:', error);
            }
        },

        ////////////////////////////////
        //        MODAL CREATE        //
        ////////////////////////////////
        openCreateModal() {
            this.showCreateModal = true;
        },
        closeCreateModal() {
            this.showCreateModal = false;
            this.newCerda = { nfc: '', id_nave: '' };
        },
        async createCerda() {
            try {
                const existingCerda = this.cerdas.find(cerda => cerda.nfc === this.newCerda.nfc);
                if (existingCerda) {
                    alert('Ya existe una cerda con este número NFC.');
                    return;
                }

                const response = await fetch(`/api/cerdas`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        nfc: this.newCerda.nfc,
                        id_nave: this.newCerda.id_nave,
                    })
                });
                if (response.ok) {
                    console.log('Cerda creado con éxito');
                    this.closeCreateModal();
                    const response = await axios.get(`/api/cerdas`);
                    this.cerdas = response.data;
                } else {
                    console.error('Error al crear cerda');
                }
            } catch (error) {
                console.error('Error de red al crear cerda:', error);
            }
        },
        ////////////////////////////////
        //            DELETE          //
        ////////////////////////////////
        deleteCerda(id_cerda) {
            // Hacer la solicitud DELETE a la API
            axios.delete(`/api/cerdas/${id_cerda}`)
                .then(response => {
                    console.log("Cerda deleted successfully:", response.data);
                    // Eliminar la cerda de la lista localmente después de una respuesta exitosa
                    this.cerdas = this.cerdas.filter(cerda => cerda.id_cerda !== id_cerda);
                })
                .catch(error => {
                    console.error('Error al eliminar cerda:', error);
                });
        },


        sortByColumn(column) {
            // Si ya estamos ordenando por la misma columna, cambia el tipo de ordenación
            if (this.sortBy === column) {
                this.sortDesc = !this.sortDesc;
            } else {
                // Si estamos ordenando por una nueva columna, la ordenación es ascendente
                this.sortBy = column;
                this.sortDesc = false;
            }
            // Llama a la función que actualiza la tabla con la nueva ordenación
            this.updateSortedData();
        },
        // Método para actualizar los datos de la tabla con la nueva ordenación
        updateSortedData() {
            // Utiliza Array.sort() para ordenar los datos según la columna seleccionada y el tipo de ordenación
            this.cerdas.sort((a, b) => {
                let modifier = 1;
                if (this.sortDesc) modifier = -1;
                // Si la columna es 'id_cerda', ordena por id_cerda, de lo contrario, ordena por nfc
                const propA = (this.sortBy === 'id_cerda') ? a.id_cerda : a.nfc;
                const propB = (this.sortBy === 'id_cerda') ? b.id_cerda : b.nfc;
                if (propA < propB) return -1 * modifier;
                if (propA > propB) return 1 * modifier;
                return 0;
            });
        }
    },
};
</script>

<style>
.pill-icon:hover {
    fill: #c4b425;
}
</style>