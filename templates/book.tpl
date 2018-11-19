<div class="container-fluid cuerpo-index">
  <div class="row">
    <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
  </div>
  <div class="row">
    <div class="col">
      <section class="col-12">
        <div class="itemBox">
          <div class="itemName">
            <h3>{$book['name']} - Autor: {$book['author']}</h3>
            <h4>Genero: {$book['gender']} - Editorial: {$book['editorial']}</h4>
            {if ($isLoggedIn)}
            <a href="#" onclick="deleteBook({$book['id_book']})"><i class="fa fa-trash fa-2x fa-fw" aria-hidden="true"></i></a>
            <a href="#" onclick="editBook({$book['id_book']})"><i class="fa fa-edit fa-2x fa-fw" aria-hidden="true"></i></a>
            {/if}
          </div>
          <img src="{$book['images'][0]['route']}" alt="Portada del libro {$book['name']}" class="book">
          <div class="itemInfo">
            <p class="review">{$book['review']}</p>
          </div>
        </div>
      </section>
    </div>
  </div>
  <div class="row" id="listCommentary ">
    <div class="id" id="{$book['id_book']}">
    </div>
  </div>
</div>
<script src="./js/scriptApi.js" ></script>
