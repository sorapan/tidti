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

<div class="errorpage">
<h2>Error page</h2>
<h3><?=$text?></h3>
<button onclick="history.go(-1);">ย้อนกลับ </button>
</div>
</body>
</html>
