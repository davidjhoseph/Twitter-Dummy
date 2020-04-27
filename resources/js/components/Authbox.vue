<template>
  <div class="holder">
    <div class="imageBanner text-center">
      <img
        src="https://abs.twimg.com/sticky/illustrations/twitter_login_sidebar_illustration.png"
        alt="banner"
        width="300px"
      />
    </div>
    <div class="banner-text">See what’s happening in the world right now</div>

    <form action="login" class="login" method="POST">
      <div class="param">
        <input type="text" id="username" name="username" />
        <label for="username">Phone, email or username</label>
      </div>
      <div class="param">
        <input type="password" id="password" name="password" />
        <label for="password">Password</label>
      </div>
      <a href="/forgot">Forgot Password?</a>
      <div>
        <button type="submit" name="submit" class="btn-outline">Log in</button>
      </div>
      <div class="text-center">Or</div>
      <div>
        <a href="/register" class="btn">Sign up</a>
      </div>
    </form>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.holder {
  width: 80%;
  border: 1px solid lightgray;
  border-radius: 15px;
  padding: 15px;
  margin-top: 10px;
  .banner-text {
    font-size: 20px;
    font-weight: bold;
    display: inline-block;
    width: 80%;
    line-height: 25px;
  }
  .login {
    a {
      color: #1da1f2;
    }
    .btn,
    .btn-outline {
      width: 100%;
      font-weight: bold;
      margin: 10px 0;
      border-radius: 30px;
      font-size: 18px;
    }
    .btn {
      background-color: #1da1f2;
      color: white;
      &:hover {
        background-color: #0064a1;
      }
    }
    .btn-outline {
      border: 1px solid #1da1f2;
      background-color: white;
      color: #1da1f2;
      padding: 5px 0;
      &:hover {
        background-color: lightgray;
        color: #1da1f2;
      }
    }
    .param {
      background-color: #ecebeb;
      position: relative;
      height: 60px;
      margin: 10px 0;
      label {
        margin-bottom: 0;
        margin-left: 10px;
        position: absolute;
        // font-size: 18px;
        font-weight: bold;
        top: 0;
      }
      input {
        margin: 0;
        font-size: 20px;
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
          border-bottom: 2px solid #1da1f2;
        }
        &:focus + label {
          color: #1da1f2;
        }
      }
    }
  }
}
</style>