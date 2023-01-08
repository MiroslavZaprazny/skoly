<template>
  <p>
    {{ review.body }}
  </p>
</template>

<script>
import axios from "axios";

export default {
  mounted() {
    axios.get(`/api/rating/${this.$route.params.id}`).then((response) => {
      this.review = response.data.data;
    });
  },
  data() {
    return {
      review: {},
    };
  },
};
</script>
