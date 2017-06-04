<template>
    <div class="banner" v-on:scroll="scroll">
      <div class="subnav">
        <div class="avatar"></div>

        <div class="link">
          <span class="text">Home</span>
        </div>
        <div class="link">
          <span class="text">Roster</span>
        </div>
        <div class="link">
          <span class="text">About</span>
        </div>

      </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            window.addEventListener('scroll', this.scroll);
        },
        methods: {
          scroll: function (e) {
            console.log($('.banner')[0].getBoundingClientRect().bottom);
            if($('.banner')[0].getBoundingClientRect().bottom <= 0) {
               $('.subnav').addClass('stuck')
            } else {
              $('.subnav').removeClass('stuck')
            }

          }
        }
    }
</script>

<style media="screen">
.banner {
  width: 100vw;
  background: rebeccapurple;
  height: 300px;
  position: relative;
  margin-bottom: 70px;
  margin-top: -20px;
}

.subnav {
    width: 100vw;
    background: #fff;
    height: 50px;
    position: absolute;
    bottom: -50px;
    opacity: 1;
    border: 1px solid #ccc;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding: 20px;
}

.subnav.stuck {
    position: fixed;
    bottom: initial;
    top: 0;
    border-width: 0px 0px 1px 0px;
    z-index: 2;
}

.avatar {
    position: absolute;
    width: 125px;
    height: 125px;
    left: 5%;
    background: darkseagreen;
    top: 50%;
    transform: translateY(-50%);
    border-radius: 100%;
}
.stuck .avatar {
    width: 40px;
    height: 40px;
}

.link {
    padding: 14px 20px;
    cursor: pointer;
}

.link:hover {
    padding: 14px 20px;
    cursor: pointer;
    background: darkseagreen;
    color: white;
    text-shadow: 0px 1px black;
}
</style>
