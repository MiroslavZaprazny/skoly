<template>
  <div>
    <Navbar></Navbar>
    <router-view></router-view>
  </div>
</template>

<script>

import Navbar from './Navbar/Navbar.vue'
export default {
  components: {
    Navbar,
  }
}
</script>

<style>

</style>