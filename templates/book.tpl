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
  <div class="row">
    <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
  </div>
  <div class="row">
    {if ($isLoggedIn)}
    <div class="col">
      <form class="formCommentary" method="post" onsubmit="postCommentary(this, event)">
        <div class="form-group">
          <input type="hidden" id="" name="id_book" value="{$commentary['id_book_fk']}">
          <input type="hidden" id="" name="id_user" value="{$commentary['id_user_fk']}">
        </div>
        <div class="form-group">
          <label for="commentary">Comentario: </label>
          <textarea name="review" id="" rows="8" cols="50" required>{$commentary['review']}</textarea>
        </div>
        <div class="form-group">
          <label for="store">Calificación: </label>
          <select name='puntaje' required>
            <option value="">Calificar</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
<div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW"></div>
        <button type="submit" class="btn btn-default">Enviar Comentario</button>
      </form>
    </div>
    {/if}
  </div>
</div>
<!-- <script src='https://www.google.com/recaptcha/api.js'></script> <!--captcha-->
<script src="./js/scriptApi.js" ></script>
