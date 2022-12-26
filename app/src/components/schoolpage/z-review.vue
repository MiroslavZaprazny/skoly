<template>
  <router-link :to="{ name: 'reviewDetail', params: { id: review.id } }" class="flex">
    <p>{{ review.body }}</p>
    <p>{{ review.rating }}</p>
  </router-link>
</template>

<script>
export default {
  props: {
    review: Object
  }
}
</script>

<style>

</style>
