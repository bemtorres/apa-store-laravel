<template>
  <button
    type="button"
    @click="contador()"
    class="p-2 bg-gray-500 rounded"
  >
    Counter is: {{ counter }}
    <select multiple="multiple" size="10" name="duallistbox_demo[]" id="duallistbox">
      <option value="1">asdasdasdasd</option>
      <option value="2">asdasdasdasdasdasd</option>
      <option value="3">asdASDasdasdasdasd</option>
  </select>

    Counter is: {{ counter }}

    <input type="text" v-model="palabra" />
  </button>
</template>

<script setup>
import { ref } from 'vue'

const counter = ref(0)
const palabra = ref('Hola Mundo')

const contador = () => {
  counter.value = counter.value + 1;
}
</script>
