<div class="content py-3 bg-gradient-navy px-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Create New Test</h2>
    </div>
</div>
<div class="row mt-n4 justify-content-center align-items-center flex-column">
    <div class="card">
        <form method="post" action="model/add_test.php">
            <div class = "card-body">
                <?php
                input("Name","name","text",true);
                ?>
                <hr>
                <h5>Results   <i class="bx bxs-plus-circle" style="cursor: pointer" id="add_result"></i></h5>
                <div class = "row align-items-center">
                    <div class= "col-6">
                        <div class="form-group">
                            <label>Result Name</label>
                            <input type="text" name="result[]" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <?php submit(); ?>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#add_result").click(function(){
            var html = '<div class="row align-items-center"><div class="col"><div class="form-group"><label>Result Name</label><input type="text" name="result[]" class="form-control"></div></div><div class="col"><i class="bx bxs-minus-circle" style="cursor: pointer" id="remove_result"></i></div></div>';
            $(".card-body").append(html);
        });
        $(".card-body").on('click','#remove_result',function(){
            $(this).closest('.row').remove();
        });
    });
</script>