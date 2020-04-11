<template>
  <div class="hold">
    <div class="but" v-if="outline">
      <a :href="to" class="btn btn-outline-primary">{{text}}</a>
    </div>
    <div class="but" v-else>
      <a :href="to" class="btn btn-primary">{{text}}</a>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.hold {
  margin-right: 20px;
  .but {
    display: inline-block;
    a {
      font-weight: bold;
      font-size: 14px;
      width: 100px;
      border-radius: 20px;
    }
  }
}
</style>

<script>
export default {
  props: {
    text: {
      type: String,
      required: true
    },
    outline: {
      type: Boolean,
      default: false
    },
    to: {
      type: String,
      required: true
    }
  }
};
</script>

