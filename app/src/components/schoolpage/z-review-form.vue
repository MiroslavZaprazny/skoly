<template>
  <div class="flex flex-col text-center">
    <h1>Podelte sa o svoj nazor</h1>
    <div class="w-full flex justify-center">
      <input class="w-1/3 border-2 border-purple-primary focus:outline-none text-purple-primary focus:border-purple-500 focus:ring-border-pink-500 focus:ring-1 rounded-lg p-2" placeholder="Ja si o tejto skole myslím..." type="text">
      <star-rating v-model="rating" :star-size="40"></star-rating>
      <button>Odoslať</button>
    </div>
  </div>
</template>

<script>
import StarRating from 'vue-star-rating'

export default {
  data() {
    return {
      rating: '',
    }
  },
  components: {
    StarRating
  }
}
</script>

<style>

</style>