<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>LeafBOX Studio !</title>
    <link type="text/css" rel="stylesheet" href="<?php echo url('/packages/bootstrap/css/bootstrap.min.css'); ?>" />
    <style>
        html, body {
            margin: 0px;
            padding: 0px;
            font-family: "Helvetica Nueu", sans-serif;
            color: #eeeeee;
        }
        
        #bg {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            background: #eeeeee left -250px;
            z-index: 0;
            
            -webkit-filter: blur(20px);
            -moz-filter: blur(20px);
            -o-filter: blur(20px);
            -ms-filter: blur(20px);
            filter: blur(20px);
        }
        
        #wrapper {
            position: absolute;
            top: 30px;
            width: 100%;
            height: 400px;
        }
        
        .panel {
            width: 300px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            background: #595b59;
            z-index: 100;
            color: #fff;
        }
        
        #login-form {
            
        }
        
        input {
            width: 236px;
        }
        
        #logo {
            display: block;
            margin: auto;
            margin-bottom: 20px;
            height: 100px;
        }
        
    </style>
</head>
<body>
<div id="bg"></div>
<div id="wrapper">
    <div class="panel">
        <form id="login-form" action="" method="post">
            <div><img id="logo" src="<?php echo url('/img/leafbox.png'); ?>" /></div>
            <?php if(!empty($message)) { ?>
            <div class="alert alert-danger"><?php echo $message; ?></div>
            <?php } ?>
            <div style="margin-bottom: 10px;">E-mail</div>
            <div><input type="email" name="email" class="form-control" value="<?php if(!empty($email)) echo $email; ?>" /></div>
            <div style="margin-bottom: 10px;">Password</div>
            <div style="margin-bottom: 20px;"><input type="password" name="password" class="form-control" value="" /></div>
            <div style="text-align: center;"><button class="btn btn-default" style="width: 100px;">Log in</button></div>
            <div style="clear: both;"></div>
        </form>
    </div>
</div>
</body>
</html>