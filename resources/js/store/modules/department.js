import axios from 'axios'

// states
const state = {
  departments: null,
  loadedDepartments: false,

}

//getters
const getters = {
  departments: state => state.departments,
  loadedDepartments: state => state.loadedDepartments,
}

// mutators
const mutations = {
  POPULATE_DEPARTMENT_LIST(state, departments) {
    state.departments = departments;
  },
  SET_LOADED(state, loaded) {
    state.loadedDepartments = loaded;
  }
}

//actions
const actions = {
  async fetchDepartment ({ commit }) {
    try {
      const { data } = await axios.get('/api/departments');
      //console.log(data);
      commit('POPULATE_DEPARTMENT_LIST', data);
      commit('SET_LOADED', true);
    } catch (e) {
      console.log(e);
    }
  },
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
