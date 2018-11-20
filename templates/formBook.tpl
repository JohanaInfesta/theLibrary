<div class="container-fluid cuerpo-form">
  <div class="row">
    <div class="col-md-4 col-md-offset-4" id="">
    </div>
    <div class="col-md-4 col-md-offset-4">
      <form method="post" enctype="multipart/form-data" onsubmit="saveBook(this, event)">
        <input type="hidden" id="" name="id_book" value="{$book['id_book']}">

        <div class="form-group">
          <label for="name">Nombre Libro: </label>
          <input type="text" class="form-control" id="" name="name" value="{$book['name']}" placeholder="Nombre del Libro" required>
        </div>

        <div class="form-group">
          <label for="gender">Genero: </label>
          <select name="gender">
            <option value="">Seleccionar Genero</option>
            {foreach from=$genders item=gender}
              <option value="{$gender}" {if $book['gender'] == $gender}selected {/if}>{$gender}</option>
            {/foreach}
          </select>
        </div>

        <div class="form-group">
          <label for="editorial">Editorial: </label>
          <input type="text" class="form-control" id="" name="editorial" value="{$book['editorial']}" placeholder="Editorial" required>
        </div>

        <div class="form-group">
          <label for="id_author">Autor: </label>
          <select name="id_author">
            <option value="">Seleccionar Autor</option>
            {foreach from=$authors item=author}
            <option value="{$author['id_author']}" {if $author['id_author'] == $book['id_author']}selected {/if}>{$author['name']} {$author['surname']}</option>
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
          <input type=file id="" name="images[]" accept="image/*" placeholder="url de la imagen" multiple {if !$book['id_book']} required{/if}>
        </div>
        <div class="g-recaptcha" data-sitekey="6LeiU3oUAAAAAP4WL-U5WqqZ6PU9JSWYA6GdSgcr"></div> <!--captcha -->

        <button type="submit" class="btn btn-outline-dark btn-categorias">Guardar Libro</button>
      </form>
    </div>
    <div class="col-md-8 col-md-offset-2" id ="mensajeForm">
    </div>
    <div>
    {if $book['id_book']}
        {foreach from=$images item=image}
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
</div>
