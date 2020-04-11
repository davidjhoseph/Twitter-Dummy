<template>
  <div class="trend-box p-2">
    <div class="title">{{title}}</div>
    <div class="genre">{{genre}}</div>
    <div class="tweets">{{tweets}}</div>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      required: true
    },
    genre: {
      type: String,
      required: true
    },
    tweets: {
      type: String,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped>
.trend-box {
  //   border-top: 1px solid lightgray;
  border-bottom: 1px solid lightgray;
  .genre {
    font-size: 20px;
    font-weight: bold;
  }
  .tweets {
    font-size: 18px;
  }
  .title,
  .tweets {
    color: gray;
  }
}
</style>