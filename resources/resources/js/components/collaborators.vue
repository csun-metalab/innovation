<template>
    <!-- <div id="research-collabs"> -->
            <div class="form-group">
                 <div class="input-group" >
                   <div class="row">
                      <div class="col-sm-6">
                        <select v-model="newCollab.name" v-on:change="setDisplayName($event)" class="form-control">
                            <option value="" selected>--Name--</option>
                            <option v-for="potential in potential_collabs" value="{{potential.user_id}}">{{potential.display_name}}</option>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <select v-on:change="setDisplayRole($event)" name="selectRole" v-model="newCollab.role" class="form-control">
                          <option value="" selected>--Role--</option>
                          <option v-for="role in roles" value="{{$key}}" track-by="$index">{{role}}</option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                        <a class="btn btn-primary-outline" href="#" v-on:click.prevent="addCollab()">
                           Invite Collaborator
                        </a>
                        <div class="col-xs-12">
                            <select style="display:none;" v-if="project_status == 'create'" name="collaborators[]" multiple >
                              <option value="{{ collab.name }}, {{ collab.role }}" selected v-for="collab in hiddenCollab" >{{ collab.name }}</option>
                            </select>
                        </div>
                      </div>
                    </div>
                  </div>
               </div>
               <br>
               <table class="table table--padded table--bordered table--striped">
                 <thead>
                   <tr>
                     <th><strong>Collaborator</strong></th>
                     <th><strong>Role</strong></th>
                     <th><strong>Status</strong></th>
                     <th><strong>Action</strong></th>
                   </tr>
                 </thead>
                 <tbody>
                  <!-- <tr v-if="currentCollab.length == 0">
                    <td colspan="5">No Collaborators Added ...</td>
                  </tr> -->
                   <tr style="padding:5px" v-for="collab in currentCollab">
                     <td v-if="project_status = 'create'">
                       <img class="img-circle" style="width:36px" src="http://www.csun.edu/faculty/imgs/profile-default.png">
                       <span style="margin-left: 10px;">{{collab.display_name}}</span>
                     </td>
                     <td v-if="project_status == 'edit'"> <span style="margin-left: 10px;">{{collab.display_name}}</span></td>
                     <td><span>{{collab.display_role}}</span></td>
                     <td v-if="collab.status == '0'"><span style="color:green"><strong>Pending Invitation</strong></span></td>
                     <td v-if="collab.status == 'Invited'"><span style="color:green"><strong>Pending Invitation</strong></span></td>
                     <td v-if="collab.status == '1'"><span style="color:green"><strong>Approved</strong></span></td>
                     <td>
                        <a v-if="collab.status == '0'" v-on:click.prevent="removeCollab(collab)" href="#">Cancel Invite</a>
                        <a v-if="collab.status == "Pending Invitation" v-on:click.prevent="removeCollab(collab)" href="#">Cancel Invite</a>
                        <a v-if="collab.status == 'Requested'" href="#">Accept</a>
                        <a v-if="collab.status == 'Requested'" href="#">Decline</a>
                        <a v-if="collab.status == '1'" v-on:click.prevent="removeCollab(collab)" href="#">Remove</a>
                      </td>
                   </tr>
                 </tbody>
               </table>
            <!-- </div> -->
</template>


<!-- Select and Collaborator -->
<!-- AJAX data to API route to store and to fetch -->


//ajax request and save
<script type="text/javascript">
import $ from "jquery";

    export default {
        data:function(){
          return {
            newCollab: {
              name:'',
              role:'',
              status:'Invited',
              reviewed_at: '',
              display_name: '',
              display_role: ''
            },
            potential_collabs: [],

            hiddenCollab:[],
            currentCollab: [],
            roles: []
          }
        },

        props: {
          project_status: '',
          project_id: ''
        },

        ready: function(){
          this.fetchCollab();
          this.fetchRoles();
          if(this.project_status == 'edit'){
            this.fetchCurrentCollab();
          }
        },

        methods: {
            fetchCollab(){
              this.$http.get(`${window.app.env.url}/api/projects/create/collaborators`).then(
                (data)=>{
                  this.potential_collabs = data.data;
                },
                (data)=>{
                  // console.log(data)
                });
            },
            fetchRoles(){
              this.$http.get(`${window.app.env.url}/api/projects/create/roles`).then(
                (data)=>{
                  this.roles = data.data;
                },
                (data)=>{
                  // console.log(data)
                });
            },
            fetchCurrentCollab(){
              this.$http.get(`${window.app.env.url}/api/projects/${this.project_id}/edit/collaborators`).then(
                (data)=>{
                  // this.roles = data.data;
                  // console.log(data);
                  var newCollab;
                  var hiddenCollab;
                  for(var i = 0; i < data.data.length; i++){
                    var fetchedCollab = data.data[i];
                    newCollab = { name:fetchedCollab.invitee.user_id, role: fetchedCollab.role_id, status: fetchedCollab.accepted, display_name:fetchedCollab.invitee.common_name, display_role:fetchedCollab.role.display_name, reviewed_at: fetchedCollab.reviewed_at}
                    hiddenCollab = {name:fetchedCollab.invitee.user_id, role:fetchedCollab.role_id};
                    this.hiddenCollab.push(hiddenCollab);
                    this.currentCollab.push(newCollab);
                  }

                  var newCollab = {name:this.newCollab.name, role:this.newCollab.role};
                  this.hiddenCollab.push(newCollab);
                  // this.currentCollab = data.data;
                  // console.log(data.data);
                },
                (data)=>{
                  // console.log(data)
                });
              },


              addCollab: function(){
                  if(this.currentCollab.indexOf(this.newCollab) == -1 && this.newCollab.name !== '' && this.newCollab.role !== ''){
                    var newPerson = {display_name:this.newCollab.display_name, display_role:this.newCollab.display_role, status:this.newCollab.status};
                    var newCollab = {name:this.newCollab.name, role:this.newCollab.role};
                    this.currentCollab.push(newPerson);
                    this.hiddenCollab.push(newCollab);
                    this.newCollab.name = '';
                    this.newCollab.role = '';
                  }
              },
              removeCollab: function(collab){
                  this.currentCollab.$remove(collab);
                  this.hiddenCollab.$remove(collab);
                  if(this.project_status == 'edit'){
                    // this.$http.get(`${window.app.env.url}/api//`)
                  }
              },

              setDisplayName: function(e){
                  var $select = $(e.target);
                  var name = $select.find('option:selected').html();
                  // Vue.set(this.newCollab,'display_name',name);
                  this.newCollab.display_name = name;
              },

              setDisplayRole: function(e){
                  var $select = $(e.target);
                  var role = $select.find('option:selected').html();
                  // Vue.set(this.newCollab,'display_role',role);
                  this.newCollab.display_role = role;
              }
        }

    }


</script>
