<!DOCTYPE html>
<html lang="en">
<!-- <head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?=asset_url()?>reset.css">
    <link rel="stylesheet" type="text/css" href="<?=asset_url()?>login.css">
</head> -->

<?=header_url()?>
<body>
    <div class="admin col-xs-12 nopad">
        <div class="signin">
            <form method="post" action="std_logincheck" class="form">
                <div>
                    <input type="text" placeholder="username" name="e_pass">
                </div>
                <div>
                    <input type="password" placeholder="password" name="pass">
                </div>
                <div class="submit">
                    <button type="submit">เข้าระบบ</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
