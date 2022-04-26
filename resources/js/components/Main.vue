<template>

  <main>

    <div class="container">

      <h1>Elenco dei post</h1>

      <div class="row">

        <div class="col-4" v-for="post in posts" :key="post.id">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{  post.title  }}</h5>
              <p class="card-text">{{  post.content  }}</p>
              <a href="#" class="btn btn-primary">Vedi articolo completo</a>
            </div>
          </div>
        </div>
          
      </div>
    </div>
    
  </main>
  
</template>

<script>
export default {
    name: 'Main',

    data() {
      return {
        posts: [],
      }
    },

    created() {
      axios.get('/api/posts').then((response) => {
        this.posts = response.data.results;
      });
    }
}
</script>

<style>
</style>
