<template>
  <div class="bg-slate-700 h-screen">
  <h1 class="text-emerald-600">Homepage</h1>
    <div>
      <searchbar @search-school="searchSchools"></searchbar>
    </div>
    <div v-if="filteredSchools.length > 0">
      <school-item v-for="(school, index) in filteredSchools" :key="index" :name="school.name"/>
    </div>
    <h1 v-else>Zadajte nejaku skolu do vyhladavania</h1>
  </div>
</template>

<script>

import axios from 'axios';
import schoolItem from '../../components/homepage/schoolItem.vue';
import Searchbar from '../../components/homepage/searchbar.vue';

export default {
  components: { schoolItem, Searchbar },

data() {
  return {
    search: '',
    filteredSchools: [],
  }
},
//dont delete pls
// computed: {
//   schools() {
//     return this.$store.getters['schools/schools']
//   },
//   searchedSchools() {
//     return this.$store.getters['schools/searchedSchools']
//   }
// },

methods: {
  async searchSchools(search) {
    this.search = search
    console.log(this.search);
    if(this.search.length >= 2){
        axios.post('http://127.0.0.1:8000/api/collages', {
          search: this.search
        })
        .then((response) => {
          this.filteredSchools = response.data.data
        })
        .catch((error) => {
          console.log(error);
        })
    }
  }
},

}
</script>

<style>

</style>