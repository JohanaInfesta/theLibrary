<article class="container-fluid cuerpo-index">
  <div class="row">
    <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
  </div>
  {if ($author) != null}
  <div class="row">
    <div class="col">
      <section class="col-12">
        <div class="itemBox">
          <div class="itemName">
            <h3>{$author['name']} {$author['surname']}</h3>
            {if ($isLoggedIn)}
            <a href="#" onclick="deleteAuthor({$author['id_author']})"><i class="fa fa-trash fa-2x fa-fw" aria-hidden="true"></i></a>
            <a href="#" onclick="editAuthor({$author['id_author']})"><i class="fa fa-edit fa-2x fa-fw" aria-hidden="true"></i></a>
            {/if}
          </div>
          <img src="{$author['route']}" alt="{$author['name']} {$author['surname']}" class="author">
          <div class="itemInfo">
            <p class="biography">{$author['biography']}</p>
          </div>
        </div>
      </section>
    </div>
  </div>
  {/if}
  <div class="row">
    <div class="col">
      {foreach from=$books item=book}
      <section id="{$book['id_book']}" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 portada">
        <a href="#" onclick="navigatePost('http://localhost/theLibrary/book', {ldelim}id_book:{$book['id_book']}{rdelim})">
          <img src="{$book['images'][0]['route']}"/>
          <div class="name">{$book['name']}</div>
        </a>
        {if ($isLoggedIn)}
        <a href="#" onclick="deleteBook({$book['id_book']})"><i class="fa fa-trash fa-2x fa-fw" aria-hidden="true"></i></a>
        <a href="#" onclick="editBook({$book['id_book']})"><i class="fa fa-edit fa-2x fa-fw" aria-hidden="true"></i></a>
        {/if}
      </section>
      {/foreach}
    </div>
  </div>
</article>
