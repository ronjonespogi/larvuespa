import axios from 'axios'

// states
const state = {
  gls: null,
  loaded: false,

}

//getters
const getters = {
  gls: state => state.gls,
  loaded: state => state.loaded,
}

// mutators
const mutations = {
  POPULATE_GL_LIST(state, gls) {
    state.gls = gls;
  },
  SET_LOADED(state, loaded) {
    state.loaded = loaded;
  }
}

//actions
const actions = {
  async fetchGL ({ commit }) {
    try {
      const { data } = await axios.get('/api/gls');
      //console.log(data);
      commit('POPULATE_GL_LIST', data);
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
