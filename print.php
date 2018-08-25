<?php
include('./tpl/tpl-1535013263.html');
?>
<a href="javascript:myPREVIEW1();">打印预览</a>
<script>
var LODOP; //声明为全局变量
console.log(document.getElementById("boxList").innerHTML);
	function myPREVIEW1() {
		LODOP=getLodop();
		LODOP.PRINT_INITA(0,0,800,706,"打印控件功能演示_Lodop功能_超文本内容缩放打印");
		// LODOP.ADD_PRINT_IMAGE(45,275,491,538,document.documentElement.innerHTML);
        LODOP.ADD_PRINT_IMAGE(5,"10%","80%",140, document.getElementById("boxList").innerHTML);
        LODOP.SET_PRINT_STYLEA(0,"Stretch",2);
		LODOP.SET_PRINT_STYLEA(0,"FontColor","#FF0000");
        LODOP.SET_PRINT_STYLEA(0,"Horient",2);
		LODOP.PREVIEW();
	};
</script>