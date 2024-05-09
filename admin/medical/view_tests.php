<div class="content py-3 bg-gradient-navy px-3 m-3">
    <div class="d-flex justify-content-between align-items-center">
        <h4>View Tests</h4>
        <a href="?page=medical/create_test" class="btn btn-primary">Create New Test</a>
    </div>
</div>
<div class="row mt-n4 justify-content-center align-items-center flex-column">
    <div class="card">
        <table class="table table-striped table-hover datatables-basic" id="list">
            <thead>
            <th>Name</th>
            <th>Results</th>
            <th>Action</th>
            </thead>
            <?php
            $sql = "select * from test";
            $rows = select_rows($sql);
            foreach ($rows as $item){
            $sql = "select * from results where test_id = '$item[id]'";
            $results = select_rows($sql);
            $results = implode(", ",array_column($results,'result'));
                ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $results ?></td>
                    <td>
                        <a href="model/delete_test.php?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm">
                            <i class="bx bxs-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.table').dataTable();
    });
</script>
