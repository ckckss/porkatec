<template>
  <div class="p-6 bg-gray-700 h-screen">
    <!-- Encabezado -->
    <div class="w-full h-30 flex justify-end">
      <!-- Panel de Control -->
      <div class="w-2/3 my-auto ml-24 text-left mr-10 pb-8">
        <b class="text-green-300 text-4xl"><b class="text-5xl">/</b> NAVES</b>
      </div>
      <!-- Botón para Crear Nuevo Nave -->
      <button @click="showCreateModal = true" v-if="$page.props.user.permissions.includes('create_nave')" type="button"
        class="w-1/4 h-15 flex justify-end items-center pr-8 bg-green-300 hover:bg-green-400 pb-8 rounded-l-lg">
        <div class="flex items-center text-gray-800 pt-8">
          <div class="w-10 h-10 rounded-full bg-gray-700 text-green-300 hover:bg-gray-600 hover:text-green-400">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="1.5"
              stroke="currentColor" class="w-5 h-5 mt-2 ml-2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
          </div>
          <b class="ml-2 hidden lg:block">AÑADIR NAVE</b>
        </div>
      </button>
    </div>

    <!-- Tabla -->
    <table class="w-full">
      <thead>
        <tr class="text-xl text-center h-10 bg-gray-600 text-green-500 text-left">
          <th class="w-auto cursor-pointer" @click="sortNavesById">
            ID NAVE
            <span v-if="sortDirection === 'asc'">↑</span>
            <span v-else>↓</span>
          </th>
          <th class="text-center w-auto">
            NOMBRE
          </th>
          <th class="w-auto"></th>
        </tr>
      </thead>
      <tbody class="border-t">
        <tr class="h-12 text-center border-t bg-gray-500 text-green-400" v-for="(nave, index) in sortedNaves"
          :key="nave.id_nave">
          <td>
            {{ nave.id_nave }}
          </td>
          <td>
            {{ nave.nombre }}
          </td>
          <td class="w-full flex items-center justify-center">
            <div v-if="$page.props.user.permissions.includes('update_nave')" class="w-1/2 mt-3 mb-1">
              <button type="button" @click="showEditModal(nave)">
                <svg class="h-8 w-8 hover:text-blue-600 text-blue-500" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
              </button>
            </div>
            <div v-if="$page.props.user.permissions.includes('delete_nave')" class="w-1/2 mt-3 mb-1">
              <button type="button" @click="deleteNave(nave.id_nave)">
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

  <!-- Modal Editar Nave -->
  <div v-if="showEditModalFlag" class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-75">
    <div class="bg-white rounded-lg">
      <div class="p-4 rounded-t-md bg-gray-900">
        <h2 class="text-xl font-bold text-white">EDITAR NAVE</h2>
      </div>
      <div class="bg-gray-300 px-4 pt-4 pb-16">
        <label for="nave" class="block text-sm font-medium">Nombre de la nave</label>
        <input type="text" v-model="editNaveName" class="border border-gray-300 rounded-md px-4 py-2" />
      </div>
      <div class="rounded-b-md flex justify-end bg-gray-900 p-4">
        <button @click="showEditModalFlag = false" class="mr-2 py-2 rounded-md shadow-sm hover:bg-gray-600 bg-gray-500 hover:border-black border-gray-400 border px-4 inline-flex items-center border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Cancelar</button>
        <button @click="updateNave" class="ml-4 bg-green-300 rounded-md shadow-sm hover:bg-green-400 hover:border-green-600 border-gray-400 border px-4 inline-flex items-center py-2 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Guardar</button>
      </div>
    </div>
  </div>

<!-- Modal Crear Nave -->
<div v-if="showCreateModal" class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-75">
  <div class="">
    <div class="p-4 rounded-t-md bg-gray-900">
      <h2 class="text-lg font-bold text-white">CREAR NAVE</h2>
    </div>
    <div class="bg-gray-300 px-4 pt-4 pb-16">
       <label for="nave" class="block text-sm font-medium">Nombre de la nave</label>
      <input type="text" v-model="newNaveName" placeholder="Nombre de la nave" class="border border-gray-300 rounded-md px-4 py-2" />
    </div>
    <div class="bg-gray-900 p-4 rounded-b-md">
      <div class="flex justify-end">
        <button type="button" @click="showCreateModal = false" class="mr-2 px-4 py-2 rounded-md shadow-sm hover:bg-gray-600 bg-gray-500 hover:border-black border-gray-400 border inline-flex items-center font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">
          Cancelar
        </button>
        <button @click="createNave" class="ml-4 bg-green-300 rounded-md shadow-sm hover:bg-green-400 hover:border-green-600 border-gray-400 border px-4 inline-flex items-center font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">
          Guardar
        </button>
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
    const newNaveName = ref('');
    const editNaveName = ref('');
    const naves = ref([]);
    const editNaveId = ref(null);
    const sortDirection = ref('asc');

    const fetchData = async () => {
      try {
        const response = await axios.get('/api/naves');
        naves.value = response.data;
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };

    const createNave = async () => {
      try {
        await axios.post('/api/naves/', {
          nombre: newNaveName.value
        });
        showCreateModal.value = false;
        newNaveName.value = '';
        fetchData();
      } catch (error) {
        console.error('Error creating nave:', error);
      }
    };

    const showEditModal = (nave) => {
      editNaveId.value = nave.id_nave;
      editNaveName.value = nave.nombre;
      showEditModalFlag.value = true;
    };

    const updateNave = async () => {
      try {
        await axios.put(`/api/naves/${editNaveId.value}`, {
          nombre: editNaveName.value
        });
        showEditModalFlag.value = false;
        editNaveName.value = '';
        fetchData();
      } catch (error) {
        console.error('Error updating nave:', error);
      }
    };

    const deleteNave = async (id) => {
      try {
        await axios.delete(`/api/naves/${id}`);
        fetchData();
      } catch (error) {
        console.error('Error deleting nave:', error);
      }
    };

    const sortNavesById = () => {
      sortDirection.value = sortDirection.value === 'asc' ? 'desc' : 'asc';
    };

    const sortedNaves = computed(() => {
      return [...naves.value].sort((a, b) => {
        if (sortDirection.value === 'asc') {
          return a.id_nave - b.id_nave;
        } else {
          return b.id_nave - a.id_nave;
        }
      });
    });

    onMounted(() => {
      fetchData();
    });

    return {
      showCreateModal,
      showEditModalFlag,
      newNaveName,
      editNaveName,
      naves,
      sortDirection,
      createNave,
      showEditModal,
      updateNave,
      deleteNave,
      sortNavesById,
      sortedNaves
    };
  }
};
</script>
