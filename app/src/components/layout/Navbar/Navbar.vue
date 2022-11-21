<template>
  <div>
    <nav class="bg-purple-500 h-12">
      <div class="container mx-auto flex flex-wrap items-center justify-evenly">
        <router-link to="/">Domov</router-link>
        <router-link to="/register">Registracia</router-link>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: 'Navbar'
}
</script>

<style>

</style>