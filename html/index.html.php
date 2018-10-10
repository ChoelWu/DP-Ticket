<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>DP-Ticket</title>
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <script type="text/javascript" src="../JavaScript/jquery1.7.2.js"></script>
    <style>
        table {
            margin: 50px auto;
        }

        td {
            width: 300px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="body">
    <a href="./tpl.php?act=add&file">添加模板</a>
    <table>
        <tr>
            <th>模板名称</th>
            <th>文件</th>
            <th>操作</th>
        </tr>
        <?php echo $trs ?>
    </table>
</div>
<script>
    function delete_tpl(file) {
        var delete_con = confirm("确定要删除吗？");
        if (delete_con) {
            $.get("./tpl.php?act=delete&file=" + file, function (data) {
                console.log(data);
                if (data.status == "1") {
                    alert(data.message);
                    setTimeout(function () {
                        location.reload();
                    }, 500);
                }
            }, "json");
        }
    }
</script>
</body>
</html>