<template>
  <div class="home">
    <div class="heading border-bottom">Home</div>
    <div class="tweetWrite">
      <form action="/tweet" method="POST" enctype="multipart/form-data">
        <div class="row1">
          <div class="dp">
            <a :href="linking(profile.profileImg)">
              <img :src="linking(profile.profileImg, '10.jpg')" alt="dp" />
            </a>
          </div>
          <input type="text" placeholder="What's happening?" v-model="tweet" />
        </div>
        <div class="row2 mt-2">
          <label for="tweetImage">
            <i class="fa fa-image"></i>
          </label>
          <input type="file" id="tweetImage" />
          <button class="btn btn-primary" :disabled="tweet.length < 1">Tweet</button>
        </div>
      </form>
    </div>
    <div class="contour"></div>
    <div v-for="tweet in tweets" :key="tweet.id" class="tweetBox border-bottom">
      <div class="row">
        <div class="col-md-2">
          <div class="profilepic">
            <img src="../../images/twitterLogo.png" alt />
          </div>
        </div>
        <div class="col-md-10">
          <div class="tweet">
            <div>
              <span class="mr-3 name">{{tweet.name}}</span>
              <span class="username">@{{tweet.username}}</span>
            </div>
            <div class="title mb-1 w-100">{{tweet.title}}</div>
            <div class="content w-100">{{ tweet.content }}</div>
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
      tweets: [],
      user: {},
      profile: {},
      tweet: ""
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
