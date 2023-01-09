export default {
  // namespaced: true,
  state() {
    return {
      user: {},
    };
  },
  mutations: {
    SET_USER: (state, user) => (state.user = user),
  },
  actions: {
    setUser: ({ commit }, user) => commit("SET_USER", user),
  },
  getters: {
    user(state) {
      return state.user;
    },
  },
};
