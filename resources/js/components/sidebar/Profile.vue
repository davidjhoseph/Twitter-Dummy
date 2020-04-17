<template>
  <div class="profile">
    <div class="header">{{user.name}}</div>
    <div class="headerimg" :style="{'background-image':'url(../../images/10.jpg)'}">
      <div class="profileimg">
        <img src="../../images/8.jpg" alt="profilepic" />
      </div>
    </div>
    <div class="details">
      <div class="name">{{user.name}}</div>
      <div class="username">@{{user.username}}</div>
      <div class="mt-2 caption">{{profile.caption}}</div>
      <div class="otherDetails">
        <span>
          <i class="fa fa-home mr-2"></i>
          {{profile.location}}
        </span>
        <span>
          <i class="fa fa-home mr-2"></i>
          Born
          {{profile.dob}}
        </span>
        <span>
          <i class="fa fa-home mr-2"></i>
          Joined
          {{profile.date_joined}}
        </span>
      </div>
      <div class="followers">
        <span class="foll">
          <span class="numberFol">54</span> Following
        </span>
        <span class="foll">
          <span class="numberFol">258</span> Followers
        </span>
      </div>
    </div>
    <div class="tabs">
      <div class="tab" :class="tab==='tweets' ? 'active' : ''" @click="activeTab('tweets')">
        <router-link :to="{name:'tweets'}" tag="div">Tweets</router-link>
      </div>
      <div class="tab tabBig" :class="tab==='t&r' ? 'active' : ''" @click="activeTab('t&r')">
        <router-link :to="{name:'t&p'}" tag="div">Tweets & Replies</router-link>
      </div>
      <div class="tab" :class="tab==='media' ? 'active' : ''" @click="activeTab('media')">
        <router-link :to="{name:'media'}" tag="div">Media</router-link>
      </div>
      <div class="tab" :class="tab==='likes' ? 'active' : ''" @click="activeTab('likes')">
        <router-link :to="{name:'likes'}" tag="div">Likes</router-link>
      </div>
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
      profile: {},
      tab: ""
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
    },
    activeTab(tab) {
      this.tab = tab;
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
  .details {
    padding: 0 20px;
    .name {
      font-size: 20px;
      font-weight: bold;
    }
    .username {
      font-size: 18px;
      color: gray;
      line-height: 16px;
    }
    .caption {
      font-size: 18px;
      color: black;
      // margin-top: 20px;
      // margin-bottom: 10px;
    }
    .otherDetails {
      color: gray;
    }
    .followers {
      color: gray;
      .foll {
        margin-right: 20px;
        .numberFol {
          color: black;
          font-weight: bolder;
        }
      }
    }
  }
  .tabs {
    display: flex;
    width: 100%;
    .active {
      border-bottom: 2px solid #1da1f2;
    }
    .tab {
      padding: 15px 0;
      width: 23%;
      color: #1da1f2;
      background-color: white;
      text-align: center;
      &:hover {
        background-color: #d2e4f0;
      }
    }
    .tabBig {
      width: 31%;
    }
  }
  // height: 700px;
}
</style>