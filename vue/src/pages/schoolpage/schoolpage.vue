<template>
  <div>
    <div class="border-b border-purple-primary mx-10 mb-20">
      <p>{{ schoolItem.name }}</p>
      <p>Pocet reviews ({{ schoolItem.rating_count }})</p>
    </div>
    <div class="mx-10">
      <z-review-form :id="this.id" v-on:createReview="updateReview($event)"></z-review-form>
    </div>
    <div class="mx-10 border-t-2 border-t-emerald-900">
        <z-review v-for="(review, index) in schoolItem.ratings" :key="review.id"
        :id="review.id"
        :index="index"
        :body="review.body"
        :rating="review.rating"
        ></z-review>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import zReviewForm from '../../components/schoolpage/z-review-form.vue';
import ZReview from '../../components/schoolpage/z-review.vue';

export default {
  components: { zReviewForm, ZReview },
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
    updateReview(rating) {
      this.schoolItem.ratings = [...this.schoolItem.ratings, rating]
    }
  },
  created() {
    this.fetchSchool();
  },
}
</script>

<style>

</style>