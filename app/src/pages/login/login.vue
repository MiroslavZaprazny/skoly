<template>
  <div>
    <h1 class="text-center">Login</h1>
    <div class="text-gray-500 text-center text-sm">
      Nemate este ucet?
      <router-link to="/register" class="font-semibold text-gray-700">
        Zaregistrujte sa
      </router-link>
    </div>
    <form @submit.prevent="login">
      <div class="flex flex-col items-center">
        <div>
          <input class="input" type="text" placeholder="email" v-model="email">
        </div>
        <div>
          <input class="input" type="input" placeholder="heslo" v-model="password">
        </div>
        <div class="submit-btn">
          <button>login</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      email: '',
      password: '',
    }
  },
  methods: {
    login() {
      axios.post(
        'http://127.0.0.1:8000/api/login',
        {
          "email": this.email,
          "password": this.password,
        },
        {
          headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
          }
        }
      ).catch(err => {
        if (err.response) {
          console.log(err.response.data)
          return;
        }
      }).then((response) => {
        if (response) {
          sessionStorage.setItem("TOKEN", response.data.token)

          this.$router.push({
            name: "homepage",
          })
        }
      })
    }
  },
}
</script>

<style>
.input {
  @apply border rounded-lg border-black p-1 my-2
}

.submit-btn {
  @apply bg-purple-primary text-gray-50 py-2 px-4 rounded-lg mt-4 cursor-pointer
}
</style>