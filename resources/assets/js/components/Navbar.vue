<template>
    <div class="navbar" >
      <div class="logo-wrapper" v-on:click="$root.go('/')">
        <div class="logo">

        </div>
      </div>
      <div class="nav-items">
        <div class="item" v-on:click="dropdown = !dropdown" v-if="isauth">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>

        <div class="item no-width" v-on:click="$root.go('/login')" v-if="!isauth">
          Login
        </div>
        <div class="item no-width" v-on:click="$root.go('/register')" v-if="!isauth">
          Register
        </div>
      </div>

      <div class="nav-dropdown" v-if="dropdown">

        <div class="dropdown-item" v-on:click="$root.go('/')">
          Dashboard
        </div>
        <div class="dropdown-item" v-on:click="$root.go('/me/settings')">
          Settings
        </div>
        <div class="dropdown-item important" v-on:click="logout">
          Logout
          <form id="logout-form" action="/me/logout" method="POST" style="display: none;">
              <input type="hidden" name="_token" :value="$root.csrf">
          </form>
        </div>

      </div>
    </div>
</template>

<script>
    export default {
        props: ['isauth'],
        data() {
          return {
            dropdown: false
          }
        },
        mounted() {
            console.log(this.isauth)
        },
        methods: {
          logout: function () {
            $('#logout-form').submit()
          }
        }
    }
</script>

<style media="screen" scoped>
.navbar {
  width: 100vw;
  height: 50px;
  background: black;
  border-radius: 0px;
  position: relative;
  margin: 0;
  margin-bottom: 20px;
}

.logo {
    height: 50px;
    width: 50px;
    background-image: url("/img/sniddl-logo-white.png");
    background-position: center;
    background-size: cover;
    cursor: pointer;
    position: relative;
    z-index: 4;
}

.logo-wrapper {
    display: flex;
    width: 100%;
    height: 100%;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 0;
    left: 0;
}

.item {
    height: 40px;
    width: 40px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 30px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    color: #ccc;
    position: relative;
    z-index: 4;
    padding: 10px;
}
.item.no-width {
  width: auto !important;
  margin: 10px !important;
}
.nav-items {
    display: flex;
    align-items: center;
    width: 100%;
    height: 100%;
    justify-content: flex-end;
    padding-right: 10px;
    position: absolute;
    left: 0;
    top: 0;
}

.nav-dropdown {
    width: 200px;
    position: absolute;
    right: 30px;
    background: black;
    z-index: 3;
    bottom: -15px;
    transform: translateY(100%);
}

.dropdown-item {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding: 9px 20px;
    border-bottom: 1px solid #292929;
    color: #ccc;
    position: relative;
    z-index: 5;
}

.dropdown-item:hover{
  background: #292929;
  cursor: pointer;
}

.dropdown-item:last-of-type{
  border: none;
}
.dropdown-item.important {
  background: #d4555e;
  color: white;
}
.dropdown-item.important:hover{
  background: #ba4a52;
}

.nav-dropdown:before {
    content: "";
    display: block;
    background: transparent;
    border-width: 25px;
    border-color: transparent transparent black;
    border-style: solid;
    position: absolute;
    top: 10px;
    z-index: 4;
    transform: translateY(-100%);
    right: 5px;
}
</style>
