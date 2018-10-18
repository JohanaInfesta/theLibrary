<div class="row">
  <div class="col-md-6 col-md-offset-3" id="">
  </div>
  <div class="col-md-6 col-md-offset-3">
    <form method="post" onsubmit="addAuthor(this, event)">
      <input type="hidden" id="" name="id_author" value="{$author['id_author']}">

      <div class="form-group">
        <label for="name">Nombre Autor: </label>
        <input type="text" class="form-control" id="" name="name" value="{$author['name']}" placeholder="Nombre del Autor" required>
      </div>

      <div class="form-group">
        <label for="surname">Apellido Autor: </label>
        <input type="text" class="form-control" id="" name="surname" value="{$author['surname']}" placeholder="Apellido del Autor" required>
      </div>

      <div class="form-group">
        <label for="nationality">Nacionalidad: </label>
        <input type="text" class="form-control" id="" name="nationality" value="{$author['nationality']}" placeholder="Nacionalidad del Autor" required>
      </div>

      <div class="form-group">
        <label for="biography">Biografia: </label>
        <textarea name="descripcion" id="" name="biography" rows="8" cols="50" required>{$author['biography']}</textarea>
      </div>

      <div class="form-group">
        <label for="imagen">Imagen Manga:</label>
        <input type=file id="" name="images[]" accept="image/*" placeholder="url de la imagen" required>
      </div>

      <button type="submit" class="btn btn-default">Guardar Autor</button>
    </form>
  </div>
</div>
