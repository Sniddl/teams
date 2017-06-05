<template>
    <div class="Component Editor">

      <div class="toolbar">
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
      </div>

      <div class="area">
        <div class="section">
          <textarea class="editor" rows="8" cols="5" @keydown="onType" v-model="content"></textarea>
        </div>
        <div class="section no-grow overflow-scroll">
          text: {{text}} </br>
          html: {{html}} </br>
          content: {{content}} </br>
          <!-- <div class="" v-html="html"></div> -->
        </div>

      </div>

    </div>
</template>

<script>
    export default {
      data() {
        return {
          html: '',
          content: '',
          text: '',
          tags: [],
          ignoredKeys: [
            "*",
            "#",
            "Shift",
            "Backspace",
            "Enter",
            "ArrowLeft",
            "ArrowRight"
          ],
          pos: '',
        }
      },
      mounted() {
          if (!String.prototype.insertAt){
            String.prototype.insertAt = function(position, val) {
              return [this.slice(0, position), val, this.slice(position)].join('')
            }
          }
          if (!String.prototype.removeAt){
            String.prototype.removeAt = function(position) {
              return this.slice(0, position - 1) + this.slice(position)
            }
          }
      },
      methods: {
        onType: function (e) {
          this.pos = $('.editor')[0].selectionStart
          if (this.ignoredKeys.includes(e.key)){
            this[e.key]()
          }
          else if (e.key.length == 1){
            if (this.tags.length == 0) {
              this.tags.push("<p>")
              this.html = this.html.insertAt(this.pos, "<p>")
              this.pos += 3
            }
            this.text = this.html.insertAt(this.pos, e.key)
            this.html = this.html.insertAt(this.pos, e.key)
          }

        },
        closetags: function (array) {
          var result = '';
          for (var val of array) {
            var temp = [val.slice(0, 1), '/', val.slice(1)].join('')
            result += temp

            var index = array.indexOf(val)
            this.tags.splice(index, 1)
          }
          return result;
        },

        // =======================================
        // Special Key Functions
        // =======================================

        "#": function () {
          console.log('#');
        },
        "*": function () {
          console.log('*');
        },
        "Shift": function () {
          console.log('shift');
          console.log(this.closetags());
        },
        "Backspace": function () {
          // console.log(this.pos);
          // // this.html = this.html.removeAt(this.pos)
          var last = this.html.charAt(this.pos-1)
          var last2 = this.html.charAt(this.pos-2)
          // var last2 = this.html.slice(this.pos -1)
          if (last == '>' || last2 == '>') {
            while (last != '<'){
              this.html = this.html.removeAt(this.pos)
              this.pos -= 1
              last = this.html.charAt(this.pos-1)
            }
            this.html = this.html.removeAt(this.pos)
            this.tags.splice(-1, 1)
          }else {
            this.html = this.html.removeAt(this.pos)
          }
          console.log(last);
          // this.html = this.html.removeAt(this.pos)
        },
        "Enter": function () {
          this.html += this.closetags(["<p>"])
        },
        "ArrowLeft": function () {
          // this.pos = $('.editor')[0].selectionStart
          var next = this.content.charAt(this.pos)

          if (next == '>'){
            // console.log(next);
            while (next != '<'){
              this.pos -= 1
              next = this.content.charAt(this.pos)
            }
          }
          var e = $('.editor')[0]
          e.focus()
          e.setSelectionRange(this.pos,this.pos)
        }

      },
      watch: {
        content: function () {
          this.content = this.html
        }
      }

    }
</script>

<style media="screen" scoped>
.Editor {
width: 100%;
position: relative;
}
.toolbar {
    padding: 10px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    border: 1px solid #ccc;
    border-width: 1px 1px 0px;
    border-radius: 7px 7px 0 0;
    background: black;
}

.item {
    margin: 2px;
    width: 30px;
    height: 30px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background: #292929;
}

.area {
    height: 60vh;
    border: 1px solid #ccc;
    border-radius: 0px 0px 7px 7px;
    overflow: hidden;
    display: flex;
}

.section {
    display: flex;
    flex-grow: 1;
    position: relative;
    border-right: 1px solid #ccc;
}
.section:last-child {
    border-right: none;
}
.overflow-scroll {
    overflow: scroll;
}

textarea.editor {
    border: none;
    width: 100% !important;
    height: 100% !important;
    outline: none;
    box-shadow: none;
    resize: none;
}
.no-grow {
    max-width: 50%;
    min-width: 50%;
}
</style>
