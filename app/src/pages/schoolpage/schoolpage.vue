<template>
  <div>
    <p>{{ id }}</p>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  props: {
    id: Number,
  },
  data() {
    return {
      schoolItem: {},
    };
  },
  methods: {
    async fetchSchool() {
      console.log(this.id);
      await axios.get(`127.0.0.1:8000/api/collage/${this.id}`).then((response) => {
        this.schoolItem = response.data;
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