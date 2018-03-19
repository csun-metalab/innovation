import Vue from "vue";
import VueResource from "vue-resource";
import Collaborators from "./components/collaborators.vue";

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

var Collab = new Vue({
  el: "#research-collabs",
  data: {},
  components: {
    collaborators: Collaborators
  }
});

// $.ajax({
// 	url: 'http://localhost/',
// 	success: function(data)
// 	{
// 		$.each(function(i, val){
// 			//append each value to display
// 		})
// 	}
// })