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

        <form accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" action="/index.php/login" method="POST">
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="username" type="text">
                    </div>
                </div>
				<div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                        <input class="form-control" name="password" type="password">
                    </div>
                </div>

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