<template>
    <div style="margin-bottom: 10px">
      <button v-on:click="toggle">{{button}}</button>
      <div class="" v-if="hidden">
        <slot></slot>
      </div>
    </div>
</template>

<script>
    export default {
        data: function () {
          return {
            hidden: false
          }
        },
        props: ['button'],
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
          toggle: function () {
            this.hidden = !this.hidden
          }
        }
    }
</script>
