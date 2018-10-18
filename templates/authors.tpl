<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
        </div>
        <div class="row">
            <div class="col listaAutores">
                {foreach from=$authors item=author}
                    <button type="button" class="btn btn-default btn-autores" onclick="navigatePost('http://localhost/theLibrary/contenidoAutor', {ldelim}id_author:{$author['id_author']}{rdelim})">
                        {$author['name']}
                    </button>
                {/foreach}
            </div>
        </div>
    </div>
