<template>
  <div>
    <div class="border-b border-purple-primary mx-10 mb-20">
      <p>{{ schoolItem.name }}</p>
      <p>Pocet reviews ({{ schoolItem.rating_count }})</p>
    </div>
    <div class="mx-10">
      <z-review-form
        :id="this.id"
        v-on:createReview="updateReview($event)"
      ></z-review-form>
    </div>
    <div class="mx-10 border-t-2 border-t-emerald-900">
      <z-review
        v-for="review in schoolItem.ratings"
        :key="review.id"
        :review="review"
        :slug="slug"
      ></z-review>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import zReviewForm from "../../components/schoolpage/z-review-form.vue";
import ZReview from "../../components/schoolpage/z-review.vue";

export default {
  components: { zReviewForm, ZReview },
  props: {
    slug: String,
  },
  data() {
    return {
      schoolItem: {},
    };
  },
  methods: {
    fetchSchool() {
      axios.get(`/api/collage/${this.slug}`).then((response) => {
        this.schoolItem = response.data.data;
        // console.log(this.schoolItem);
      });
    },
    updateReview(rating) {
      this.schoolItem.ratings = [...this.schoolItem.ratings, rating];
    },
  },
  created() {
    this.fetchSchool();
  },
};
</script>

<style></style>
