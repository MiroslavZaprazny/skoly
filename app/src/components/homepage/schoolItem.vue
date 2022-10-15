<template>
  <div class="h-40 my-5 lg:my-0 rounded-2xl bg-gray-50 border border-purple-primary p-4">
    <div class="flex justify-between">
      <h1 class="text-2xl font-semibold text-purple-primary">{{ name }}</h1>
      <h2 class="text-xl font-semibold text-purple-primary">{{ rating }}</h2>
    </div>
    <h3 class="truncate">{{ description }}</h3>
  </div>
</template>

<script>
export default {
  props: {
    name: String,
    rating: Number,
    description: String,
  }
}
</script>

<style>

</style>