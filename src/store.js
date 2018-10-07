import Vue from 'vue'
import Vuex from 'vuex'
import Axios from 'axios'
// Axios.defaults.header.common['Access-Control-Allow-Methods'] = "*"
// Axios.defaults.headers.common['Access-Control-Request-Headers'] = null
// Axios.defaults.headers.common['Access-Control-Request-Method'] = null

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    name: '',
    password: '',
    email: '',
    confirmPassword: '',
    regsitrationData: {
      name: '',
      password: '',
      email: '',
      confirmPassword: ''
    }
  },
  mutations: {
    setName(state, v) {
      state.regsitrationData.name = v;
    },
    setPassword(state, v) {
      state.regsitrationData.password = v;
    },
    setConfirmPassword(state, v) {
      state.regsitrationData.confirmPassword = v;
    },
    setEmail(state, v) {
      state.regsitrationData.email = v;
    }
  },
  actions: {
    onSubmit({state}) {
      return new Promise((resolve, reject)=> {
        axios.post('http://localhost/appetiser/public/api/register', state.regsitrationData).then(function(res) {
          resolve(res.data)
        }).catch(error=> {
          reject(error.data)
        })
      })
    }
  }
})


