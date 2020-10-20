<h1>Commune  ... <?= $params['commune']->nom_commune ?></h1>
<table class="table">
<thead class="table-active">
  <tr>
    <th scope="col">#</th>
    <th scope="col">code postal</th>
    <th scope="col">daira</th>
    <th scope="col">destrict</th>
  </tr>
</thead>
<tbody> 
    
    <tr>
        <th scope="row"><?=$params['commune']->id ?></th>
        <td><?=$params['commune']->code_postal ?></td>
        <td><?=$params['commune']->id_daira ?></td>
        <td><?=$params['commune']->id_destricte ?></td>
    </tr>
</tbody>
</table>
<a href="/commune" class="btn btn-secondary">Retoure en arriére </a>