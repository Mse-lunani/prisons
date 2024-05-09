<div class="content py-3 bg-gradient-navy px-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Create a New Training/Course</h2>
    </div>
</div>
<div class="row mt-n4 justify-content-center align-items-center flex-column">
    <div class="card">
        <form method="post" action="model/add_training.php">
            <div class = "card-body">
                <?php
                input("Name of training","name","text",true);
                input("Duration","duration","text",true);
                ?>

            </div>
            <?php submit(); ?>
        </form>
    </div>
</div>
