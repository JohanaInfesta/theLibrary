<article class="container cuerpo-index">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
    </div>
    <div class="row">
        <div class="col">
            {foreach from=$books item=book}
                <section id="{$book['id_book']}" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 portada">
                    <a href="#" onclick="book({$book['id_book']})">
                        <img src="{$book['images'][0]['route']}"/>
                        <div class="name">{$book['name']}</div>
                    </a>
                </section>
            {/foreach}
        </div>
    </div>
</article>
