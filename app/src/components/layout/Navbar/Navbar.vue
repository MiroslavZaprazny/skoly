<template>
  <div>
    <nav class="bg-purple-500 h-12">
      <div class="container mx-auto flex flex-wrap items-center justify-evenly">
        <router-link to="/">Domov</router-link>
        <div v-if="user">
          <router-link to="/logout">Odlhasit sa</router-link>
        </div>
        <div v-if="!user">
          <router-link to="/login">Prihlasenie</router-link>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: 'Navbar',
  computed: {
    user() {
      return this.$store.getters['user']
    },
  },
}
</script>

<style>

</style>