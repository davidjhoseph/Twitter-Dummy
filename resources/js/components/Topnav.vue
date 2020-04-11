<template>
  <div class="holder">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-7 col-sm-12">
          <div class="topnav">
            <a href="/">
              <img src="../images/twitterLogo.png" alt="Logo" width="40px" />
            </a>
            <search></search>
          </div>
        </div>
        <div class="col-md-5">
          <div class="buttons">
            <but-ton text="Log in" outline to="/login"></but-ton>
            <but-ton text="Sign up" to="/register"></but-ton>
          </div>
        </div>
      </div>
    </div>
    <!-- <hr /> -->
  </div>
</template>
<style lang="scss" scoped>
.holder {
  padding: 10px 0;
  border-bottom: 1px solid lightgray;
  .topnav {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .buttons {
    display: flex;
    justify-content: center;
  }

  //   background-color: white;
}
</style>
<script>
import Search from "./partials/Searchbar";
import Button from "./partials/Btn.vue";
export default {
  components: {
    search: Search,
    butTon: Button
  }
};
</script>
