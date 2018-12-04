<div class="container-fluid cuerpo-index book">
  <div class="row">
    <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
  </div>
  <div class="row">
    <div class="col">
      <section class="col-12">
        <div class="itemBox">
          <div class="itemName id" id="{$book['id_book']}">
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
  <div class="row listCommentary" id="listCommentary">
    <input type="hidden" id="isAdmin" name="isAdmin" value="{$isSuperUser}">

  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
  </div>
  <div class="row">
    {if ($isLoggedIn)}
    <div class="col">
      <form class="formComment" method="post" onsubmit="postComment(this, event)">
        <div class="form-group">
          <input type="hidden" id="id_comment" name="id_comment" value="{$comment['id_comment']}">
          <input type="hidden" id="id_book" name="id_book" value="{$book['id_book']}">
          <input type="hidden" id="id_user" name="id_user" value="{$user['id_user']}">
        </div>
        <div class="form-group">
          <label for="comment">Comentario: </label>
          <textarea name="comment" id="comment" rows="8" cols="50" required>{$comment['comment']}</textarea>
        </div>
        <div class="form-group">
          <label for="score">Calificación: </label>
          <select name='score' id="score" required>
            <option value="">Calificar</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
          <div class="g-recaptcha" data-sitekey="6Lc9034UAAAAABd71mGTPsslIPR3PESfbUSg77J7"></div>
        <button type="submit" class="btn btn-outline-dark btn-categorias">Enviar Comentario</button>
      </form>
    </div>
    {/if}
  </div>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
