<template>
  <div class="search">
    <i class="fa fa-search"></i>
    <input type="text" :placeholder="text" />
  </div>
</template>

<script>
export default {
  props: {
    text: {
      type: String,
      default: "Search Twitter"
    }
  }
};
</script>

<style lang="scss" scoped>
.search {
  width: 580px;
  padding: 5px 0;
  //   height: 50px;
  background-color: lightgray;
  display: flex;
  align-items: center;
  justify-content: space-around;
  border-radius: 30px;
  i {
    font-size: 20px;
    font-weight: 0;
    color: gray;
  }
  input {
    width: 520px;
    background-color: lightgray;
    border: none;
    height: 25px;
    &::placeholder {
      color: gray;
    }
    &:focus {
      outline: none;
    }
  }
}
</style>