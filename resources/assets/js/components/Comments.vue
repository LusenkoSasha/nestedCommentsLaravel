<template>
    <div>

        <tree :nodes="tree"></tree>

        <div>
            <comment-form v-on:addComment="addComment"></comment-form>
        </div>

    </div>
</template>

<script>

  import CommentForm from './CommentForm'
  import Tree from './Tree'

  export default {
    name: 'node',

    components: {
      Tree,
      CommentForm
    },
    data () {
      return {
        reply_id: '',
        edit_id: '',
        tree: [],
        show: false
      }

    },
    created: function () {
      var self = this
      axios.get('/api/comment').then(function (response) {
        self.tree = response.data
      })

    },
    methods: {
      addComment (data) {
        this.tree.push(data)
      }

    },

  }

</script>

<style>
    .tree-list ul {
        padding-left: 16px;
        margin: 6px 0;
    }

    ul li {
        list-style: none;
    }
</style>