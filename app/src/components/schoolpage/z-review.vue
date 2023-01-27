<template>
  <router-link
    :to="{
      name: 'reviewDetail',
      params: { slug: slug, id: review.id },
    }"
    class="flex"
  >
    <p>{{ review.body }}</p>
    <p>{{ review.rating }}</p>
  </router-link>
</template>

<script>
export default {
  props: {
    review: Object,
    slug: String,
  },
};
</script>

<style></style>
