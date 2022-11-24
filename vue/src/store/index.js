import { createStore } from 'vuex'

import schoolsModule from './modules/schools/index.js'

export default createStore({
  modules: {
    schools: schoolsModule
  }
})