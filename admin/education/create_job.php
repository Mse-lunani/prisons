<div class="content py-3 bg-gradient-navy px-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Create a New Job</h2>
    </div>
</div>
<div class="row mt-n4 justify-content-center align-items-center flex-column">
    <div class="card">
        <form method="post" action="model/add_job.php">
            <div class = "card-body">
                <?php
                input("Name of Job","name","text",true);
                textarea_input("Description","description",true);
                ?>

            </div>
            <?php submit(); ?>
        </form>
    </div>
</div>
