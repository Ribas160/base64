import Vue from 'vue'
import App from './App.vue'
import router from './router'

import VueClipboards from 'vue-clipboards';

Vue.use(VueClipboards);

Vue.config.productionTip = false;

new Vue({
    router,
    render: h => h(App)
}).$mount('#app')
