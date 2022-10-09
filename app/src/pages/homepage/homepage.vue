<template>
  <div class="bg-slate-700 h-screen">
  <h1 class="text-emerald-600">Homepage</h1>
    <div>
        <input type="text" placeholder="vyhladaj skoly" v-model="search" @keydown="searchSchool">
    </div>
    <div>
      <div v-for="(school, index) in schools" :key="index">
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

methods: {
  async searchSchool() {
    if(this.search.length >= 2){
        axios.post('http://127.0.0.1:8000/api/collages', {
          search: this.search
        })
        .then((response) => {
          this.schools = response.data.data
        })
        .catch((error) => {
          console.log(error);
        })
    }
  },
},

}
</script>

<style>

</style>