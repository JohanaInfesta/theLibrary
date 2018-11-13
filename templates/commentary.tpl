<div class="row">
  <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
</div>
<div id="listCommentary" class="row">
</div>
<div class="row">
  {if $isLoggedIn}
  <div class="col">
    <form class="formCommentary" method="post" onsubmit="saveCommentary(this, event)">
      <input type="hidden" id="id_book" name="id_book" value="{$commentary['id_book_fk']}">
      <input type="hidden" id="id_book" name="id_user" value="{$commentary['id_user_fk']}">
      <div class="form-group">
        <label for="commentary">Comentario: </label>
        <textarea name="commentary" id="commentary" rows="8" cols="50" required></textarea>
      </div>
      <div class="form-group">
        <label for="qualification">Calificación: </label>
        <select name='puntaje'>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>
      <div class="g-recaptcha" data-sitekey="6LeiU3oUAAAAAP4WL-U5WqqZ6PU9JSWYA6GdSgcr"></div> <!--captcha -->
      <button type="submit" class="btn btn-default">Enviar Comentario</button>
    </form>
  </div>
  {/if}
</div>
