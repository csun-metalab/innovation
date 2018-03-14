// // TESTER DEAL
// //

import Vue from "vue";
import VueResource from "vue-resource";
import Repeater from "./components/repeater.vue";

window.app = {
  env: {
    url: document.querySelector('html').getAttribute('data-url'),
    token: document.querySelector('html').getAttribute('data-token')
  }
}

// GLOBAL CONFIG
Vue.use(VueResource);
Vue.config.debug = true;
Vue.http.options.emulateJSON = true;
Vue.http.options.emulateHTTP = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = window.app.env.token;

// ROOT INSTANCE
var vm = new Vue({
  el: "#expertise",
  data: {
    expertises: [],
    uniques: [],
    rows: [{
      expertise: { title: "" },
      parent: { hierarchy: "" },
      child: { title: "" }
    }]
  },
  methods: {
    addRow() {
      this.rows.push({
        expertise: { title: "" },
        parent: { hierarchy: "" },
        child: { title: "" }
      });
    },
    deleteRow(row) {
      this.rows.$remove(row);
    }
  },
  components: {
    repeater: Repeater
  },
  ready() {
    // this.fetchAllExpertises();
  }
});
