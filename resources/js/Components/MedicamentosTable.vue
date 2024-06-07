<template>
   <div class="p-6 bg-gray-700">
      <!-- Encabezado -->
      <div class="w-full h-30 flex justify-end">
         <!-- Panel de Control -->
         <div class="w-2/3 my-auto ml-24 text-left mr-10 pb-8">
            <b class="text-green-300 text-4xl"><b class="text-5xl">/</b> MEDICAMENTOS</b>
         </div>
         <!-- Botón para Crear Nuevo Medicamento -->
         <button @click="showCreateModal = true" type="button"
            class="w-1/4 h-15 flex justify-end items-center pr-8 bg-green-300 hover:bg-green-400 pb-8 rounded-l-lg">
            <div class="flex items-center text-gray-800 pt-8">
               <div class="w-10 h-10 rounded-full bg-gray-700 text-green-300 hover:bg-gray-600 hover:text-green-400">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="1.5"
                     stroke="currentColor" class="w-5 h-5 mt-2 ml-2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                  </svg>
               </div>
               <b class="ml-2 hidden lg:block">AÑADIR MEDICAMENTO</b>
            </div>
         </button>
      </div>

      <!-- Tabla -->
      <table class="w-full">
         <thead>
            <tr class="text-xl text-center h-10 bg-gray-600 text-green-500 text-left">
               <th class="w-1/6">
                  ID MEDICAMENTO
               </th>
               <th class="w-1/4">
                  NOMBRE
               </th>
               <th class="w-1/4">
                  DOSIS
               </th>
               <th class="w-1/4"></th>
            </tr>
         </thead>
         <tbody class="border-t">
            <tr class="text-center h-12 border-t bg-gray-500 text-green-400"
               v-for="(medicamento, index) in medicamentos" :key="medicamento.id">
               <td>
                  {{ medicamento.id }}
               </td>
               <td>
                  {{ medicamento.nombre }}
               </td>
               <td>
                  {{ medicamento.dosis }}
               </td>
               <td class="w-full flex items-center justify-center">
                  <!-- <div v-if="$page.props.user.permissions.includes('update_medicamento')" class="w-1/2 mt-3 mb-1"> -->
                  <div class="w-1/2 mt-3 mb-1">
                     <button type="button" @click="showEditModal(medicamento)">
                        <svg class="h-8 w-8 hover:text-blue-600 text-blue-500" fill="none" viewBox="0 0 24 24"
                           stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                     </button>
                  </div>
                  <!-- <div v-if="$page.props.user.permissions.includes('delete_medicamento')" class="w-1/2 mt-3 mb-1"> -->
                  <div class="w-1/2 mt-3 mb-1">
                     <button type="button" @click="deleteMedicamento(medicamento.id)">
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

      <!-- Modal Crear Medicamento -->
      <div v-if="showCreateModal" class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-75">
         <div class="bg-gray-300 rounded-lg">
            <div class="p-4 rounded-t-md bg-gray-900 pr-12">
               <h2 class="text-xl font-bold text-white">CREAR MEDICAMENTO</h2>
            </div>
            <div class="p-4">
               <div class="mb-4">
                  <label for="editMedName" class="block font-bold mb-2">Nombre del medicamento:</label>
                  <input type="text" v-model="newMedName" class="border border-gray-300 rounded-md px-4 py-2 w-full" />
               </div>
               <div class="mb-4">
                  <label for="editMedDosis" class="block font-bold mb-2">Dosis del medicamento:</label>
                  <input type="text" v-model="newMedDosis" class="border border-gray-300 rounded-md px-4 py-2 w-full" />
               </div>
            </div>
            <div class="bg-gray-900 p-4 rounded-b-md">
               <div class="flex justify-end">
                  <button @click="showCreateModal = false"
                     class="mx-auto px-4 py-2 rounded-md shadow-sm hover:bg-gray-600 bg-gray-500 hover:border-black border-gray-400 border px-4 inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Cancelar</button>
                  <button @click="createMedicamento"
                     class="mx-auto bg-green-300 rounded-md shadow-sm hover:bg-green-400 hover:border-green-600 border-gray-400 border px-4 inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Guardar</button>
               </div>
            </div>
            <button @click="closeCreateModal" class="absolute top-0 right-0 mt-2 mr-2">
          <svg class="h-6 w-6 text-green-300 hover:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
         </div>
      </div>

     <!-- Modal Editar Medicamento -->
  <div v-if="showEditModalFlag" class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-75">
    <div class="bg-gray-300 rounded-lg">
      <div class="p-4 rounded-t-md bg-gray-900 pr-12">
        <h2 class="text-xl font-bold text-white">EDITAR MEDICAMENTO</h2>
      </div>
      <div class="bg-gray-300 px-4 pt-4">
        <label for="editMedName" class="block font-bold mb-2">Nombre del medicamento</label>
        <input type="text" id="editMedName" v-model="editMedName" class="border border-gray-300 rounded-md px-4 py-2 mb-4 w-full" />
      </div>
      <div class="bg-gray-300 px-4 pb-6">
        <label for="editMedDosis" class="block font-bold mb-2">Dosis del medicamento</label>
        <input type="text" id="editMedDosis" v-model="editMedDosis" class="border border-gray-300 rounded-md px-4 py-2 w-full" />
      </div>
      <div class="bg-gray-900 p-4 rounded-b-md">
        <div class="flex justify-end">
          <button @click="showEditModalFlag = false" class="mx-auto px-4 py-2 rounded-md shadow-sm hover:bg-gray-600 bg-gray-500 hover:border-black border-gray-400 border px-4 inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Cancelar</button>
          <button @click="updateMedicamento" class="mx-auto bg-green-300 rounded-md shadow-sm hover:bg-green-400 hover:border-green-600 border-gray-400 border px-4 inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Guardar</button>
        </div>
      </div>
    </div>
  </div>
   </div>
</template>

<script>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';

export default {
   setup() {
      const showCreateModal = ref(false);
      const showEditModalFlag = ref(false);
      const newMedName = ref('');
      const newMedDosis = ref('');
      const editMedName = ref('');
      const editMedDosis = ref('');
      const medicamentos = ref([]);
      const editMedId = ref(null);
      const sortDirection = ref('asc');

      const fetchData = async () => {
         try {
            const response = await axios.get('/api/medicamentos');
            medicamentos.value = response.data;
         } catch (error) {
            console.error('Error fetching data:', error);
         }
      };

      const createMedicamento = async () => {
         try {
            await axios.post('/api/medicamentos/', {
               nombre: newMedName.value,
               dosis: newMedDosis.value
            });
            showCreateModal.value = false;
            newMedName.value = '';
            newMedDosis.value = '';
            fetchData();
         } catch (error) {
            console.error('Error creating medicamento:', error);
         }
      };

      const showEditModal = (medicamento) => {
         editMedId.value = medicamento.id;
         editMedName.value = medicamento.nombre;
         editMedDosis.value = medicamento.dosis;
         showEditModalFlag.value = true;
      };

      const updateMedicamento = async () => {
         try {
            await axios.put(`/api/medicamentos/${editMedId.value}`, {
               nombre: editMedName.value,
               dosis: editMedDosis.value
            });
            showEditModalFlag.value = false;
            editMedName.value = '';
            editMedDosis.value = '';
            fetchData();
         } catch (error) {
            console.error('Error updating nave:', error);
         }
      };

      const deleteMedicamento = async (id) => {
         try {
            await axios.delete(`/api/medicamentos/${id}`);
            fetchData();
         } catch (error) {
            console.error('Error deleting nave:', error);
         }
      };


      onMounted(() => {
         fetchData();
      });

      return {
         showCreateModal,
         showEditModalFlag,
         newMedName,
         newMedDosis,
         editMedName,
         editMedDosis,
         medicamentos,
         sortDirection,
         createMedicamento,
         showEditModal,
         updateMedicamento,
         deleteMedicamento,
      };
   }
};
</script>