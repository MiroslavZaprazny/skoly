<template>
  <Layout></Layout>
</template>

<script>
import axios from "axios";
import Layout from "../components/layout/Layout.vue";

export default {
  async mounted() {
    try {
      const res = await axios.get("/api/user", {
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest",
        },
        withCredentials: true,
      });
      console.log(res.data);
      this.$store.dispatch("setUser", res.data);
    } catch (e) {
      console.log(e);
      this.$store.dispatch("setUser", {});
    }
  },
  components: {
    Layout,
  },
};
</script>

<style></style>
