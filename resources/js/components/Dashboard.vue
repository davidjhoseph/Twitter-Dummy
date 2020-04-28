<template>
  <div class="holder">
    <div class="container">
      <div class="row">
        <div class="col-3 mt-2">
          <div class="sidebar">
            <sidebar></sidebar>
          </div>
        </div>
        <div class="col-6">
          <div class="home">
            <router-view />
          </div>
        </div>
        <div class="col-3 mt-2">
          <div class="trending">Trending things</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from "./partials/Sidebar";
export default {
  created: function() {
    window.user_id = +this.user;
  },
  props: {
    user: {
      type: String,
      required: true
    }
  },
  components: {
    sidebar: Sidebar
  }
};
</script>

<style lang="scss" scoped>
.holder {
  // margin: 10px 0;
  .sidebar {
    position: fixed;
  }
  .trending {
    position: fixed;
  }
}
</style>