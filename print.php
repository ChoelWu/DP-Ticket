<?php
include('./tpl.html');
?>
<a href="javascript:myPREVIEW1();">打印预览</a>
<script>
var LODOP; //声明为全局变量
	function myPREVIEW1() {	
		LODOP=getLodop(); 
		LODOP.PRINT_INITA(0,0,800,706,"打印控件功能演示_Lodop功能_超文本内容缩放打印");
		LODOP.ADD_PRINT_IMAGE(45,275,491,538,document.documentElement.innerHTML);
		LODOP.SET_PRINT_STYLEA(0,"Stretch",2);
		LODOP.SET_PRINT_STYLEA(0,"FontColor","#FF0000");
		LODOP.PREVIEW();		
	};
</script>