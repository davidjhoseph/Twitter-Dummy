<template>
  <div class="holder">
    <div class="logo">
      <img src="../../images/twitterLogo.png" alt="logo" />
    </div>
    <router-link :to="{ name: 'home' }" tag="div">
      <div class="home tab">
        <div
          class="contentHolder"
          :class="tab === 'home'? 'active' : ''"
          @click="activeTab('home')"
        >
          <div class="content">
            <div class="icon mr-4">
              <i class="fa fa-home"></i>
            </div>
            <div class="link">Home</div>
          </div>
        </div>
      </div>
    </router-link>
    <router-link :to="{ name: 'explore' }" tag="div">
      <div class="expl tab">
        <div
          class="contentHolder"
          :class="tab === 'explore'? 'active' : ''"
          @click="activeTab('explore')"
        >
          <div class="content">
            <div class="icon mr-4">
              <i class="fa fa-hashtag"></i>
            </div>
            <div class="link">Explore</div>
          </div>
        </div>
      </div>
    </router-link>
    <router-link :to="{ name: 'notification' }" tag="div">
      <div class="notifications tab">
        <div
          class="contentHolder"
          :class="tab === 'notifications'? 'active' : ''"
          @click="activeTab('notifications')"
        >
          <div class="content">
            <div class="icon mr-4">
              <i class="fa fa-bell"></i>
            </div>
            <div class="link">Notifications</div>
          </div>
        </div>
      </div>
    </router-link>
    <router-link :to="{ name: 'messages' }" tag="div">
      <div class="messages tab">
        <div
          class="contentHolder"
          :class="tab === 'messages'? 'active' : ''"
          @click="activeTab('messages')"
        >
          <div class="content">
            <div class="icon mr-4">
              <i class="fa fa-envelope"></i>
            </div>
            <div class="link">Messages</div>
          </div>
        </div>
      </div>
    </router-link>
    <router-link :to="{ name: 'bookmark' }" tag="div">
      <div class="bookmarks tab">
        <div
          class="contentHolder"
          :class="tab === 'bookmark'? 'active' : ''"
          @click="activeTab('bookmark')"
        >
          <div class="content">
            <div class="icon mr-4">
              <i class="fa fa-bookmark"></i>
            </div>
            <div class="link">Bookmarks</div>
          </div>
        </div>
      </div>
    </router-link>
    <router-link :to="{ name: 'list' }" tag="div">
      <div class="lists tab">
        <div
          class="contentHolder"
          :class="tab === 'list'? 'active' : ''"
          @click="activeTab('list')"
        >
          <div class="content">
            <div class="icon mr-4">
              <i class="fa fa-list"></i>
            </div>
            <div class="link">List</div>
          </div>
        </div>
      </div>
    </router-link>
    <router-link :to="{ name: 'profile' }" tag="div">
      <div class="profile tab">
        <div
          class="contentHolder"
          :class="tab === 'profile'? 'active' : ''"
          @click="activeTab('profile')"
        >
          <div class="content">
            <div class="icon mr-4">
              <i class="fa fa-home"></i>
            </div>
            <div class="link">Profile</div>
          </div>
        </div>
      </div>
    </router-link>
    <router-link :to="{ name: 'more' }" tag="div">
      <div class="more tab">
        <div
          class="contentHolder"
          :class="tab === 'more'? 'active' : ''"
          @click="activeTab('more')"
        >
          <div class="content">
            <div class="icon mr-4">
              <i class="fa fa-ellipsis-h"></i>
            </div>
            <div class="link">More</div>
          </div>
        </div>
      </div>
    </router-link>
    <div class="text-center mt-3">
      <button class="tweetButton">Tweet</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tab: "home"
    };
  },
  methods: {
    activeTab(tab) {
      this.tab = tab;
    }
  }
};
</script>

<style lang="scss" scoped>
.holder {
  width: 100%;
  .tweetButton {
    margin: 0 auto;
    width: 250px;
    // height: 40px;
    font-size: 20px;
    padding: 10px 20px;
    background-color: #1da1f2;
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 50px;
  }
  .logo {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-left: 10px;
    &:hover {
      background-color: gray;
    }
    img {
      width: 80%;
    }
  }

  .tab {
    font-weight: bold;
    margin-top: 15px;
    cursor: pointer;
    .active {
      background-color: #c8e6f8;
      color: #1da1f2;
      border-radius: 30px;
    }
    .contentHolder {
      display: inline-block;
      padding: 10px 15px;
      padding-right: 25px;
      min-width: 10%;
      font-size: 20px;
      &:hover {
        background-color: #c8e6f8;
        color: #1da1f2;
        border-radius: 30px;
      }
      .content {
        display: flex;
        align-items: center;
      }
    }
  }
}
</style>
