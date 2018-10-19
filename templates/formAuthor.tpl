<div class="row">
  <div class="col-md-4 col-md-offset-4" id="">
  </div>
  <div class="col-md-4 col-md-offset-4">
    <form method="post" enctype="multipart/form-data" onsubmit="addAuthor(this, event)">
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
        <label for="imagen">Imagen Autor:</label>
        <input type=file id="" name="images[]" accept="image/*" placeholder="url de la imagen" required>
      </div>

      <button type="submit" class="btn btn-outline-dark btn-categorias">Guardar Autor</button>
    </form>
  </div>
  <div class="col-md-8 col-md-offset-3">
  {if $author['id_author']}
      {foreach from=$imagenes item=image}
        <section id="{$image['id_image']}" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 portada">
          <img src="{$image['route']}"/>
          <a href="#" onclick="deleteImage({$image['id_image']})">
            <i class="fa fa-trash fa-2x fa-fw" aria-hidden="true"></i>
          </a>
        </section>
      {/foreach}
  {/if}
  </div>
</div>
