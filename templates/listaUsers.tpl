<div class="container-fluid cuerpo-index">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" id="mensaje"></div>
    </div>
    <div class="row">
        <div class="col listaUsers">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">Is administrator?</th>
                        <th scope="col">Delete</th>
                    </tr>                        
                </thead>
                <tbody>
                    {foreach from=$users item=user}
                        <tr scope="row" id="{$user['id_user']}">
                            <td><h5>{$user['name']}</h5></td>
                            <td><h5><input type="checkbox" data-id="{$user['id_user']}" class="cboxSuperUser" value="{$user['id_user']}" {if {$user['is_admin']}}checked {/if} {if {$userLog['id_user'] == $user['id_user']}}disabled{/if}>  SuperUser {$user[id_user]}</h5></td>
                            <td><a href="#" onclick="deleteUser({$user['id_user']})"><i class="fa fa-trash fa-2x fa-fw" aria-hidden="true"></i></a></td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>
