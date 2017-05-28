<template>
    <div class="Component Modal">
      <div class="Modal-Toggle" v-on:click="toggle">
        <slot  name="toggle"></slot>
      </div>

      <div class="Modal-Hidden" v-if="hidden">
        <slot name="content"></slot>
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

<style scoped>
  .Component.Modal, .Modal-Toggle, .Modal-Hidden{
    display: inline-flex;
  }
</style>
