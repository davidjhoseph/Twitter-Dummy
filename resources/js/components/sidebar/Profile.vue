<template>
  <div class="profile">
    <div class="header">{{user.name}}</div>
    <div class="headerimg" :style="{'background-image':'url(../../images/10.jpg)'}">
      <div class="profileimg">
        <img src="../../images/8.jpg" alt="profilepic" />
      </div>
    </div>
    <!-- <div class="details">{{data.pcaption}}</div> -->
    <div class="tabs">
      <router-link :to="{name:'tweets'}">Tweets</router-link>
    </div>
    <div>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  created: function() {
    this.getProfile();
  },
  data() {
    return {
      user: {},
      profile: {}
    };
  },
  methods: {
    getProfile() {
      axios
        .get("http://localhost:8000/api/profile")
        .then(response => {
          this.user = response.data.user;
          this.profile = response.data.profile;
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>

<style lang="scss" scoped>
.profile {
  width: 100%;
  border-right: 1px solid lightgray;
  border-left: 1px solid lightgray;
  .header {
    padding: 15px 50px;
  }
  .headerimg {
    height: 200px;
    background-color: gray;
    position: relative;
    margin-bottom: 70px;
    background-size: cover;
  }
  .profileimg {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: white;
    img {
      width: 95%;
      height: 95%;
      border-radius: 50%;
    }
    position: absolute;
    bottom: -35%;
    left: 10px;
  }
  // height: 700px;
}
</style>