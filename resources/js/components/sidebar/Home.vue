<template>
  <div class="home">
    <div class="heading border-bottom">Home</div>
    <div class="tweetWrite">
      <form action="/tweet" method="POST" enctype="multipart/form-data">
        <div class="row1">
          <div class="dp">
            <router-link :to="{ name: 'profile', params: {userId:user.id} }">
              <img :src="linking(profile.profileImg, '10.jpg')" alt="dp" />
            </router-link>
          </div>
          <input type="text" placeholder="What's happening?" v-model="tweetWrite" />
        </div>
        <div class="row2 mt-2">
          <label for="tweetImage">
            <i class="fa fa-image"></i>
          </label>
          <input type="file" id="tweetImage" />
          <button class="btn btn-primary" :disabled="tweetWrite.length < 1">Tweet</button>
        </div>
      </form>
    </div>
    <div class="contour"></div>
    <a href></a>
    <div v-for="tweet in tweets" :key="tweet.tweet.id" class="tweetBox border-bottom">
      <div class="row">
        <div class="col-md-2">
          <div class="profilepic">
            <router-link :to="{ name: 'profile', params: {userId: tweet.user.id || 1} }">
              <img :src="linking(tweet.profile.profileImg, '10.jpg')" alt />
            </router-link>
          </div>
        </div>
        <div class="col-md-10">
          <div class="tweet">
            <div>
              <span class="mr-3 name">{{typeof tweet.user === 'string' ? 'Name' : tweet.user.name}}</span>
              <span
                class="username"
              >@{{typeof tweet.user === 'string' || tweet.user.username === null ? 'username' : tweet.user.username}}</span>
            </div>
            <div class="title mb-1 w-100">{{tweet.tweet.title || 'Tweet Title'}}</div>
            <div class="content w-100">{{ tweet.tweet.content || 'Tweet Content'}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created: function() {
    this.getTweets();
    this.getProfile();
  },
  data() {
    return {
      tweets: {},
      user: {},
      profile: {},
      tweetWrite: ""
    };
  },
  methods: {
    getTweets() {
      axios
        .get("http://localhost:8000/api/tweets")
        .then(response => {
          this.tweets = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    getProfile() {
      axios
        .get(`http://localhost:8000/api/profile/${window.user_id}`)
        .then(response => {
          this.user = response.data.user;
          this.profile = response.data.profile;
        })
        .catch(error => {
          console.log(error);
        });
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
.home {
  width: 100%;
  border-right: 1px solid lightgray;
  border-left: 1px solid lightgray;
  .heading {
    font-size: 20px;
    font-weight: bold;
    color: black;
    width: inherit;
    height: 50px;
    padding: 10px 10px;
    width: 28.25%;
    background-color: white;
    z-index: 999999999;
    position: fixed;
    top: 0;
    // width: 40%;
    // overflow: hidden;
  }
  .tweetWrite {
    padding-top: 60px;
    padding-bottom: 10px;
    .row1 {
      display: flex;
      align-items: center;
      padding: 0 10px;
      .dp {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        // background-color: gray;
        img {
          width: 100%;
          height: 100%;
          border-radius: 50%;
        }
      }
      input {
        // min-height: 35px;
        // word-wrap: break-word;
        // overflow-wrap: break-word;
        // word-break: break-all;
        font-size: 20px;
        margin-left: 10px;
        border: none;
        width: 80%;
        &:focus {
          outline: none;
        }
        &::placeholder {
          color: lightgray;
        }
      }
    }
    .row2 {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
      input {
        display: none;
      }
      label {
        margin-left: 60px;
        cursor: pointer;
        i {
          font-size: 23px;
          color: #1da1f2;
        }
      }
      button {
        width: 90px;
        font-weight: bold;
        padding: 10px;
        border-radius: 30px;
      }
    }
  }
  .contour {
    height: 10px;
    background-color: #f0f0f0;
  }
  .tweetBox {
    // background-color: red;
    padding: 10px 0;
    .profilepic {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
      }
    }
    .tweet {
      // padding: 0 10px;
      .name {
        font-size: 18px;
        font-weight: bold;
        color: black;
      }
      .username {
        color: gray;
      }
    }
  }
}
</style>
