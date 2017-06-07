<template>
  <div class="panel panel-default">
      <div class="panel-heading">
        <h4><b>{{title}}</b></h4>
        <div class="time">
          {{time}}
        </div>
      </div>
      <div class="panel-body" v-html="text">

      </div>
  </div>
</template>

<script>
    export default {
        props: ["text", "time", "title"],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>


<style media="screen" scoped>
.panel{
  margin-top: 40px;
}
.panel-heading {
  position: relative;
}
.time {
  position: absolute;
  top: 0;
  right: 10px;
  transform: translateY(-100%);
  height: 10px;
  line-height: 3px;
  font-size: 10px;
}
</style>
