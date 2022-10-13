<template>
  <div class="bg-slate-700 h-screen">
  <h1 class="text-emerald-600">Homepage</h1>
    <div>
      <searchbar></searchbar>
    </div>
    <div class="flex" v-if="schools">
      <school-item v-for="(school, index) in schools" :key="index" :name="school.name"/>
    </div>
    <h1 v-else>Zadajte nejaku skolu do vyhladavania</h1>
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