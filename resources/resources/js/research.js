    var Expertise = new Vue({

      el: "#research-interests",
      data: {
        newExpertise: {
          title:'',
          value:''
        },
        currentExpertise: [],
        hiddenExpertise:[]
      },
      ready: function(){
        this.fetchExpertise();
      },
      methods: {
        fetchExpertise: function(){
        },
        addExpertise: function(e){
          if(this.currentExpertise.indexOf(this.newExpertise) == -1){
            var expertiseName = $(document).find('#expertise-v-select option:selected').html();
            this.hiddenExpertise.push(this.newExpertise);
            this.currentExpertise.push(expertiseName);
          }
        },
        removeExpertise: function(expertise){
          this.currentExpertise.$remove(expertise);
        }
      }
    });
