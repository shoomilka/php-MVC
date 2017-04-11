<?php
    require_once(__DIR__ .'/layout/header.php');
?>

<div class="container">

    <h1>Upload</h1>
    <hr/>

    <div class="col-md-10">
        <?php if(isset($msg))
            echo '<p class="bg-info">'.$msg.'</p>';
        ?>

        <form accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" action="index.php" method="POST">
                <div class="form-group ">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="name" type="text" id="name">
                    </div>
                </div>
				<div class="form-group ">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="email" type="email" id="name">
                    </div>
                </div>
				<div class="form-group ">
                    <label for="task" class="col-sm-3 control-label">Task</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="task" type="text" id="task" rows="5"></textarea>
                    </div>
                </div>
				<div class="form-group ">
                    <label for="img" class="col-sm-3 control-label">Img</label>
                    <div class="col-sm-6">
                        <input id="img" class="form-control" name="img" type="file" id="name">
                    </div>
                </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
                    <a class="btn btn-default form-control" onclick="getView()">preView</a>
                </div>
            
                <div class="col-sm-3">
                    <input class="btn btn-primary form-control" type="submit" value="Send">
                </div>
            </div>
        </form>

        <div id="result" class="col-sm-offset-3 col-sm-6">
        </div>
    </div>
</div>

	<script type="text/javascript">
        function getView(){
            var div = document.getElementById('result');
            div.innerHTML = '<strong>' + document.getElementById('name').value + '</strong>';
            div.innerHTML += '<p class="text">' + document.getElementById('task').value + '</p>';
            div.innerHTML += '<img style="max-width: 5; max-height: 240" id="raw" src="#" alt="your image" />';

            var input = document.getElementById('img');
            var raw = document.getElementById('raw')
            raw.src = URL.createObjectURL(input.files[0]);
            raw.style.maxWidth = "320px";
            raw.style.maxHeight = "240px";
        }
    
    </script>

<?php
    require_once(__DIR__ .'/layout/footer.php');
?>