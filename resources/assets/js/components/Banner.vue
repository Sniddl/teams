<template>
    <div class="banner" v-on:scroll="scroll">
      <div class="subnav">
        <div class="avatar"></div>

        <div class="info">
          <div class="link">
            <span class="text" @click="$root.go(`/team/${team}`)">{{team}}</span>
          </div>
          <div class="link" v-if="edit == 1" @click="$root.go(`/team/${team}/edit/home`)">
            <span class="text">Edit</span>
          </div>
          <div class="link no-pointer" v-else-if="edit == 'editing'">
            <span class="text"><b>Editing...</b></span>
          </div>
        </div>

        <div class="pages">
          <div class="link">
            <span class="text" v-if="edit == 'editing'" @click="$root.go(`/team/${team}/edit/home`)">Home</span>
            <span class="text" v-else="" @click="$root.go(`/team/${team}/home`)">Home</span>
          </div>
          <div class="link">
            <span class="text" v-if="edit == 'editing'" @click="$root.go(`/team/${team}/edit/roster`)">Roster</span>
            <span class="text" v-else="" @click="$root.go(`/team/${team}/roster`)">Roster</span>
          </div>
          <div class="link">
            <span class="text" v-if="edit == 'editing'" @click="$root.go(`/team/${team}/edit/about`)">About</span>
            <span class="text" v-else="" @click="$root.go(`/team/${team}/about`)">About</span>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
        props: ["edit", "team"],
        mounted() {
            console.log('banner mounted');
            window.addEventListener('scroll', this.scroll);
        },
        methods: {
          save: function () {

          },
          scroll: function (e) {
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
    /*display: flex;
    align-items: center;
    justify-content: flex-end;*/
    /*padding: 20px;*/
}
.pages, .info {
    display: flex;
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    align-items: center;
    justify-content: flex-end;
    padding: 20px;
}

.info {
  justify-content: flex-start;
  padding-left: calc(5% + 125px + 20px)
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
    z-index: 5;
    position: relative;
}.link:hover{cursor: pointer;}

.pages .link:hover {
    padding: 14px 20px;
    cursor: pointer;
    background: darkseagreen;
    color: white;
    text-shadow: 0px 1px black;
}
.no-pointer, .no-pointer:hover {
  cursor: default;
}
</style>
