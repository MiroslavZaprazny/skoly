<template>
  <div>
    <p>{{ id }}</p>
    <p>{{schoolItem.name}}</p>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  props: {
    id: String,
  },
  data() {
    return {
      schoolItem: {},
    };
  },
  methods: {
    async fetchSchool() {
      console.log(this.id);
      await axios.get(`http://127.0.0.1:8000/api/collage/${this.id}`).then((response) => {
        this.schoolItem = response.data.data;
        console.log(this.schoolItem);
      });
    },
  },
  created() {
    this.fetchSchool();
  },
}
</script>

<style>

</style>