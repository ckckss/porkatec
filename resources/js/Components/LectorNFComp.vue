<template>
  <div class="w-full">
    <div class="flex flex-col items-center pt-40 h-screen bg-gray-700">
      <!-- Loader -->
      <div
        class="flex justify-center w-5/6 md:w-3/5 items-center h-24 border bg-green-300 border-green-500 rounded-lg mb-4">
        <p class="text-black-800 text-5xl font-bold" v-if="scannedId">CERDA {{ scannedId }}</p>
        <p class="text-black-800 font-semibold" v-else>LEYENDO NFC ...</p>
      </div>

      <!-- ID leído -->
      <div class="bg-gray-800 w-5/6 md:w-3/5 text-center p-4 rounded-lg flex items-center justify-center">
        <div>
          <p class="text-green-300 font-semibold" v-if="scannedId">NFC DETECTADO: {{ scannedId }}</p>
          <p class="text-green-300 font-semibold" v-else>NFC NO DETECTADO</p>
        </div>
        <button>
          <div>
            <ArrowRightCircleIcon class="w-10 h-10 ml-4 text-green-400" v-if="scannedId"></ArrowRightCircleIcon>
            <ExclamationCircleIcon class="w-10 h-10 ml-4 text-green-400" v-else></ExclamationCircleIcon>
          </div>
        </button>

      </div>


    </div>
  </div>
</template>

<script setup>
import { ArrowRightCircleIcon, ExclamationCircleIcon } from '@heroicons/vue/24/outline'


//const scannedId = 12964
</script>

<script>

export default {
  name: "HomeComp",
}
</script>
