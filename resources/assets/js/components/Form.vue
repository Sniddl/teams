<template>
    <div class="Component Form">
      <form class="" :action="val.action" :method="val.method">
        <input type="hidden" name="_token" :value="$parent.csrf">
        <div v-for="input in data.input">
            <input :type="input.type"
                   :name="noSpace(input.name)"
                   :placeholder="input.name"
                   :id="noSpace(input.name)">
        </div>

        <button type="submit">{{submit}}</button>
      </form>
    </div>

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
        data: function () {
          return {
            val: ''
          }
        },
        props: ['data', 'submit'],
        mounted() {
            this.val = this.data
        },
        methods: {
          noSpace: function (val) {
            return val.split(' ').join('-')
          }
        }
    }
</script>
