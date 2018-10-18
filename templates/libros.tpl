<article class="container cuerpo-index">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
    </div>
    <div class="row">
        <div class="col">
            {foreach from=$books item=book}
                <section id="{$book['id_book']}" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 portada">
                    <a href="#" onclick="libroModal({$book['id_book']})">
                        <img src="{$book['imagenes'][0]['ruta']}"/>
                        <div class="name">{$book['name']}</div>
                    </a>
                    <a href="#" onclick="mostrarComentarios({$book['id_book']})"><i class="fa fa-comments fa-2x fa-fw" aria-hidden="true"></i></a>
                </section>
            {/foreach}
        </div>
    </div>
</article>
