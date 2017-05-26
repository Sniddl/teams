<template>
    <form class="" :action="data.action" :method="data.method">
      <div v-for="input in data.input">
        <input :type="input.type"
               :name="input.name"
               :placeholder="input.name"
               :id="input.name"
        >
      </div>
    </form>
</template>

<script>
    export default {
      //data prop example
      // {
      //   action: '/route/here',
      //   method: 'post',
      //   input: {
      //     {
      //       name: 'email',
      //       type: 'email'
      //     },
      //   }
      // }
        props: ['data'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
