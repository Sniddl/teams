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
          <!-- html: {{html}} </br>
          content: {{content}} </br> -->
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
          text: '{}',
          character: 0,
          line: 1,
          json: {
            text: ''
          },
          current: {
            line: '',
            char: '',
          },
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
          this.text = {}
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
          // this.pos = $('.editor')[0].selectionStart
          if (this.ignoredKeys.includes(e.key)){
            this[e.key]()
          }
          else if (e.key.length == 1){
            if (!this.text[`line-${this.line}`]) {
              this.current.line = this.text[`line-${this.line}`] = {}
            }
            //var line = this.text[`line-${this.line}`]

            if (!this.current.line[`char-${this.character}`]){
              this.current.char = this.current.line[`char-${this.character}`] = {}
            }

            this.current.char.val = e.key
            this.current.char.class = 'paragraph'

            this.character += 1
            this.json.text = JSON.stringify(this.text)
            // console.log(this.text);
            // this.characterCount += 1
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

        },
        "*": function () {

        },
        "Shift": function () {

        },
        "Backspace": function () {

        },
        "Enter": function () {
          this.line += 1
        },
        "ArrowLeft": function () {

        }

      },
      watch: {
        'json.text': {
          handler: function () {
            var t = this.text
            var l;
            for ( var line in t ){
              l = ''
              var _class = ''
              for ( var char in t[line]) {
                var c = t[line][char]
                if (c.class != _class) _class =
                l += .val;
              }
              console.log(l);
            }
          },
          deep: true
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
