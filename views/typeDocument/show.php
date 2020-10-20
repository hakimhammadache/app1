<div class="card mx-5" style="background-color: #fafafa">
    <h2 class="mx-auto titre">Documents de Type : <small class="text-success"><?=$params['tdoc']->nom_doc?></small></h2>
 
    <div class="table-responsive">
        <table class="table table-striped table-sm" >
            <thead class="table-active">

    <tr>
      <th scope="col">ID</th>
      <th scope="col">liste documents</th>
      <th scope="col">Date ajout</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($params['tdoc']->getDocs() as $doc):?>
      <tr>
        <th scope="row"><?=$doc->id?></th>
        <td id="dc"><?=$doc->nom_doc?></td>
        <td><?=$doc->getCreatedAt()?> </td>
        <td>
          <!-- fai attention ici j'ai utiliser a fonction de Document Controller -->
          <form class="d-inline" action="/document/<?=$doc->id?>"  method="post" target="_blank">
            <input type="hidden" name="pathfile" value="<?= $doc->pathfile ?>">
          <button type="submit" class="btn btn-sm btn-outline-info">Consulté</button>
          </form>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

    </div>


</div>
<nav class="row col-12 my-2">
            <ul class="pagination mx-auto">
                <li class="page-item disabled">
                    <a class="page-link" href="#">
                        <span>&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <span>&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>

<script>
  
      const searchInput = document.getElementById("search");
      const rows = document.querySelectorAll("tbody tr");
      console.log(rows);
      searchInput.addEventListener("keyup", function (event) {
        const q = event.target.value.toLowerCase();
        rows.forEach((row) => {
         (row.querySelector("#dc").textContent.toLowerCase().startsWith(q))
          
            ? (row.style.display = "table-row")
            : (row.style.display = "none");
        });
      });
  
</script>

