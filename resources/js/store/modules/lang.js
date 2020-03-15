import Cookies from 'js-cookie'
import * as types from '../mutation-types'

const { locale, locales } = window.config

// state
const state = {
  locale: Cookies.get('locale') || locale,
  locales: locales
}

// getters
const getters = {
  locale: state => state.locale,
  locales: state => state.locales
}

// mutations
const mutations = {
  [types.SET_LOCALE] (state, { locale }) {
    state.locale = locale
  }
}

// actions
const actions = {
  setLocale ({ commit }, { locale }) {
    commit(types.SET_LOCALE, { locale })

    Cookies.set('locale', locale, { expires: 365 })
  }
}
export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
