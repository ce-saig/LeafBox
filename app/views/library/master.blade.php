<!doctype html>
<?php

$user = Session::get('current-user');

if(isset($index)) {
  Session::put('index', $index);
} else {
  $index = Session::get('index');
}

?>
<html>
<head>

    <title>LeafBOX - LAB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link type="text/css" rel="stylesheet" href="<?php echo url('/packages/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.min.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo url('/packages/redactor/redactor.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo url('/packages/font-awesome/css/font-awesome.min.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo url('/packages/fancybox/source/jquery.fancybox.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo url('/packages/bootstrap/css/bootstrap.min.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo url('/packages/bootstrap/css/bootstrap-theme.min.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo url('/packages/jquery/jquery.dataTables.min.css'); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo url('/css/backoffice.css'); ?>" />

    <script type="text/javascript" src="<?php echo url('/packages/jquery-ui/js/jquery-1.10.2.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo url('/packages/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo url('/packages/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo url('/packages/jquery/jquery.dataTables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo url('/packages/fancybox/source/jquery.fancybox.pack.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo url('/packages/ckeditor/ckeditor.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo url('/packages/redactor/redactor.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo url('/js/backoffice.js'); ?>" ></script>

    <script>
        $(function() {
            $('.fancybox').fancybox({});
            $('.datepicker').datepicker({
                'dateFormat': 'yy-mm-dd'
            });

        });
    </script>
</head>
<body>
<div class="container">
    <div id="header">
      <div class="col-md-9 navbar-header">
        <a href="/library">
        </a>
      </div>
      <div class="col-md-3 navbar-tools">
        <ul class="nav navbar-right">
          <li class="dropdown current-user">
            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
              <img src="/images/mockup/user.png" class="user-image" alt="">
              <span class="username"><?php echo $user['email']; ?></span>
              <i class="clip-chevron-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="/library/user-edit?user_id=<?php echo $user['id']; ?>">
                  <i class="clip-user-2"></i>
                  &nbsp;My Profile
                </a>
              </li>
              <li>
                <a href="/library/logout">
                  <i class="clip-exit"></i>
                  &nbsp;Log Out
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <div id="warpper">
        <div id="sidebar">
          <div class="navbar-content main-navigation navbar-collapse collapse">
            <ul class="main-navigation-menu">
              <li <?php if($index == "book") echo 'class="active open"'; ?>>
                <a href="<?php echo url('/library/book'); ?>"><i class="clip-stack"></i>
                  <span class="title"> Book </span><span class="selected"></span>
                </a>
              </li>
              <li <?php if($index == "borrow") echo 'class="active open"'; ?>>
                <a href="<?php echo url('/library/borrow'); ?>"><i class="fa fa-arrows-h"></i>
                  <span class="title"> Borrow </span><span class="selected"></span>
                </a>
              </li>
              <li <?php if($index == "member") echo 'class="active open"'; ?>>
                <a href="<?php echo url('/library/member'); ?>"><i class="clip-user-2"></i>
                  <span class="title"> Member </span><span class="selected"></span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div id="container">
            @section('container')
                Container
            @show
        </div>
    </div>
</div>
</body>
</html>
