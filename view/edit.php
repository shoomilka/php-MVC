<?php
    require_once(__DIR__ .'/layout/header.php');
?>

<div class="container">

    <h1>Edit</h1>
    <hr/>

    <div class="col-md-10">

        <form accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" action="index.php" method="POST">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                        <strong><?php echo $task->name; ?></strong>
				        <p class="text"><?php echo $task->email; ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Checked</label>
                    <div class="col-sm-6">
                        <input type="checkbox" name="checked" <?php echo ($task->checked) ? 'checked' : '' ?>> Checked<br>
                    </div>
                </div>
				<div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Task</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="task" type="text" id="task" rows="5"><?php echo $task->task; ?>
                        </textarea>
                    </div>
                </div>
                <img style="max-width: 5; max-height: 240" id="raw" src="<?php echo $task->img; ?>" alt="your image" />

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
                    <input class="btn btn-primary form-control" type="submit" value="Send">
                </div>
            </div>
        </form>

        <div id="result" class="col-md-10">
        </div>
    </div>
</div>

<?php
    require_once(__DIR__ .'/layout/footer.php');
?>