<template>
    <div class="article-padding">
        <article class="media is-block" v-for="node in nodes">
            <span></span>
            <div class="media-content">
                <div class="content">

                    <div class="form-comment" v-if="$root.$children[0].edit_id == node.id">
                        <p>Редактирование комментария</p>
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <label class="label">Ваше имя</label>
                                    <p class="control is-expanded has-icons-left">
                                        <input class="input" type="text" placeholder="Name" v-model="node.user_name">
                                        <span class="icon is-small is-left">
                            <i class="material-icons">person</i>
                        </span>
                                    </p>
                                </div>
                                <div class="field">
                                    <label class="label">Ваш e-mail</label>
                                    <p class="control is-expanded has-icons-left has-icons-right">
                                        <input class="input" type="email" placeholder="Email" v-model="node.email">
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
                                <textarea class="textarea" placeholder="Explain how we can help you"
                                          v-model="node.text"></textarea>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-primary">
                                    <span @click="update(node)" >Сохранить</span>

                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <p><strong>{{ node.user_name }} {{node.created_at | formatDate}} <small v-if="node.created_at != node.updated_at" class="has-text-grey-light"> обновлен {{node.updated_at | formatDate}}</small></strong>
                            <span class="button is-light is-small" @click="edit(node.id)"><i
                                    class="material-icons md-18">edit</i></span>
                            <span class="button is-light is-small " @click="remove(node)"><i
                                    class="material-icons md-18"> clear</i></span>
                        </p>

                        <div v-html="node.text"></div>
                        <br>
                        <small @click="toggle(node.id)" class="reply"><i class="material-icons v-m">
                            reply
                        </i> <span>Ответить</span></small>
                    </div>
                </div>


            </div>
            <comment-form v-if="$root.$children[0].reply_id == node.id" :parent="node" v-on:addComment="addComment"></comment-form>
            <tree v-if="node.children && node.children.length" :nodes="node.children"
                  @send="send(node)"></tree>
        </article>


    </div>

</template>

<script>
    import CommentForm from './CommentForm';

    export default {
        name: "tree",
        components: {
            CommentForm
        },
        props: {
            nodes: Array
        },
        data() {
            return {}
        },
        methods: {
            remove: function (item) {
                var self = this;
                axios.delete('/api/comment/'+item.id).then(function (response) {
                    self.nodes.splice(self.nodes.indexOf(item), 1);
                    var ms = "Комментарий от "+item.user_name+" успешно удален!";
                    self.$noty.success(ms)
                })
            },
            addComment:function(value){

            },
            update: function (item) {
                var self = this;
                axios.put('/api/comment/'+item.id, item).then(function (response) {
                    self.$root.$children[0].edit_id = '';
                    var ms = "Комментарий успешно обновлен!";
                    self.$noty.success(ms)
                })
            },


            toggle: function (id) {
                this.$root.$children[0].reply_id = id
            },
            edit: function (id) {
                this.$root.$children[0].edit_id = id
            }
        },
        filters:{
            formatDate: function (value) {

                if (value){

                    return moment(String(value)).format('MM.DD.YY в H:mm')
                }

            }
        }


    };
</script>