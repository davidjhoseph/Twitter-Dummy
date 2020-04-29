<template>
  <div class="tweets">
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
  },
  data() {
    return {
      tweets: {},
      id: this.$route.params.userId
    };
  },
  methods: {
    getTweets() {
      axios
        .get(`http://localhost:8000/tweets/user/${this.id}`)
        .then(response => {
          this.tweets = response.data;
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>

<style lang="scss" scoped>
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
</style>