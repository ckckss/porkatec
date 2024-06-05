<template>
  <div class="bg-gray-800">
    <Disclosure as="nav" class="bg-gray-800" v-slot="{ open }">
      <div class="px-5">
        <div class="relative flex h-16 items-center justify-between">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <DisclosureButton
              class="relative inline-flex items-center justify-center rounded-md p-2 text-green-400 hover:bg-gray-700 hover:text-green-300 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
              <span class="absolute -inset-0.5" />
              <span class="sr-only">Open main menu</span>
              <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
              <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
            </DisclosureButton>
          </div>
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink-0 items-center">
              <img class="h-20 w-auto" src="../assets/fop8nbg.png" alt="Your Company" />
            </div>
            <div class="hidden sm:flex w-4/5 justify-center">
              <!-- Esto se mostrará solo en pantallas grandes -->
              <SearchBarWeb class="px-4 w-4/5"></SearchBarWeb>
            </div>
            <div class="hidden mt-5 sm:block">
              <div class="flex space-x-4">
                <a :class="[item.current ? 'bg-gray-800 text-green-400' : 'text-green-300 hover:bg-gray-700 hover:text-green-400', 'rounded-md px-3 py-2 text-sm font-medium']"
                  :aria-current="item.current ? 'page' : undefined">Dashboard</a>
              </div>
            </div>

          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <!-- Profile dropdown -->
            <Menu as="div" class="relative ml-3">
              <div>
                <MenuButton
                  class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                  <span class="absolute -inset-1.5" />
                  <span class="sr-only">Open user menu</span>
                  <UserCircleIcon class="h-8 w-8 text-green-300" aria-hidden="true" />
                </MenuButton>
              </div>
              <transition enter-active-class="transition ease-out duration-100"
                enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
                leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100"
                leave-to-class="transform opacity-0 scale-95">
                <MenuItems
                  class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-gray-800 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                  <MenuItem v-slot="{ active }">
                  <a href="#"
                    :class="[active ? 'bg-gray-700' : '', 'block px-4 py-2 text-sm text-green-300 font-bold']">Your
                    Profile</a>
                  </MenuItem>
                  <MenuItem v-slot="{ active }">
                  <a href="#"
                    :class="[active ? 'bg-gray-700' : '', 'block px-4 py-2 text-sm text-green-300 font-bold']">Settings</a>
                  </MenuItem>
                  <MenuItem v-slot="{ active }">
                  <a href="#"
                    :class="[active ? 'bg-gray-700' : '', 'block px-4 py-2 text-sm text-green-300 font-bold']">Sign
                    out</a>
                  </MenuItem>
                </MenuItems>
              </transition>
            </Menu>
          </div>
        </div>
      </div>

      <DisclosurePanel class="sm:hidden">
        <div class="space-y-1 px-2 pb-3 pt-2">
          <DisclosureButton v-for="item in navigation" :key="item.name" as="a" :href="item.href"
            :class="[item.current ? 'bg-gray-800 text-green-400' : 'text-green-300 hover:bg-gray-700 hover:text-green-400', 'block rounded-md px-3 py-2 text-base font-medium']"
            :aria-current="item.current ? 'page' : undefined">{{ item.name }}</DisclosureButton>
        </div>
      </DisclosurePanel>
    </Disclosure>
    <!-- Barra de busqueda en moviles -->
    <div>
      <div class="md:hidden sm:hidden mx-auto text-center px-42 mt-3 w-4/5">
        <SearchBar class="px-2 w-4/5"></SearchBar>
      </div>
    </div>
  </div>
</template>

<script setup>
import SearchBar from '../components/searchbar.vue'
import SearchBarWeb from '../components/searchbarW.vue'
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon, } from '@heroicons/vue/24/outline'
import { UserCircleIcon } from '@heroicons/vue/24/solid'

const navigation = [
  { name: 'Inicio', href: '#', current: true },
  { name: 'Escaner', href: '#', current: false },
  { name: 'Administrador', href: '#', current: false },
  { name: 'Seguimiento', href: '#', current: false },
  { name: 'Fichas', href: '#', current: false },
  { name: 'Usuarios', href: '#', current: false },
  { name: 'Naves', href: '#', current: false },
  { name: 'Cerdas', href: '#', current: false },
  { name: 'Usuarios', href: '#', current: false },
  { name: 'Naves', href: '#', current: false },
  { name: 'Cerdas', href: '#', current: false },
  { name: 'Usuarios', href: '#', current: false },
  { name: 'Naves', href: '#', current: false },
  { name: 'Cerdas', href: '#', current: false }, { name: 'Usuarios', href: '#', current: false },
  { name: 'Naves', href: '#', current: false },
  { name: 'Cerdas', href: '#', current: false }, { name: 'Usuarios', href: '#', current: false },
  { name: 'Naves', href: '#', current: false },
  { name: 'Cerdas', href: '#', current: false }
]
</script>

<script>
export default {
  name: "NavbarComp"
}
</script>