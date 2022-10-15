<template>
  <div class="bg-gray-50 h-screen">
    <div>
      <searchbar></searchbar>
    </div>
    <div class="flex grid gap-16 grid-cols-1 sm:grid-cols-2 mt-20 lg:grid-cols-3 2xl:grid-cols-4 mx-16" v-if="schools">
      <school-item v-for="(school, index) in schools" :key="index" :name="school.name" :rating="school.average_rating" :description="school.description"/>
    </div>
    <h1 v-else>Prosím zadajte názov školy do vyhľadávania</h1>
  </div>
</template>

<script>

// import axios from 'axios';
import schoolItem from '../../components/homepage/schoolItem.vue';
import Searchbar from '../../components/homepage/searchbar.vue';

export default {
  components: { schoolItem, Searchbar },

computed: {
  schools() {
    return this.$store.getters['schools']
  },
},
}
</script>

<style>

</style>