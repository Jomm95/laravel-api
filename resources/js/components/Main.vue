<template>

    <div class="container">

      <h1>Elenco dei post</h1>
      

      <div class="row">

        <div class="col-4" v-for="post in posts" :key="post.id">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{  post.title  }}</h5>
              <p class="card-text">{{  post.content.substring(0,16)  }}</p>
              <a href="#" class="btn btn-primary">Vedi articolo completo</a>
            </div>
          </div>
        </div>
          
      </div>

      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item" :class="(currentPage == 1) ? 'disabled' : '' "><span class="page-link" @click="getPosts(currentPage - 1)">Precedente</span></li>
          <li class="page-item" :class="(currentPage == lastPage) ? 'disabled' : '' "><span class="page-link" @click="getPosts(currentPage + 1)">Successivo</span></li>
        </ul>
      </nav>
    </div>
  
</template>

<script>
export default {
    name: 'Main',

    data() {
      return {
        posts: [],
        currentPage : 1,
        lastPage : null,
      }
    },

    methods: {
      // metodo per chiamata axios
      getPosts(apiPage) {
        //rotta definita in api.php
        axios.get('/api/posts', {
          // secondo parametro di pagina corrente
          'params' : {
            'page' : apiPage
          }
        })
        
        .then((response) => {
          // handle success
          console.log(response);
          // store in data della risposta
          this.currentPage = response.data.results.current_page;
          this.posts = response.data.results.data;
          this.lastPage = response.data.results.last_page;
        });
      },

    },

    // alla creazione lancia chiamata axios
    created() {
      this.getPosts();
    },
};
</script>

<style>
</style>
