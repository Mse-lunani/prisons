<div class="content py-3 bg-gradient-navy px-3 m-3">
    <div class="d-flex justify-content-between align-items-center">
        <h4>View Store Items</h4>
        <a href="?page=store/create_item" class="btn btn-primary">Create New Item</a>
    </div>
</div>
<div class="row mt-n4 justify-content-center align-items-center flex-column">
    <div class="card">
        <table class="table table-striped table-hover datatables-basic" id="list">
            <thead>
            <th>Name</th>
            <th>Value</th>
            <th>Action</th>
            </thead>
            <?php
            $sql = "select * from store_items";
            $rows = select_rows($sql);
            foreach ($rows as $item){

                ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['value'] ?></td>
                    <td>
                        <a href="model/delete_item.php?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm">
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
