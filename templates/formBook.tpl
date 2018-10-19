<div class="row">
  <div class="col-md-4 col-md-offset-4" id="">
  </div>
  <div class="col-md-4 col-md-offset-4">
    <form method="post" onsubmit="addBook(this, event)">
      <input type="hidden" id="" name="id_book" value="{$book['id_book']}">

      <div class="form-group">
        <label for="name">Nombre Libro: </label>
        <input type="text" class="form-control" id="" name="name" value="{$book['name']}" placeholder="Nombre del Libro" required>
      </div>

      <div class="form-group">
        <label for="gender">Genero: </label>
        <select>
          <option value=""></option>
          <option value="{$book['gender']}">Novela</option>
          <option value="{$book['gender']}">Accion</option>
          <option value="{$book['gender']}">Drama</option>
          <option value="{$book['gender']}">Terror</option>
        </select>
      </div>

      <div class="form-group">
        <label for="editorial">Editorial: </label>
        <input type="text" class="form-control" id="" name="nationality" value="{$book['editorial']}" placeholder="Editorial" required>
      </div>

      <div class="form-group">
        <label for="id_author">Autor: </label>
        <select name="id_author">
          <option value=""></option>
          {foreach from =$authors item=author}
          <option value="{$author['name']}">{$author['name']} {$author['surname']}</option>
          {/foreach}
        </select>
      </div>

      <div class="form-group">
        <label for="review">Descripcion: </label>
        <textarea name="review" id="" name="review" rows="8" cols="50" required>{$book['review']}</textarea>
      </div>

      <div class="form-group">
        <label for="nbr_pages">Total de páginas: </label>
        <input type="number" class="form-control" id="" name="nbr_pages" value="{$book['nbr_pages']}" placeholder="Cantidad de Páginas" required>
      </div>

      <div class="form-group">
        <label for="imagen">Imagen Libro:</label>
        <input type=file id="" name="images[]" accept="image/*" placeholder="url de la imagen" required>
      </div>

      <button type="submit" class="btn btn-outline-dark btn-categorias">Guardar Libro</button>
    </form>
  </div>
</div>
