<template>
  <div class="param">
    <input
      :type="type"
      :id="idinput"
      :name="name"
      v-model="text"
      :placeholder="title"
      :style="{'border-bottom':text.length>0?'2px solid #1da1f2':''}"
    />
    <label :for="idinput" :style="{'color':text.length>0?'#1da1f2':''}">{{ title }}</label>
    <div v-if="namefield" class="labelBelow">
      <div :style="{'color':text.length>0?'#1da1f2':''}" class="textBelow">What's your name?</div>
      <div class="length">{{text.length}}/50</div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      text: ""
    };
  },
  props: {
    namefield: {
      type: Boolean,
      default: false
    },
    idinput: {
      type: String,
      required: true
    },
    name: {
      type: String,
      required: true
    },
    title: {
      type: String,
      required: true
    },
    type: {
      type: String,
      default: "text"
    }
  }
};
</script>

<style lang="scss" scoped>
.param {
  background-color: #ecebeb;
  position: relative;
  height: 60px;
  margin-bottom: 30px;

  label {
    margin-bottom: 0;
    // margin-left: 10px;
    position: absolute;
    // font-size: 18px;
    font-weight: bold;
    padding-left: 5px;
    top: 0;
  }
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
  input {
    margin: 0;
    font-size: 20px;
    padding-left: 5px;
    display: block;
    width: 100%;
    border: none;
    border-bottom: 2px solid gray;
    background-color: inherit;
    height: 30px;
    position: absolute;
    bottom: 0;
    &:focus {
      outline: none;
      border-bottom: 2px solid red;
    }
    &:focus + label {
      color: red;
    }
  }
  .labelBelow {
    position: absolute;
    bottom: 0;
    width: 100%;
    //   right: 15px;
    font-size: 18px;
    .length {
      position: absolute;
      right: 10px;
      color: gray;
    }
    .textBelow {
      position: absolute;
      left: 10px;
      font-size: 14px;
    }
  }
  //   .success {
  //     color: #1da1f2;
  //   }
}
</style>