<template>
  <div>
    <div class="border-b border-purple-primary mx-10 mb-20">
      <p>{{schoolItem.name}}</p>
      <p>{{schoolItem.ratings[0].body}}</p>
    </div>
    <div class="mx-10">
      <z-review-form></z-review-form>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import zReviewForm from '../../components/schoolpage/z-review-form.vue';

export default {
  components: { zReviewForm },
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
      await axios.get(`http://127.0.0.1:8000/api/collage/${this.id}`).then((response) => {
        this.schoolItem = response.data.data;
        // console.log(this.schoolItem);
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