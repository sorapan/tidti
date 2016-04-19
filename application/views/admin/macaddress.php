<!DOCTYPE html>
<html>
    
<body>
    
    <form method="get">
        <input type="text" name="qry">
        <button type="submit">search</button>
    </form>
    
    <?=empty($qry)?"":$qry?>
</body>
</html>
