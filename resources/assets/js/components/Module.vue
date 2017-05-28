<template>
    <div class="Component Module" v-on:click="open">

      <div v-if="_name">
        <div class="Module-name">
            {{_name}}
        </div>
      </div>

      <modal v-else="" id="Module-Add">
        <!-- <div slot="toggle">
          join a team
        </div>
        <div slot="content">
          join a asdfasdf
        </div> -->
        <i slot="toggle" class="fa fa-plus" aria-hidden="true" v-on:click="create"></i>

        <div slot="content" id="Module-Window">
          <modal>
            <div slot="toggle" class="hugebutton">
              create a team
            </div>
            <easyform slot="content" submit="create" :data="{
              action: '/team/create',
              method: 'post',
              input: [
                {
                  name: 'name',
                  type: 'text'
                },
              ]
            }"></easyform>
          </modal>

          <modal slot="content">
            <div slot="toggle" class="hugebutton">
              join a team
            </div>
            <easyform slot="content" submit="create" :data="{
              action: '/team/join',
              method: 'post',
              input: [
                {
                  name: 'invite code',
                  type: 'text'
                },
              ]
            }"></easyform>
          </modal>
        </div>
      </modal>



    </div>
</template>



<script>
    export default {
        props: ["_name", "route"],
        data: function () {
          return {
            showOptions: false,
          }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
          open: function () {
            if (this._name) window.location.href = window.location.origin + this.route

          },
          create: function () {
            this.showModal = true
          },
          remove: function () {
            this.showOptions = false;
            axios.post('/board/delete', this.obj)
            this.$emit('remove')
          }
        }
    }
</script>


<style scoped>
  .Component.Module {
    width: 120px;
    height: 120px;
    background: #f5f5f5;
    border-radius: 10px;
    border: 1px solid;
    box-sizing: border-box;
    margin: 10px;
    cursor: pointer;
    position: relative;
    display: inline-flex;
  }

  .Module-name {
    position: absolute;
    bottom: 0;
    right: 0;
    left: 0;
    text-align: center;
    padding: 5px;
    background: rgba(142, 142, 142, 0.16);
}

.Component.Modal#Module-Add {
    display: flex;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    align-items: center;
    justify-content: center;
}

i.fa.fa-plus {
    font-size: 40px;
    color: #a5a2a2;
}

.fa-plus:before {
    content: "\f067";
    height: 100%;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

#Module-Window {
    position: fixed;
    background: white;
    top: 30px;
    left: 50%;
    width: 70vw;
    transform: translateX(-50%);
    box-sizing: border-box;
    padding: 30px;
    border-radius: 4px;
    border: 1px solid #656161;
    box-shadow: 0 2px 6px #a9a9a9;
    z-index: 2;
    background: white;
}

.hugebutton {
    background: #2196F3;
    color: #f5f5f5;
    border-radius: 4px;
    height: 200px;
    width: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
    cursor: pointer;
}
</style>
