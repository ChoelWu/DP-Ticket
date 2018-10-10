</div>
<div class="options">
    <div>
        <form action="" id="bg-form">
            <input type="file" name="ticket_bg" accept="image/png"/>
            <a id="upload-bg" href="javascript:;">确定上传票据背景</a>
        </form>
    </div>
    <br>
    <div>
        <label>票据模板宽度</label>
        <input type="text" id="ticket-width" class="ticket-set" data-attr="width"> px
    </div>
    <br>
    <div>
        <label>票据模板高度</label>
        <input type="text" id="ticket-height" class="ticket-set" data-attr="height"> px
    </div>
    <br>
    <hr style="border: 1px dashed #ccc">
    <div>
        <label>输入框设置：</label>
        <label>颜色</label>
        <input type="text" id="input-color" class="input-set" data-attr="color" value="blue">
        <label> ------ 字号</label>
        <input type="text" id="input-size" class="input-set" data-attr="font-size" value="14"> px
    </div>
    <br>
    <div>
        <label>数据绑定：</label>
        <label>数据源类型</label>
        <select id="data-source-type">
            <option>--请选择数据源类型--</option>
        </select>
        <label> ------ 数据源</label>
        <input type="text" id="data-source" data-attr="data" placeholder="请输入数据源信息">
    </div>
    <br>
    <div>
        <button id="add-input">添加输入框</button>
    </div>
    <br>
    <div>
        <button id="save-tpl">保存模板</button>
    </div>
</div>
</div>
</body>
<script>
    var data_type;
    $(function () {
        $.get('../data.json', function (data) {
            $.each(data, function (i, item) {
                $("#data-source-type").append("<option value='" + i + "'>" + item + "</option>");
            });
        });
    });
    $(document).ready(function () {
        var count = 0;
        $("#ticket-width").val($(".boxList").width());
        $("#ticket-height").val($(".boxList").height());
        $(function () {
            $(".boxList").delegate(".item", "mouseover", function () {
                $(".boxList .item").Tdrag({
                    scope: ".boxList",
                    handle: ".title"
                });
                $(".title").mouseover(function () {
                    $(this).css("");
                });
            });
        });
        $('#add-input').click(function () {
            var data_source = $("#data-source").val();
            if (data_source == '' || typeof(data_type) == 'undefined') {
                alert('请先绑定数据源！');
                return false;
            }
            $('.boxList').append('<div class="item" data-type="' + data_type + '" data-source="' + data_source + '" style="height: 20px; color:' + $("#input-color").val() + '; font-size: ' + $("#input-size").val() + 'px;"><img class="title" src="/DP-Ticket/image/move.png" alt="" width="10" ' +
                'height="10"><textarea cols="5" style="height: 20px; color:' + $("#input-color").val() + '; font-size: ' + $("#input-size").val() + 'px;" name="variable' + count + '">变量' + count + '</textarea></div>');
            count++;
        });
        $(".ticket-set").change(function () {
            $(".boxList").css($(this).data("attr"), $(this).val());
        });
        $("#upload-bg").click(function () {
            var form_data = new FormData($('#bg-form')[0]);
            $.ajax({
                type: "post",
                url: "../php/action.php?action=upload",
                cache: false,
                processData: false,
                contentType: false,
                async: false,
                data: form_data,
                success: function (data) {
                    $(".boxList").css("background", "url(/DP-Ticket/" + data + ") no-repeat center center");
                }
            });
        });
        $("#save-tpl").click(function () {
            alert("确定要生成模板？");
            var data_source_binding = [];
            $.each($(".boxList .item"), function (i, item) {
                var name = $(item).find("textarea").attr('name');
                var data_source_type = $(item).data('type');
                var data_source = $(item).data('source');
                var row = {"name": name, "data_source_type": data_source_type, "data_source": data_source};
                data_source_binding.push(row);
            });
            $.ajax({
                type: "POST",
                async: false,
                url: "../php/action.php?action=save",
                data: {tpl: $(".boxList").prop("outerHTML"), data_source: data_source_binding},
                success: function (data) {
                    alert("模板存储路径：/DP-Ticket/" + data);
                }
            });
        });
        $("#data-source-type").change(function () {
            data_type = $("#data-source-type option:selected").val();
        });
    });
</script>
</html>