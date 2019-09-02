<template>
    <div>
        <h1 class="my-4">Articles</h1>

        <div class="card mb-4" v-for="article in articles" v-bind:key="article.id">
          <img class="card-img-top" v-bind:src="'/images/'+article.img" v-bind:alt="article.title">
          <div class="card-body">
            <h2 class="card-title"><router-link :to="'/article/' +article.slug ">{{article.title}}</router-link></h2>
            <p class="card-text">{{article.intro}}</p>
            <router-link class="btn btn-primary" :to="'/article/' +article.slug ">Read More →</router-link>
          </div>
          <div class="card-footer text-muted">
            Posted on {{ article.created_at  | Date}} by
            <a href="#">Start Bootstrap</a>
          </div>
        </div>

        <ul class="pagination justify-content-center mb-4">
          <li v-bind:class="[{disabled: !pagination.prev_page_url}]"  class="page-item">
            <a class="page-link" href="#"  @click="fetchArticles(pagination.prev_page_url, $event)">← Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link text-dark" href="#">page {{pagination.current_page}} of {{pagination.last_page}}</a>
          </li>
          <li v-bind:class="[{disabled: !pagination.next_page_url}]"  class="page-item">
            <a class="page-link" href="#"  @click="fetchArticles(pagination.next_page_url, $event)">Newer →</a>
          </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return  {
                articles:[],
                pagination: {},
            }
        },

        created(){
            this.fetchArticles();
        },

        updated: function(){
            //this.fetchArticles();
            console.log(this.$root);
        },

        methods: {
            fetchArticles(page_url, eventl){
                if (event) event.preventDefault()
                let vm = this;
                page_url = page_url || page_url == 'api/articles/'+this.$route.params.id ? page_url : 'api/articles/'+this.$route.params.id;


                console.log(page_url);
                fetch(page_url)
                  .then( res => res.json())
                  .then(res => {
                      this.articles = res.data;
                      vm.makePagination(res.meta, res.links)
                  })
                  .catch(err => console.log(err));
            },

            makePagination(meta, links){

                let pagination = {
                    current_page : meta.current_page,
                    last_page : meta.last_page,
                    next_page_url : links.next,
                    prev_page_url : links.prev
                }
                this.pagination = pagination;
            }
        }
    }
</script>