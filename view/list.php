<?php
    require_once(__DIR__ .'/layout/header.php');
?>

<div class="container">

    <h1>Edit</h1>
    <hr/>

<?php if(isset($msg)) if($msg != '') echo '<p class="bg-info">'.$msg.'</p>';

    foreach($tasks as $task){ ?>

    <div class="col-md-10">

        <form accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" action="/index.php/list?id=<?php echo $task->id; ?>" method="POST">
                <div class="form-group">
                    <p class="bg-info"><strong><?php echo $task->name; ?></strong></p>
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
				        <p class="text"><?php echo $task->email; ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Checked</label>
                    <div class="col-sm-6">
                        <input type="checkbox" name="checked" value="checked" <?php echo ($task->checked) ? 'checked' : '' ?>> Checked<br>
                    </div>
                </div>
				<div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Task</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="task" type="text" id="task" rows="5"><?php echo $task->task; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-12">
                        <img class="img-responsive" id="raw" src="/<?php echo $task->img; ?>" alt="your image" />
                    </div>
                </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
                    <input class="btn btn-primary form-control" type="submit" value="Send">
                </div>
            </div>
        </form>
    </div>

    <?php } ?>
</div>

<div  class="text-center">
    <ul class="pagination">
        <?php echo ($min == $page)?'<li class="active"><a href="/index.php?page='.$min.';sort='.$sort.'">'.$min.'</a></li>'
        :'<li><a href="/index.php?page='.$min.';sort='.$sort.'">&laquo;</a></li>';


    for($i = $min+1; $i < $max; $i++){
        echo '<li'.(($i == $page)?' class="active"':'').'><a href="/index.php?page='.$i.';sort='.$sort.'">'.$i.'</a></li>';
    }

    echo ($max == $page)?'<li class="active"><a href="/index.php?page='.$max.';sort='.$sort.'">'.$max.'</a></li>'
        :'<li><a href="/index.php?page='.$max.';sort='.$sort.'">&raquo;</a></li>';

    ?>
    </ul>
</div>

<?php
    require_once(__DIR__ .'/layout/footer.php');
?>