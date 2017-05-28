<template>
    <div class="Component Module">

      <div v-if="_name">
        <div class="Module-name" v-on:click="showOptions = !showOptions">
            {{_name}}
        </div>

        <div class="Module-options" v-if="showOptions">
            <li class="item" v-on:click="open">
              <span class="choice">Open</span>
            </li>
            <li class="item danger" v-if="obj.pivot.isOwner == 1">
              <span class="choice" v-on:click="remove">Delete</span>
            </li>
        </div>
      </div>

      <modal button="add">
        <i class="fa fa-plus" aria-hidden="true" v-else="" v-on:click="create"></i>

        <modal button="Create a Team">
          <easyform submit="create" :data="{
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

        <modal button="Join a Team">
          <easyform submit="create" :data="{
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
            window.location.href = window.location.origin + this.route
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
