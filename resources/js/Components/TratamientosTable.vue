<template>

  <!-- component -->
  <div class="text-gray-900 bg-gray-700">
    <!-- Panel de Control -->
    <div class="w-2/3 text-left mr-10 pb-8">
      <p class="pl-4 pt-8 font-bold text-3xl text-green-400">PANEL DE CONTROL
        <b class="text-green-300"> /TRATAMIENTOS CERDA <b class="text-4xl text-green-500">{{ this.idCerda }}</b></b>
      </p>
    </div>
    <!-- Botón para añadir tratamiento -->
    <div class="px-3 pt-4 flex justify-center">
      <div class="w-full">
        <table class="w-full text-md bg-white shadow-md">
          <thead class="bg-gray-900">
            <!-- CABECERA -->
            <tr class="ml-4 text-xl">
              <th class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/6">
                ID TRATAMIENTO</th>
              <th class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/5">
                FECHA COMIENZO</th>
              <th class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/5">
                FECHA CONCLUSIÓN</th>
              <th class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/5">
                MEDICAMENTO</th>
              <th class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-1/6">
                ENFERMEDAD</th>
              <th class="text-md h-10 bg-gray-600 text-green-400 text-center border-b border-white w-auto">
              </th>
            </tr>
          </thead>
          <tbody class="bg-gray-500">
            <!-- DATOS -->
            <tr v-for="(tratamiento, index) in tratamientos" :key="tratamiento.id_tratamiento"
              class="border-t bg-gray-500 text-green-200'">
              <!-- Columnas de datos -->
              <td class="py-3 text-center bg-gray-600 w-auto text-xl text-green-400">{{ tratamiento.id_tratamiento }}
              </td>
              <td class="py-3 text-center">{{ tratamiento.fecha_comienzo }}</td>
              <td class="py-3 text-center">{{ tratamiento.fecha_conclusion }}</td>
              <td class="py-3 text-center">{{ tratamiento.medicamento ? tratamiento.medicamento.nombre : '' }}</td>
              <td class="py-3 text-center">{{ tratamiento.enfermedad }}</td>
              <!-- Acciones -->
              <td class="py-3 text-center">
                <div class="w-1/2 mt-3 mb-1">
                  <button type="button" @click="openModal(tratamiento)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="text-green-400 hover:text-green-500 w-8 h-8">
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
    <div class="">
      <button @click="createTratamiento" type="button" class="w-full py-12 h-10 mt-10 text-xl bg-green-500 hover:bg-green-400 
                            text-gray-700 font-bold flex items-center justify-center rounded 
                            focus:outline-none focus:shadow-outline mb-3">
        AÑADIR TRATAMIENTO
      </button>
    </div>
    <div v-if="modalOpen" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
      aria-modal="true">
      <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
          class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <!-- Contenido del formulario -->
          <div class="flex p-6 bg-gray-900 rounded-t-md justify-center">
            <p class=" text-lgl"><b class="text-white">CERDA</b> <b class="text-green-600 text-xl">{{
              editedTratamiento.id_cerda }}</b> <b class="text-gray-500">/</b> <b class="text-white">TRATAMIENTO </b> <b
                class="text-green-600 text-xl">{{ editedTratamiento.id_tratamiento }} </b> </p>
            <button @click="modalOpen = false" type="button"
              class="bg-gray-900 text-gray-400 hover:text-gray-300 focus:outline-none focus:text-gray-300 absolute top-0 right-0 mt-4 mr-4">
              <span class="sr-only">Cerrar</span>
              <!-- Icono para cerrar el modal -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <!-- Formulario para editar tratamiento -->
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                <!-- Campos del formulario -->
                <label for="fecha_conclusion" class="block text-sm font-medium text-gray-700">Fecha Conclusión</label>
                <input type="date" v-model="editedTratamiento.fecha_conclusion" id="fecha_conclusion"
                  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />

                <label for="id_medicamento" class="block text-sm font-medium text-gray-700">Medicamento</label>
                <select v-model="editedTratamiento.id_medicamento" id="id_medicamento"
                  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option v-for="medicamento in medicamentos" :key="medicamento.id" :value="medicamento.id">
                    {{ medicamento.nombre }}
                  </option>
                </select>

                <label for="enfermedad" class="block text-sm font-medium text-gray-700">Enfermedad</label>
                <input type="text" v-model="editedTratamiento.enfermedad" id="enfermedad"
                  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
              </div>
            </div>
          </div>
          <!-- Botón para guardar cambios -->
          <div class="bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button @click="saveChanges" type="button"
              class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
              Guardar cambios
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>import { ref, watchEffect } from 'vue';
import axios from 'axios';

export default {
  data() {
    return {
      modalOpen: false,
      newTratamiento: {
        id_cerda: this.idCerda,
        id_medicamento: '',
        fecha_comienzo: new Date().toISOString().substr(0, 10),
        fecha_conclusion: '',
        enfermedad: ''
      },
      editedTratamiento: {
        id_cerda: this.idCerda,
        id_medicamento: '',
        fecha_comienzo: '',
        fecha_conclusion: '',
        enfermedad: ''
      }
    }
  },
  methods: {
    async createTratamiento() {
      try {
        // Realizar la solicitud POST al servidor para guardar el nuevo tratamiento
        console.log(this.newTratamiento)
        await axios.post('/api/tratamientos', this.newTratamiento);

        // Actualizar la lista de tratamientos para reflejar el cambio en la tabla
        this.fetchData();

        // Agregar un mensaje de confirmación
        console.log('Tratamiento guardado correctamente');

      } catch (error) {
        console.error('Error al guardar el tratamiento:', error);
      }
    },
    async fetchData() {
      try {
        const response = await axios.get(`/api/tratamientos/cerda/${this.idCerda}`);
        const responsemed = await axios.get(`/api/medicamentos`);
        // Asignar solo el array de tratamientos a la variable tratamientos
        this.tratamientos = response.data.tratamientos;
        // Asignar solo el array de medicamentos a la variable medicamentos
        this.medicamentos = responsemed.data;
      } catch (error) {
        console.error('Error al obtener los tratamientos:', error);
      }
    },
    async openModal(tratamiento) {
      // Abrir modal para editar tratamiento y asignar los valores del tratamiento seleccionado
      this.modalOpen = true;
      this.editedTratamiento = { ...tratamiento };
    },
    async saveChanges() {
      try {
        console.log(this.editedTratamiento.id_tratamiento);
        // Realizar solicitud PUT al servidor para actualizar el tratamiento
        await axios.put(`/api/tratamientos/${this.editedTratamiento.id_tratamiento}`, this.editedTratamiento);
        // Cerrar el modal después de guardar los cambios
        this.modalOpen = false;
        // Actualizar la lista de tratamientos
        this.fetchData();
        // Agregar un mensaje de confirmación
        console.log('Cambios guardados correctamente');
      } catch (error) {
        console.error('Error al guardar los cambios:', error);
      }
    },
  },
  setup() {
    const idCerda = ref(window.location.pathname.split('/').pop());
    var tratamientos = ref([]);
    var medicamentos = ref([]);
    watchEffect(() => {
      const fetchData = async () => {
        try {
          const response = await axios.get(`/api/tratamientos/cerda/${idCerda.value}`);
          const responsemed = await axios.get(`/api/medicamentos`);
          tratamientos.value = response.data.tratamientos;
          medicamentos.value = responsemed.data; // Asignación corregida
          console.log(medicamentos.value); // Utiliza medicamentos.value para acceder a los datos
        } catch (error) {
          console.error('Error fetching data:', error);
        }
      };

      fetchData();
    });

    return {
      idCerda,
      tratamientos,
      medicamentos
    };
  }
};

</script>
