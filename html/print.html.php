<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="extra" style="text-align:center; margin-top: 20px;">
    <label for="">选择模板</label>
    <select name="" id="select-tpl">
        <option>
            <未选择模板>
        </option>
        <?php echo $options ?>
    </select>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="javascript:print();">打印</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="javascript:selectAsDefaultPrinter();">选择默认打印机</a>
</div>

</body>
</html>