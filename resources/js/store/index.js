import Vue from 'vue';
import Vuex from 'vuex';
import auth from './modules/auth.js';
import lang from './modules/lang.js';
import genledger from './modules/genledger.js';
import department from './modules/department.js';

Vue.use(Vuex)

// Load store modules dynamically.
// const requireContext = require.context('./modules', false, /.*\.js$/)

// const modules = requireContext.keys()
//   .map(file =>
//     [file.replace(/(^.\/)|(\.js$)/g, ''), requireContext(file)]
//   )
//   .reduce((modules, [name, module]) => {
//     if (module.namespaced === undefined) {
//       module.namespaced = true
//     }

//     return { ...modules, [name]: module }
//   }, {})

export default new Vuex.Store({
  modules: {
    auth,
    lang,
    genledger,
    department
  }
})
