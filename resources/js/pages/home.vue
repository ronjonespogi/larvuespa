<template>
<div :style="myStyle" id="wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
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
      </nav>
      <router-view>
      </router-view>
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
