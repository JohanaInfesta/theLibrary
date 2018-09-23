<article class="container cuerpo-index">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
    </div>
    <div class="row">
        <div class="col">
            {foreach from=$libros item=libro}
                <section id="{$libro['id_book']}" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 portada">
                    <a href="#" onclick="libroModal({$libro['id_book']})">
                        <img src="{$libro['imagenes'][0]['ruta']}"/>
                        <div class="name">{$libro['name']}</div>
                    </a>
                    <a href="#" onclick="mostrarComentarios({$libro['id_book']})"><i class="fa fa-comments fa-2x fa-fw" aria-hidden="true"></i></a>
                </section>
            {/foreach}
        </div>
    </div>
</article>
