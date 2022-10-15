import axios from 'axios';
// import mutations from './mutations.js';
// import getters from './getters.js';
// import actions from './actions';

export default {
  // namespaced: true,
  state() {
    return {
      filteredSchools: [],
    }
  },
  mutations: {
    searchSchools(state, filteredSchools) {
      state.filteredSchools = filteredSchools
    },
  },
  getters: {
    schools(state) {
      return state.filteredSchools;
    },
  },
  actions: {
    async searchSchools({commit}, payload) {
          axios.post('http://127.0.0.1:8000/api/collages', {
            search: payload
          })
          .then((response) => {
            commit('searchSchools', response.data.data)
            console.log(response.data.data);
          })
          .catch((error) => {
            console.log(error);
          })
    },
  }
}