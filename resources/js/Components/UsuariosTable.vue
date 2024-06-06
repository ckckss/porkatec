<template>

    <div class="p-6 bg-gray-700">

        <!-- Encabezado -->
        <div class="w-full h-30 flex justify-end">
            <!-- Panel de Control -->
            <div class="w-2/3 my-auto ml-24 text-left mr-10 pb-8">
                <b class="text-green-300 text-4xl"><b class="text-5xl">/</b> USUARIOS REGISTRADOS</b>
            </div>
            <!-- Botón para Crear Nuevo Usuario -->
            <button v-if="$page.props.user.permissions.includes('create_user')" type="button" @click="openCreateModal"
                class="w-1/4 h-15 flex justify-end items-center pr-8 bg-green-300 hover:bg-green-400 pb-8 rounded-l-lg">
                <div class="flex items-center text-gray-800 pt-8">
                    <div
                        class="w-10 h-10 rounded-full bg-gray-700 text-green-300 hover:bg-gray-600 hover:text-green-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mt-2 ml-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <b class="ml-2 lg:block">AÑADIR USUARIO</b>
                </div>
            </button>
        </div>

        <!-- Tabla -->
        <table v-if="$page.props.user.permissions.includes('read_user')" class="w-full rounded">
            <thead class="rounded-md">
                <tr class="text-center text-xl h-10 bg-gray-600 text-green-500 text-left">
                    <th class="w-auto">ID USUARIO</th>
                    <th class="w-auto">NOMBRE</th>
                    <th class="w-auto">CORREO</th>
                    <th class="w-auto">ROL</th>
                    <th class="w-auto"></th>
                </tr>
            </thead>
            <tbody class="border-t">
                <tr class="h-12 border-t text-center bg-gray-500 text-green-400" v-for="(user, index) in users"
                    :key="user.id">
                    <td>
                        {{ user.id }}
                    </td>
                    <td>
                        {{ user.name }}
                    </td>
                    <td>
                        {{ user.email }}
                    </td>
                    <td>
                        {{ user.role }}
                    </td>
                    <td class="w-full flex items-center justify-center">
                        <div v-if="$page.props.user.permissions.includes('update_user')" class="w-1/2 mt-3 mb-1">
                            <button type="button" @click="openModal(user)">
                                <svg class="h-8 w-8 hover:text-blue-600 text-blue-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                        </div>

                        <div v-if="$page.props.user.permissions.includes('delete_user')" class="w-1/2 mt-3 mb-1">
                            <button type="button" @click="deleteUser(user.id)">
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
        <div v-if="showModal" class="fixed inset-0 z-10 overflow-y-auto bg-gradient-to-b from-green-300 to-transparent">
            <div class="flex items-center justify-center min-h-screen">
                <div class="fixed inset-0 bg-green-300 opacity-50"></div>
                <div class="relative bg-gray-400 border-green-500 rounded-lg max-w-lg mx-auto p-8">
                    <!-- Modal content -->
                    <h2 class="text-xl font-bold mb-4">Actualizar Usuario</h2>
                    <!-- Formulario para actualizar usuario -->
                    <form @submit.prevent="updateUser">
                        <!-- Campos del formulario para actualizar usuario -->
                        <!-- Por ejemplo: -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" id="name" v-model="selectedUser.name"
                                class="mt-1 focus:ring-green-500 focus:bg-gray-200 focus:border-green-400 bg-gray-300 block w-full shadow-sm sm:text-sm border-green-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Correo
                                electronico</label>
                            <input type="email" id="email" v-model="selectedUser.email"
                                class="mt-1 focus:ring-green-500 focus:bg-gray-200 focus:border-green-400 bg-gray-300 block w-full shadow-sm sm:text-sm border-green-300 rounded-md">
                        </div>
                        <!-- Botones del formulario -->
                        <div class="flex justify-end">
                            <button type="button" @click="closeModal"
                                class="mr-2 px-4 py-2 rounded-md shadow-sm hover:bg-gray-600 bg-gray-500 hover:border-black border-gray-400 border px-4 inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Cancelar</button>
                            <button type="submit"
                                class="ml-4 bg-green-300 rounded-md shadow-sm hover:bg-green-400 hover:border-green-600 border-gray-400 border px-4 inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Guardar</button>
                        </div>
                    </form>
                    <!-- Your update user form goes here -->
                    <button @click="closeModal" class="absolute top-0 right-0 mt-2 mr-2">
                        <svg class="h-6 w-6 text-green-300 hover:text-green-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>


        <!-- MODAL CREATE -->
        <div v-if="showCreateModal"
            class="fixed inset-0 z-10 overflow-y-auto bg-gradient-to-b from-green-300 to-transparent">
            <div class="flex items-center justify-center min-h-screen">
                <div class="fixed inset-0 bg-green-300 opacity-50"></div>
                <div class="relative bg-gray-400 border-green-500 rounded-lg max-w-lg mx-auto p-8">
                    <!-- Modal content -->
                    <h2 class="text-xl font-bold mb-4">Crear Nuevo Usuario</h2>
                    <!-- Formulario para crear un nuevo usuario -->
                    <form @submit.prevent="createUser">
                        <!-- Campos del formulario para crear un nuevo usuario -->
                        <div class="mb-4">
                            <label for="newUserName" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" id="newUserName" v-model="newUser.name"
                                class="mt-1 focus:ring-green-500 focus:bg-gray-200 focus:border-green-400 bg-gray-300 block w-full shadow-sm sm:text-sm border-green-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="newUserEmail" class="block text-sm font-medium text-gray-700">Correo
                                electrónico</label>
                            <input type="email" id="newUserEmail" v-model="newUser.email"
                                class="mt-1 focus:ring-green-500 focus:bg-gray-200 focus:border-green-400 bg-gray-300 block w-full shadow-sm sm:text-sm border-green-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="newUserPass" class="block text-sm font-medium text-gray-700">Contraseña</label>
                            <input type="password" id="newUserPass" v-model="newUser.password"
                                class="mt-1 focus:ring-green-500 focus:bg-gray-200 focus:border-green-400 bg-gray-300 block w-full shadow-sm sm:text-sm border-green-300 rounded-md">
                        </div>
                        <!-- Campo de selección para el rol -->
                        <div class="mb-4">
                            <label for="newUserRole" class="block text-sm font-medium text-gray-700">Rol</label>
                            <select id="newUserRole" v-model="newUser.role"
                                class="mt-1 focus:ring-green-500 focus:bg-gray-200 focus:border-green-400 bg-gray-300 block w-full shadow-sm sm:text-sm border-green-300 rounded-md">
                                <option value="admin">Admin</option>
                                <option value="encargado">Encargado</option>
                                <option value="usuario">Usuario</option>
                            </select>
                        </div>
                        <!-- Botones del formulario -->
                        <div class="flex justify-end">
                            <button type="button" @click="closeCreateModal"
                                class="mr-2 px-4 py-2 rounded-md shadow-sm hover:bg-gray-600 bg-gray-500 hover:border-black border-gray-400 border px-4 inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Cancelar</button>
                            <button type="submit"
                                class="ml-4 bg-green-300 rounded-md shadow-sm hover:bg-green-400 hover:border-green-600 border-gray-400 border px-4 inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm">Guardar</button>
                        </div>
                    </form>
                    <button @click="closeCreateModal" class="absolute top-0 right-0 mt-2 mr-2">
                        <svg class="h-6 w-6 text-green-300 hover:text-green-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

</template>



<script>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import tableHeadersVue from './tableHeaders.vue'

export default {
    data() {
        return {
            showModal: false,
            showCreateModal: false,
            selectedUser: null,
            newUser: {
                name: '',
                email: '',
                password: '',
                role: ''
            },

        }
    },
    setup() {

        const users = ref([]);

        const fetchData = async () => {
            try {
                const response = await axios.get(`/api/usuarios`);
                users.value = response.data;
                console.log(users.value[0]);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        };
        onMounted(() => {
            fetchData();
        });
        return {
            users
        };
    },
    methods: {
        ////////////////////////////////
        //        MODAL UPDATE        //
        ////////////////////////////////
        openModal(user) {
            this.selectedUser = user;
            this.showModal = true;
            // Additional logic for fetching user data or anything else needed when opening the modal
        },
        closeModal() {
            this.selectedUser = null;
            this.showModal = false;
            // Additional logic for resetting form fields or any other cleanup needed when closing the modal
        },
        async updateUser() {
            try {
                const response = await fetch(`/api/usuarios/${this.selectedUser.id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        name: this.selectedUser.name,
                        email: this.selectedUser.email
                        // Agrega aquí otros campos si es necesario
                    })
                });
                if (response.ok) {
                    // Actualización exitosa, puedes mostrar un mensaje o realizar otras acciones
                    console.log('Usuario actualizado con éxito');
                    this.closeModal();
                } else {
                    // Manejo de errores si la solicitud falla
                    console.error('Error al actualizar usuario');
                }
            } catch (error) {
                // Manejo de errores si hay algún problema de red
                console.error('Error de red al actualizar usuario:', error);
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
            this.newUser = { name: '', email: '', password: '' }; // Restablecer los campos del formulario al cerrar la modal
        },
        async createUser() {
            const existingUser = this.users.find(user => user.email === this.newUser.email);
            if (existingUser) {
                alert('Ya existe un usuario con este correo electronico');
                return; // Salimos de la función para evitar continuar con el proceso de creación
            }
            try {
                const response = await fetch(`/api/usuarios`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        name: this.newUser.name,
                        email: this.newUser.email,
                        password: this.newUser.password,
                        role: this.newUser.role,
                        // Agrega aquí otros campos si es necesario
                    })
                });
                if (response.ok) {
                    // Creación exitosa, puedes mostrar un mensaje o realizar otras acciones
                    console.log('Usuario creado con éxito');
                    this.closeCreateModal();
                    // Actualizar la lista de usuarios
                    this.fetchData();
                } else {
                    // Manejo de errores si la solicitud falla
                    console.error('Error al crear usuario');
                }
            } catch (error) {
                // Manejo de errores si hay algún problema de red
                console.error('Error de red al crear usuario:', error);
            }
        },

        ////////////////////////////////
        //            DELETE          //
        ////////////////////////////////
        deleteUser(id) {
            // Hacer la solicitud DELETE a la API
            axios.delete(`/api/usuarios/${id}`)
                .then(response => {
                    console.log("User deleted successfully:", response.data);
                    // Eliminar el usuario de la lista localmente después de una respuesta exitosa
                    this.users = this.users.filter(user => user.id !== id);
                })
                .catch(error => {
                    console.error('Error al eliminar usuario:', error);
                });
        }
    },
}
</script>