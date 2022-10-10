<template>
    <div>
        <input type="text" placeholder="vyhladaj skoly" v-model="search" @keydown="searchSchool">
    </div>
</template>

<script>
export default {
  emits: ['search-school'],
  data() {
    return {
      search: '',
    }
  },
  methods: {
    searchSchool() {
      this.$emit('search-school', this.search)
    }
  },
}
</script>

<style>

</style>