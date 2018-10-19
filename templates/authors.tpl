<div class="container-fluid cuerpo-index">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
        </div>
        <div class="row">
            <div class="col listaAutores">
                {foreach from=$authors item=author}
                    <section id="{$author['id_author']}" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 authors">
                        <a href="#" onclick="navigatePost('http://localhost/theLibrary/author', {ldelim}id_author:{$author['id_author']}{rdelim})">
                            <img src="{$author['route']}"/>
                            <div class="name">{$author['name']} {$author['surname']}</div>
                        </a>
                    </section>
                {/foreach}
            </div>
        </div>
    </div>
