<template>
    <div>
        <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
                <div class="row" v-for="group in groups" v-bind:key="group._id">
                    <div class="col-lg-6" v-for="category in group" v-bind:key="category._id">
                        <a class="" @click="emitCategory(category._id)">{{category.title}}</a>
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
                groups:[]
            }
        },

        created(){
            this.fetchCategories();
        },

        methods: {
            fetchCategories(){
                fetch('api/categories/')
                    .then( res => res.json())
                    .then(res => {
                        this.groups = res.data;
                    })
                    .catch(err => console.log(err));
            },

            emitCategory(category_id){
                this.$root.$emit('updateArticles', category_id);
            }
        }
    }
</script>