<template>
  <div class="flex">
    <p>{{ body }}</p>
    <p>{{ rating }}</p>
  </div>
</template>

<script>
export default {
  props: ['id', 'body', 'rating'],
}
</script>

<style>

</style>