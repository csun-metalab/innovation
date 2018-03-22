<template>
  <div class="col-sm-4">
    <div class="typeahead">
      <label class="label--required" for="">General</label>
      <div class="typeahead__search">
        <input type="text" placeholder="General"
          v-model="row.parent.hierarchy"
          :disabled="row.expertise.title == ''"
          @click="parents.active = true"
          @blur="parents.active = false"/>
      </div>
      <ul class="typeahead__results" :class="activeResults(parents)">
        <li class="typeahead__result"
          v-for="expertise in expertises | orderBy 'hierarchy'"
          v-if="row.expertise.title === expertise.title"
          :class="activeClass($index)"
          @mousedown="setParent(expertise)"
          @mousemove="setActive($index)">
          {{expertise.hierarchy}}
        </li>
      </ul>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="typeahead">
      <label class="label--required" for="">My Expertise</label>
      <div class="typeahead__search">
        <input type="text" placeholder="Expertise"
          v-model="row.expertise.title"
          @click="nodes.active = true"
          @blur="nodes.active = false"/>
      </div>
      <ul class="typeahead__results" :class="activeResults(nodes)" v-if="row.expertise.title.length > 2">
        <li class="typeahead__result"
          v-for="expertise in expertises | orderBy 'title' | filterBy row.expertise.title in 'title'"
          :class="activeClass($index)"
          @mousedown="setExpertise(expertise)"
          @mousemove="setActive($index)">
          {{expertise.title}}
        </li>
      </ul>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="typeahead">
      <label class="label--required" for="">Specific</label>
      <div class="typeahead__search">
        <input type="text" placeholder="Specific"
          v-model="row.child.title"
          :disabled="row.expertise.title == ''"
          @click="children.active = true"
          @blur="children.active = false"/>
      </div>
      <ul class="typeahead__results" :class="activeResults(children)">
        <li class="typeahead__result"
          v-for="expertise in expertises"
          v-if="row.parent.expertise_id === expertise.parent_expertise_id"
          :class="activeClass($index)"
          @mousedown="setChild(expertise)"
          @mousemove="setActive($index)">
          {{expertise.title}}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>

export default {
  props: {
    expertises: [],
    uniques: [],
    row: []
  },
  data(){
    return {
      current: -1,
      nodes: { active: false, items: [] },
      parents: { active: false, items: [] },
      children: { active: false, items: [] }
    };
  },
  computed: {
    isEmpty() {
      return !this.query;
    },
    isDirty() {
      return !!this.query;
    }
  },
  // created(){
  //   this.fetchAllExpertises();
  // },
  // filters: {
  //   exactly(arr, item, deal){
  //     for (var i = 0; i < arr.length; i++) {
  //       return arr[i].hierarchy === item
  //     }
  //   }
  // },
  methods: {
    activeResults(item) {
      return {'typeahead__results--show': item.active};
    },
    activeItem (index) {
      return { 'active': this.current === index };
    },
    setActive (index) {
      this.current = index;
    },
    activeClass (index) {
      return { active: this.current === index };
    },
    up(results) {
      if (this.current > 0) {
        this.current--;
      } else if (this.current === -1) {
        this.current = results.length - 1;
      } else {
        this.current = -1;
      }
    },
    down(results) {
      if (this.current < results.length - 1) {
        this.current++;
      } else {
        this.current = -1;
      }
    },
    setExpertise(val){
      this.row.expertise = val;
      this.current = -1;
    },
    setParent(val){
      this.row.parent = val;
      this.current = -1;
    },
    setChild(val){
      this.row.child = val;
      this.current = -1;
    },
    fetchAllExpertises() {
      this.$http.get(`${window.app.env.url}/api/expertise`)
        .then(success => this.nodes.items = success.data);
    },
    fetchExpertises(search) {
      this.$http.get(`${window.app.env.url}/api/expertise`, {
        q: search
      }).then(success => this.nodes = success.data);
    },
    fetchParentExpertises(search) {
      this.$http.get(`${window.app.env.url}/api/expertise/${search}`)
        .then( success => {
          this.parents = success.data;
          this.row.parent = this.parents[0];
        });
    },
    fetchChildrenExpertises(search, parent) {
      // Will Need Search Item && Parent
      console.log(search,parent);
      this.$http.get(`${window.app.env.url}/api/expertise/${parent}/${search}`)
        .then(success => this.children = success.data);
    }
  }
}
</script>
