<template>
    <div>
        <h1 class="mt-4">{{ article.title }}</h1> 
        <p class="lead">by <a href="#">Start Bootstrap</a></p> 
        <hr>
        <p>Posted on {{ article.created_at  | Date}}</p>
        <hr>
        <img src="http://placehold.it/900x300" alt="" class="img-fluid rounded">
        <hr>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p> 
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p> 
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p> 
        <blockquote class="blockquote">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p> 
            <footer class="blockquote-footer">
                Someone famous in <cite title="Source Title">Source Title</cite>
            </footer>
        </blockquote> 
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p> 
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>
        <hr>
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <textarea rows="3" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="media mb-4">
            <img src="http://placehold.it/50x50" alt="" class="d-flex mr-3 rounded-circle">
            <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div> 
        <div class="media mb-4">
            <img src="http://placehold.it/50x50" alt="" class="d-flex mr-3 rounded-circle"> 
            <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <div class="media mt-4">
                    <img src="http://placehold.it/50x50" alt="" class="d-flex mr-3 rounded-circle">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <div class="media mt-4">
                    <img src="http://placehold.it/50x50" alt="" class="d-flex mr-3 rounded-circle"> 
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
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
                author:''
            }
        },

        created(){
            this.fetchArticle();
        },

        methods: {
            fetchArticle(){
                fetch("api/article/"+this.$route.params.id)
                    .then( res => res.json())
                    .then(res => {
                        this.article = res.data;
                        this.author = res.author_url
                    })
                    .catch(err => console.log(err));
            }
        }
    }
</script>