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
    <div class="admin nopad">
        <div class="signin">
            <div class="header thaisans">
                <h2>เข้าระบบ</h2>
                <h3>ผู้ดูแล</h3>
            </div>
            <form class="form">
                <div class="input">
                    <label class="opensans"><i class="fa fa-user" aria-hidden="true"></i> : username</label>
                    <input type="text" placeholder="username">
                </div>
                <div class="input">
                    <label class="opensans"><i class="fa fa-lock" aria-hidden="true"></i> : password</label>
                    <input type="password" placeholder="password">
                </div>
                <div class="submit">
                    <button>เข้าระบบ</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>