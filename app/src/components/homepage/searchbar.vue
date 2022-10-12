<template>
    <div class="bg-gray-50 text-center py-14">
        <h1 class="text-purple-600 text-3xl mb-2">Nájdi si tu pravú vysokú školu pre teba</h1>
        <h2 class="text-purple-600 text-lg">Hľadaj spomedzi všektých vysokých škôl na Slovensku</h2>
        <div class="mt-10">
          <input class="border-2 border-purple-600 rounded-lg p-2 w-1/4" type="text" placeholder="vyhladaj skoly" v-model="search" @keyup="$store.dispatch('searchSchools', this.search)">
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      search: '',
    }
  },
}
</script>

<style>

</style>