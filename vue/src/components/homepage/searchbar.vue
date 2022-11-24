<template>
    <div class="bg-gray-50 text-center py-14">
        <h1 class="text-purple-primary text-3xl font-bold mb-2">Nájdi si tu pravú vysokú školu pre teba</h1>
        <h2 class="text-purple-primary text-lg font-semibold">Hľadaj spomedzi všektých vysokých škôl na Slovensku</h2>
        <div class="mt-20">
          <input class="border-2 border-purple-primary focus:outline-none text-purple-primary focus:border-purple-500 focus:ring-border-pink-500 focus:ring-1 rounded-lg p-2 w-1/4" type="text" placeholder="FEI STU" v-model="search" v-debounce:150="searchUpdate" debounce-evets="['click', 'keyup']">
        </div>
    </div>
</template>

<script>
import { vue3Debounce } from 'vue-debounce'

export default {
  directives: {
    debounce: vue3Debounce({ lock: true })
  },
  data() {
    return {
      search: '',
    }
  },
  methods: {
    searchUpdate() {
      this.$store.dispatch('searchSchools', this.search)
    }
  },
}
</script>

<style>

</style>