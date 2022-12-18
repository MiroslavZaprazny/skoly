export default {
  // namespaced: true,
  state() {
    return {
      authenticated: false,
    };
  },
  mutations: {
    SET_AUTH: (state, auth) => (state.authenticated = auth),
  },
  actions: {
    setAuth: ({ commit }, auth) => commit("SET_AUTH", auth),
  },
  getters: {
    user(state) {
      return state.authenticated;
    },
  },
};
