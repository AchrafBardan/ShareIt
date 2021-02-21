import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        userData: {},
    },
    getters: {
      getUserData: state => {
        return state.userData;
      }
    },
    actions: {
        pushUserData ({ commit, state }, data) {

        },
        logout({ commit, state }){
            axios.post('/api/auth/logout')
            .then(response=>{
                if(response.status == 200){
                    this.commit('removeUserData');
                }
            });

        },
        setUserData(){
            axios.get('/api/user')
            .then(response => {
                this.commit('setUserData',response.data);
            });
        }
    },
    mutations: {
        setUserData(state, data) {
            state.userData = data;
        },
        removeUserData(state){
            state.userData = null;
        }
    },

});
