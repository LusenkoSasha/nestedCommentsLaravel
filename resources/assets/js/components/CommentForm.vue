<template>
    <div class="form-comment">
        <div class="field is-horizontal">
            <div class="field-body">
                <div class="field">
                    <label class="label">Ваше имя</label>
                    <p class="control is-expanded has-icons-left">
                        <input class="input" type="text" placeholder="Name" v-model="value.user_name">
                        <span class="icon is-small is-left">
                            <i class="material-icons">person</i>
                        </span>
                    </p>
                </div>
                <div class="field">
                    <label class="label">Ваш e-mail</label>
                    <p class="control is-expanded has-icons-left has-icons-right">
                        <input class="input" type="email" placeholder="Email" v-model="value.email">
                        <span class="icon is-small is-left">
                            <i class="material-icons">email</i>
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label">Сообщение</label>
            <div class="control">
                <textarea class="textarea" placeholder="Explain how we can help you" v-model="value.text"></textarea>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button class="button is-primary">
                    <span @click="send" v-if="parent">Ответить</span>
                    <span @click="send" v-if="!parent">Комментировать</span>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
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
            if(self.parent.children){
              self.parent.children.push(response.data);
            }
            else{
              Vue.set(self.parent, 'children', []);
              self.parent.children.push(response.data);
            }

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
</script>