<template>
    <div>
        <h1 class="mt-4">{{ article.title }}</h1> 
        <p class="lead">by <a href="#">Start Bootstrap</a></p> 
        <hr>
        <p>Posted on {{ article.created_at  | Date}}</p>
        <hr>
        <img src="http://placehold.it/900x300" alt="" class="img-fluid rounded">
        <hr>
        <p class="lead">{{article.body}}</p>
        <hr>
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form @submit.prevent="addComment">
                    <div class="form-group">
                        <textarea rows="3" class="form-control" v-model="comment.comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div v-if="article.comments">
            <div class="media mb-4" v-for="comment in article.comments.slice().reverse()" v-bind:key="comment.comment">
                <img v-bind:src="comment.user_img" alt="" class="d-flex mr-3 rounded-circle"> 
                <div class="media-body">
                    <h5 class="mt-0">{{comment.username}}</h5>
                    {{comment.comment}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted(){
        },
        data(){
            return  {
                article:{
                    title:'',
                    id:'',
                    body:''
                },
                author:'',
                comment: {
                    username: 'user name test',
                    user_img: 'http://placehold.it/50x50',
                    comment: ''
                }
            }
        },

        created(){
            this.fetchArticle();
        },

        methods: {
            fetchArticle(){
                fetch('api/article/'+this.$route.params.id)
                    .then( res => res.json())
                    .then(res => {
                        this.article = res.data;
                        this.author = res.author_url
                    })
                    .catch(err => console.log(err));
            },
            addComment(){
                fetch('api/article/'+this.$route.params.id+'/comment', {
                    method: 'post',
                    body: JSON.stringify(this.comment),
                    headers:{
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.comment.comment = '';
                    this.fetchArticle()
                })
                .catch(err => console.log(err))
            }
        }
    }
</script>