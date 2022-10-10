import mutations from './mutations.js';
import getters from './getters.js';
import actions from './actions';

export default {
  namespaced: true,
  state() {
    return {
      schools: [
        {
          id:1,
          name: 'stu'
        }
      ]
    }
  },
  mutations: mutations,
  getters: getters,
  actions: actions
}