<template>
  <div class="bg-slate-700 h-screen">
  <h1 class="text-emerald-600">Homepage</h1>
    <div>
        <input type="text" placeholder="vyhladaj skoly" v-model="search">
    </div>
    <div>
      <div v-for="(school, index) in filteredSchools" :key="index">
        <p>{{ school.name }}</p>
      </div>
    </div>
  </div>
</template>

<script>

import axios from 'axios';

export default {

data() {
  return {
    search: '',
    filteredSchools: [],
    schools: [],
  }
},

computed: {
  filteredSchools(){
    if (this.search.trim().length > 0) {
      return this.schools.filter((school) => school.name.toLowerCase().includes
      (this.search.trim().toLowerCase()))
    }
    return this.schools
  }
},

methods: {
  async searchSchool() {
    axios.post('http://127.0.0.1:8000/api/collages')
    .then((response) => {
      this.schools = response.data.data
    })
    .catch((error) => {
      console.log(error);
    })
  },
},

}
</script>

<style>

</style>