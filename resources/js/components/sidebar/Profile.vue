<template>
  <div class="profile">
    <div class="header">{{ user.name }}</div>
    <div
      class="headerimg"
      :style="{
                'background-image': `url(${linking(profile.headerImg, '10.jpg')})`
            }"
    >
      <div class="profileimg">
        <img :src="linking(profile.profileImg, '8.jpg')" alt="profilepic" />
      </div>
    </div>

    <div v-if="authId === id" class="text-right mt-4 mr-3">
      <a :href="link('profile/edit')" class="editprofile">Edit Profile</a>
    </div>
    <div v-else class="mt-4 mr-3 text-right">
      <button @click="follow()" class="btn btn-primary">{{ follows ? 'unfollow' : 'follow' }}</button>
    </div>
    <div class="details">
      <div class="name">{{ user.name }}</div>
      <div class="username">@{{ user.username || 'username' }}</div>
      <div class="mt-2 caption">{{ profile.caption }}</div>
      <div class="otherDetails">
        <span>
          <i class="fa fa-home mr-2"></i>
          {{ profile.location || 'Update your Location' }}
        </span>
        <span>
          <i class="fa fa-home mr-2"></i>
          Born
          {{ profile.dob || 'Update your birthday' }}
        </span>
        <span>
          <i class="fa fa-home mr-2"></i>
          Joined
          {{ profile.created_at}}
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
      <div class="tab" :class="tab === 'tweets' ? 'active' : ''" @click="activeTab('tweets')">
        <router-link :to="{ name: 'tweets' }" tag="div">Tweets</router-link>
      </div>
      <div class="tab tabBig" :class="tab === 't&r' ? 'active' : ''" @click="activeTab('t&r')">
        <router-link :to="{ name: 't&p' }" tag="div">Tweets & Replies</router-link>
      </div>
      <div class="tab" :class="tab === 'media' ? 'active' : ''" @click="activeTab('media')">
        <router-link :to="{ name: 'media' }" tag="div">Media</router-link>
      </div>
      <div class="tab" :class="tab === 'likes' ? 'active' : ''" @click="activeTab('likes')">
        <router-link :to="{ name: 'likes' }" tag="div">Likes</router-link>
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
    this.following();
  },
  data() {
    return {
      user: {},
      profile: {},
      tab: "",
      id: this.$route.params.userId,
      authId: window.user_id,
      follows: false
    };
  },
  methods: {
    getProfile() {
      axios
        .get(`http://localhost:8000/api/profile/${this.id}`)
        .then(response => {
          this.user = response.data.user;
          this.profile = response.data.profile;
        })
        .catch(error => {
          console.log(error);
        });
    },
    follow() {
      axios
        .post(`http://localhost:8000/follow/${this.id}`)
        .then(response => {
          this.follows = response.data.follows;
          // console.log(response.data);
        })
        .catch(err => {
          console.log(err.status);
        });
    },
    following() {
      axios
        .get(`http://localhost:8000/follow/${this.id}`)
        .then(response => {
          this.follows = response.data;
          // console.log(response.data);
          // console.log(this.follows);
        })
        .catch(err => {
          console.log(err.status);
        });
    },
    activeTab(tab) {
      this.tab = tab;
    },
    linking(url, image) {
      if (url !== null) {
        return "http://localhost:8000/storage/" + url;
      } else {
        return "http://localhost:8000/images/" + image;
      }
    },
    link(url) {
      return "http://localhost:8000/" + url;
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
    font-size: 23px;
    font-weight: bold;
  }
  .editprofile {
    padding: 15px 25px;
    text-decoration: none;
    border: 1px solid #1da1f2;
    border-radius: 30px;
    background-color: white;
    color: #1da1f2;
    font-weight: bold;
    &:hover {
      background-color: #cbecff;
    }
  }
  .headerimg {
    height: 200px;
    background-color: gray;
    position: relative;
    background-size: cover;
    background-position: center;
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
    margin-top: 20px;
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
      cursor: pointer;
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
