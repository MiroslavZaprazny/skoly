<template>
  <div>
    <nav class="bg-purple-500 h-12">
      <div class="container mx-auto flex flex-wrap items-center justify-evenly">
        <router-link to="/">Domov</router-link>
        <div v-if="Object.keys(user).length">
          <button @click="logout">Odlhasit sa</button>
        </div>
        <div v-if="!Object.keys(user).length">
          <router-link to="/login">Prihlasenie</router-link>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "Navbar",
  computed: {
    user() {
      return this.$store.getters["user"];
    },
  },
  methods: {
    logout() {
      //TODO: odhlasenie
      console.log("odhlasenie");
    },
  },
};
</script>

<style></style>
