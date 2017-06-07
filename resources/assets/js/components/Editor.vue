<template>

  <div class="">
    <div class="">
      <h3><b>Make a Post</b></h3>
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Title" v-model="title">
          </div>
          </br>
          <div id="editor"></div>
          </br>
          <button type="submit" class="btn btn-primary pull-right" @click="post">Post</button>
        </div>
      </div>
    </div>

    <div v-for="post in posts">
      <post :text="post.text" :time="post.time" :title="post.title"></post>
    </div>
  </div>



</template>

<script>
  var Quill = require('quill')
  var q;
  export default {
    props: ['team'],
    data() {
      return {
        content: "",
        title: '',
        posts: {},
      }
    },
    mounted() {
      this.getPosts()
      q = new Quill('#editor', {
        theme: 'snow'
      });
      q.on('text-change', this.change)
    },
    methods: {
      'change':function (delta, oldDelta, source) {
        this.content = q.container.firstChild.innerHTML
      },
      'getPosts': function () {
        axios.get(`/team/${this.team}/posts`)
          .then( (r) => {
            this.posts = r.data
          })


      },
      'post': function (){
        axios.post('/post/create', {
          title: this.title,
          text: this.content,
          team: this.team
        })
        .then( (response) => {
          this.title = ''
          this.content = ''
          $('#editor').empty()
          $('.ql-toolbar')[0].remove()
          q = new Quill('#editor', {
            theme: 'snow'
          });
          q.on('text-change', this.change)
          this.getPosts()
        })


      }
    },
    watch: {
      content: function () {
        console.log('hey edit');
      }
    }
    // Omit the same parts as in the following component sample code
    // ...
  }
</script>
