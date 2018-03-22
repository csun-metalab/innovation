<!-- REPEATER COMPONENT -->
<template>
  <typeahead :row="row" :uniques="uniques" :expertises="expertises"></typeahead>
</template>

<script>
import Typeahead from "./typeahead.vue";

export default {
  props: {
    expertises: [],
    uniques: [],
    row: []
  },
  methods: {},
  components: {
    typeahead: Typeahead
  }
}
</script>
