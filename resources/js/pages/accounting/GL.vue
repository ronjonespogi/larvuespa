<template>
  <div class="mr-4 ml-4 mb-4">
        <div class="row">
          <div class="col-md-6">
            <div class="card mt-4">
              <div class="card-header">
                <h5>General Ledger Management</h5>
              </div>
              <div class="card-body">
                    <div v-if="loaded">
                      <ul v-if="majorGL !== null">
                        <li v-for="x in majorGL" :key="x.id">
                          <!-- level one -->
                            <h5> {{ x.gl_description }} </h5>
                          <ul v-for="p1 in majorGL.parent1" :key="p1.id" >
                              <li v-if="x.gl_account_code == p1.gl_parent_code">
                                <!-- level two -->
                                <div>
                                  <b-link> {{ p1.gl_account_code }} {{ p1.gl_description }} </b-link>
                                </div>
                                <ul v-for="p2 in majorGL.parent2" :key="p2.id" >
                                  <li v-if="p1.gl_account_code == p2.gl_parent_code">
                                    <!-- level three -->
                                    <div >
                                      <b-link v-on:click="getSpecificGL(
                                        p2.gl_account_code, p2.gl_major_code, p2.gl_description, p2.gl_parent_code,
                                        p2.gl_level, p2.is_disabled
                                        )">
                                        {{ p2.gl_account_code }} {{ p2.gl_description }}
                                      </b-link>
                                    </div>
                                    <ul v-for="p3 in majorGL.parent3" :key="p3.id" >
                                      <li v-if="p2.gl_account_code == p3.gl_parent_code">
                                        <!-- level four -->
                                        <div >
                                          <b-link v-on:click="getSpecificGL(
                                            p3.gl_account_code, p3.gl_major_code, p3.gl_description, p3.gl_parent_code,
                                            p3.gl_level, p3.is_disabled
                                            )">
                                            {{ p3.gl_account_code }} {{ p3.gl_description }}
                                          </b-link>
                                        </div>
                                        <ul  v-for="p4 in majorGL.parent4" :key="p4.id" >
                                          <li v-if="p3.gl_account_code == p4.gl_parent_code">
                                            <!-- level five -->
                                            <div >
                                              <b-link v-on:click="getSpecificGL(
                                                p4.gl_account_code, p4.gl_major_code, p4.gl_description, p4.gl_parent_code,
                                                p4.gl_level, p4.is_disabled
                                                )">
                                                {{ p4.gl_account_code }} {{ p4.gl_description }}
                                              </b-link>
                                            </div>
                                            <ul  v-for="p5 in majorGL.parent5" :key="p5.id" >
                                              <li v-if="p4.gl_account_code == p5.gl_parent_code">
                                                <!-- level six -->
                                                <div >
                                                  <b-link> {{ p5.gl_account_code }} {{ p5.gl_description }} </b-link>
                                                </div>
                                              </li>
                                            </ul>
                                          </li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </li>
                                </ul>
                              </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                    <div v-else>
                      <p>General Ledgers Not Loaded</p>
                    </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
              <div class="float-right mt-4" style="width:100%; position: sticky; top: 0;">
                <div class="card" style="min-height:700px">
                  <div class="card-header">
                    <h5>General Ledger Details</h5>
                  </div>
                  <div class="card-body">
                    <div class="col mt-4">
                      <b-form @submit="onSubmit" @reset="onReset">

                        <div class="row">
                            <div class="col-md-4">
                                <b-form-group id="input-group-3" label="Major GL" label-for="input-3">
                                  <b-form-select
                                    id="input-3"
                                    v-model="form.gl_major_code"
                                    :options="glMajorOptions"
                                    required
                                  ></b-form-select>
                                </b-form-group>
                            </div>
                            <div class="col">
                                <b-form-group id="input-group-3" label="Parent GL" label-for="input-3">
                                  <b-form-select
                                    id="input-3"
                                    v-model="form.gl_parent_code"
                                    :options="glParents"
                                    required
                                  ></b-form-select>
                                </b-form-group>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <b-form-group id="input-group-1" label="GL Account Code" label-for="input-1">
                              <div class="input-group">
                                <b-form-input v-model="form.gl_parent_code" type="text" class="text-right" readonly></b-form-input>
                                <b-form-input v-model="form.gl_account_code" type="text" required></b-form-input>

                              </div>
                            </b-form-group>
                          </div>
                          <div class="col">
                              <b-form-group label="GL Description" label-for="input-2">
                                <b-form-input v-model="form.gl_description" required></b-form-input>
                              </b-form-group>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <b-form-group id="input-group-3" label="GL Type" label-for="input-3">
                                  <b-form-select
                                    id="input-3"
                                    v-model="form.gl_level"
                                    :options="glLevel"
                                    required
                                  ></b-form-select>
                                </b-form-group>
                            </div>
                            <div class="col-md-4">
                                <b-form-group id="input-group-3" label="Status" label-for="input-3">
                                  <b-form-select
                                    id="input-3"
                                    v-model="form.is_disabled"
                                    :options="glStatus"
                                    required
                                  ></b-form-select>
                                </b-form-group>
                            </div>
                        </div>
                        <div class="row mt-4">
                          <div class="col">
                            <p>Usable on Departments:</p>

                          </div>
                        </div>

                        <div class="float-right mt-4">
                          <b-button type="submit" variant="success">Save Changes</b-button>
                        </div>


                      </b-form>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>


  </div>
</template>
<style scoped>
  a:hover{
    color: darkblue;
    font-size: 18px;
    text-decoration: none;
  }
  a {
    color: black;
  }

</style>
<script>
  import { mapGetters, mapActions } from 'vuex';
  import axios from 'axios';

  export default {
    name: 'GL',
    data: () => ({
      form: {

          company_id: 1,
          gl_major_code: null,
          gl_level: null,
          gl_parent_code: null,
          gl_account_code: null,
          gl_description: '',
          is_disabled: null,
          priority_no: '',

        },

      majorGL: {},
      glParents: [{ text: '---', value: null}],
      glMajorOptions: [{ text: '---', value: null}],
      glLevel: [ {text: '---', value: null},{ text: 'Parent', value: 1}, { text: 'Child', value: 0}],
      glStatus: [{text: '---', value: null},{ text: 'Enabled', value: 0}, { text: 'Disabled', value: 1}],
    }),

    computed: {
      ...mapGetters({
          gls: 'genledger/gls',
          loaded: 'genledger/loaded',
          departments: 'department/departments',
          loadedDepartments: 'department/loadedDepartments'
      }),
    },

    methods: {
      //...mapActions(['genledger/fetchGL']),
      onSubmit() {
        console.log('Submitting...');
      },
      onReset() {
        console.log('Resetting Form....');
      },
      loadGLs () {
        console.log('Loading GL List...');
        this.$store.dispatch('genledger/fetchGL', null, { root: true });

      },

      loadDepartments() {
        console.log('Loading Department List...');
        this.$store.dispatch('department/fetchDepartment', null, { root: true });
      },

      getSpecificGL (glAccountCode, majorCode, glDescription, glParentCode, glLevel, isDisabled ) {
        try {
          //const data = await axios.get('/api/gls/' + glaccountcode);
          //console.log(data);

          //remove the parent gl prefix
          glAccountCode= glAccountCode.toString().replace(glParentCode.toString(),'');

          this.form.gl_major_code = majorCode;
          this.form.gl_account_code = glAccountCode;
          this.form.gl_description = glDescription;
          this.form.gl_parent_code = glParentCode;
          this.form.gl_level = glLevel;
          this.form.is_disabled = isDisabled;


        } catch (e) {
          alert(e);
        }
      },
      // async loadChartDepartment(glAccountCode)  {
      //   try {
      //     const data = await axios.get('/api/gls/' + glaccountcode);
      //     console.log(data);

      //   } catch (e) {
      //     alert(e);
      //   }
      // },

      getmajorGL() {
        try {
          //getting Major Accounts
          this.majorGL = this.gls.filter(function (x) {
            return x.gl_parent_code == '0';
          });
          //getting Parent GLs
          let parentGLs;
          parentGLs = this.gls.filter( (x) => {
            return x.gl_level === 1;
          });
          //populate dropdowns
          parentGLs.forEach(p => {
            this.glParents.push({
              text: p.gl_description,
              value: p.gl_account_code
            });
          });
          this.majorGL.forEach(p => {
            this.glMajorOptions.push({
              text: p.gl_description,
              value: p.gl_account_code
            });
          });


          this.traverseGLs();
        }
        catch(e) {
          console.log("Level One Error: "+ e);
        }
      },
      traverseGLs(){
        //traverse the freaking gls object

        //first round
        // this.majorGL.parent1 = this.gls.filter((x) => {
        //   return x.gl_parent_code == this.majorGL.gl_account_code;
        // })
        this.majorGL.parent1 = [];
        this.majorGL.parent2 = [];
        this.majorGL.parent3 = [];
        this.majorGL.parent4 = [];
        this.majorGL.parent5 = [];

        //all parents
        this.majorGL.forEach(element1 => {
            let p = this.gls.filter((a) => {
              return a.gl_level = 1;
            });
             this.glParents.push(...p);
        });
        this.majorGL.forEach(element1 => {
            //one
            let p = this.gls.filter((a) => {
              return a.gl_parent_code == element1.gl_account_code;
            });
             this.majorGL.parent1.push(...p);
        });
        //two
        this.majorGL.parent1.forEach(element2 => {
          let q = this.gls.filter((b) => {
            return b.gl_parent_code == element2.gl_account_code;
          });
          this.majorGL.parent2.push(...q);
        });
        //three
        this.majorGL.parent2.forEach(element3 => {
          let q = this.gls.filter((c) => {
            return c.gl_parent_code == element3.gl_account_code;
          });
          this.majorGL.parent3.push(...q);
        });
        //four
        this.majorGL.parent3.forEach(element4 => {
          let q = this.gls.filter((d) => {
            return d.gl_parent_code == element4.gl_account_code;
          });
          this.majorGL.parent4.push(...q);
        });
        //four
        this.majorGL.parent4.forEach(element5 => {
          let q = this.gls.filter((e) => {
            return e.gl_parent_code == element5.gl_account_code;
          });
          this.majorGL.parent5.push(...q);
        });
      },

    },

    mounted() {
      //make it false to force load it

      this.loadGLs();
      this.getmajorGL();

      this.getmajorGL();
      console.log(this.majorGL);


      this.loadDepartments();
      console.log(this.departments);

    },


  }
</script>
<style scoped>

</style>
