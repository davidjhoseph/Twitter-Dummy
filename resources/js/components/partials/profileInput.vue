<template>
  <div class="param">
    <input
      :type="type"
      :id="idinput"
      :name="name"
      v-model="text"
      :placeholder="placeholder"
      :style="{
                'border-bottom': text.length > 0 ? '2px solid #1da1f2' : ''
            }"
    />
    <label :for="idinput" :style="{ color: text.length > 0 ? '#1da1f2' : '' }">{{ label }}</label>
    <div v-if="!date" class="labelBelow">
      <div class="length">{{ text.length }}/{{ number }}</div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      text: this.data
    };
  },
  props: {
    date: {
      type: Boolean,
      default: false
    },
    placeholder: {
      type: String
    },
    number: {
      type: String,
      default: "50"
    },
    data: {
      type: String
    },
    idinput: {
      type: String,
      required: true
    },
    name: {
      type: String,
      required: true
    },
    type: {
      type: String,
      default: "text"
    },
    label: {
      type: String,
      required: true
    }
    // value: {
    //   type: String
    // }
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
    background-color: transparent;
    height: 30px;
    position: absolute;
    bottom: 0;
    &:focus {
      outline: none;
      border-bottom: 2px solid #1da1f2;
    }
    &:focus + label {
      color: #1da1f2;
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
  }
  //   .success {
  //     color: #1da1f2;
  //   }
}
</style>
