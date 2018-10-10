<?php
if(!empty($_GET['has_tpl'])) {
    $tpl = './tpl/' . $_GET['has_tpl'];
    include($tpl);
}

$files = scandir('./tpl/');
unset($files['0']);
unset($files['1']);
$options = '';
foreach ($files as $file) {
    $options .= '<option>' . $file . '</option>';
}
?>
<div id="extra" style="text-align:center; margin-top: 20px;">
    <label for="">选择模板</label>
    <select name="" id="select-tpl">
        <option><未选择模板></option>
        <?php echo $options ?>
    </select>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="javascript:print();">打印</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="javascript:selectAsDefaultPrinter();">选择默认打印机</a>
</div>
<script type="text/javascript" src="JavaScript/jquery1.7.2.js"></script>
<script>
    var LODOP;
    $.getJSON("./variable.json", function (data) {
        $('.body .item textarea').val(function () {
            var index = $(this).attr('name');
            return data[index];
        });
    });

    $("#select-tpl").change(function() {
        window.location.href = 'print.php?has_tpl=' + $("#select-tpl option:selected").text();
    });

    function selectAsDefaultPrinter() {
        LODOP = getLodop();
        if (LODOP.CVERSION) {
            LODOP.On_Return = function (TaskID, Value) {
                if (Value >= 0) alert("选择成功!"); else alert("选择失败！");
            };
            LODOP.SELECT_PRINTER();
            return;
        }
        if (LODOP.SELECT_PRINTER() >= 0)
            alert("选择成功!"); else alert("选择失败！");
    }

    function print() {
        $("#extra").remove();
        $('#boxList .item').css('width', function () {
            return $(this).find('textarea').css('width');
        });
        $('#boxList .item').css('height', function () {
            return $(this).find('textarea').css('height');
        });
        $('#boxList .item').html(function () {
            return $(this).find('textarea').val();
        });
        LODOP.PRINT_INITA(0, 0, 800, 706, "打印控件功能演示_Lodop功能_超文本内容缩放打印");
        LODOP.ADD_PRINT_IMAGE(45, 275, 491, 538, document.documentElement.innerHTML);
        LODOP.SET_PRINT_STYLEA(0, "Stretch", 2);
        LODOP.SET_PRINT_STYLEA(0, "FontColor", "#FF0000");
        LODOP.SET_PRINT_STYLEA(0, "Horient", 2);
        LODOP.PRINT();
    }
</script>