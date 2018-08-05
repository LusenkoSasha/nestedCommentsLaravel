export default {
  name: 'comment',
  props: ['parent'],
  data() {
    return {
      value: {
        user_name: '',
        email: '',
        text: '',
        parent_id: null,
        children: {},
      },

    };
  },
  methods: {
    send: function() {
      if (this.parent) {
        this.value.parent_id = this.parent.id;
        var self = this;
        axios.post('/api/comment', self.value).then(function(response) {
          self.$root.$children[0].reply_id = '';
          self.parent.children.push(response.data);
          var ms = 'Комментарий от  успешно добавлен!';
          self.$noty.success(ms);
          this.clear();
        }).catch(function(error) {
          self.display(error);
        });
      }
      else {
        var self = this;
        axios.post('/api/comment', this.value).then(function(response) {
          self.$emit('addComment', response.data);
          var ms = 'Комментарий успешно добавлен!';
          self.$noty.success(ms);
          self.clear();
        }).catch(function(error) {

          self.display(error);

        });

      }

    },
    display: function(error) {
      var errors = error.response.data.errors;
      for (var error in errors) {
        this.$noty.error(errors[error]);
      }
    },
    clear: function() {
      this.value.user_name = '',
          this.value.email = '',
          this.value.text = '',
          this.value.parent_id = null,
          this.value.children = {};
    },
  },
};