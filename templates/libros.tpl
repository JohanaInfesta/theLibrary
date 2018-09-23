<article class="container cuerpo-index">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
    </div>
    <div class="row">
        <div class="col" id="categoria">
            {if $categoria['id_categoria']}
                <h1> {$categoria['nombre']} </h1>
                {if ($isLoggedIn)}
                <a href="#" onclick="deleteCategoria({$categoria['id_categoria']})"><i class="fa fa-trash fa-2x fa-fw" aria-hidden="true"></i></a>
                <a href="#" onclick="editCategoria({$categoria['id_categoria']})"><i class="fa fa-edit fa-2x fa-fw" aria-hidden="true"></i></a>
                {/if}
            {/if}
        </div>
        <div class="col">
            {foreach from=$libros item=libro}
                <section id="{$libro['id_book']}" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 portada">
                    <a href="#" onclick="libroModal({$libro['id_book']})">
                        <img src="{$libro['imagenes'][0]['ruta']}"/>
                        <div class="name">{$libro['nombre']}</div>
                    </a>
                    {if ($isLoggedIn)}
                    <a href="#" onclick="deleteLibro({$libro['id_book']})"><i class="fa fa-trash fa-2x fa-fw" aria-hidden="true"></i></a>
                    <a href="#" onclick="editLibro({$libro['id_book']})"><i class="fa fa-edit fa-2x fa-fw" aria-hidden="true"></i></a>
                    {/if}
                    <a href="#" onclick="mostrarComentarios({$libro['id_book']})"><i class="fa fa-comments fa-2x fa-fw" aria-hidden="true"></i></a>
                </section>
            {/foreach}
        </div>
    </div>
</article>
