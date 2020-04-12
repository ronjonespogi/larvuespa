<template>
  <div>
    <div class="card card-body mt-4" style="min-height: 700px;">
      <div class="row">
        <div class="col">
          <h4 class="font-weight-light">User Information</h4>
          <p class="mt-4 ml-4">Name:  {{ user.name }}</p>
          <p class="ml-4">Email:  {{ user.email }}</p>
          <p class="ml-4">Created:  {{ user.created_at }}</p>
          <p class="ml-4">Last Updated:  {{ user.updated_at }}</p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapGetters } from 'vuex';

export default {
  name: 'UserDash',
  data() {
    return {
      userInfo: {}
    }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  mounted() {

  },
}
</script>
