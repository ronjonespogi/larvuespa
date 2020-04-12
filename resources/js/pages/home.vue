<template>
<div :style="myStyle" id="wrapper">
      <!-- Navigation -->
      <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
        <div class="container">
          <router-link to="/userhome" class="navbar-brand font-weight-light">Dashboard</router-link>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <router-link to="/acctgsettings" class="nav-link">Settings</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/acctggl" class="nav-link">GL</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/acctgsl" class="nav-link">SL</router-link>
              </li>
            </ul>
          </div>
        </div>
      </nav> -->


      <!-- adding this empty card to push components a little bit downwards -->
      <div class="card card-body" style="min-height:50px">

      </div>
      <div class="sidenav">
        <button class="btn btn-sm btn-primary text-left btn-width mb-1" type="button"><router-link to="/acctgsettings" class="nav-link">
        <fa-icon icon="cog" />  User Settings</router-link></button>
        <button class="btn btn-sm btn-primary text-left btn-width mb-1" type="button"><router-link to="/acctggl" class="nav-link">
        <fa-icon icon="books" />  GL Accounts</router-link></button>
        <button class="btn btn-sm btn-primary text-left btn-width mb-1" type="button"><router-link to="/acctgsl" class="nav-link">
        <fa-icon icon="address-book" />  SL Accounts</router-link></button>

      </div>

      <div class="main">
        <router-view>
        </router-view>
      </div>
</div>
</template>

<script>
export default {
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('home') }
  },

  mounted() {
    this.$router.push('/userhome');
  },

  data(){
    return{
      myStyle: {
        backgroundColor:"#F0FFFF"

        }

    }
  }
}
</script>
<style scoped>
.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;

  top: 0;
  left: 0;
  background-color: rgb(47, 96, 233);
  overflow-x: hidden;
  padding-top: 100px;
}

.btn-width {
  width: 100%;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  color: #260464;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */

  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
