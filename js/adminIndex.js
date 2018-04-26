(function() {
	/*修复小尺寸响应式导航点击不能收回*/
	var $navbar = $("#navBar li");
	var $slideUp = $("#slideUp");
	var $bodyTab = $(".body-tab-ele");
	$navbar.on("click", function() {
        $(this).addClass("active").siblings().removeClass("active");
        /*循环取消所有arrow-top类 然后根据active类加上arrow-top类*/
        for(var i = 0; i < $navbar.length; i++) {
            if($navbar[i].className == "active") {
                $(this).siblings().find("div").removeClass("arrow-top");
                $(this).find("div").addClass("arrow-top");
            }
        }
        var index = $(this).index();
        for(var i = 0; i < $bodyTab.length; i++) {
            $bodyTab[i].style.display = "none";
        }
        $bodyTab.eq(index).show();
        if($slideUp.is(":visible")) {
            $slideUp.click();
        }
	})
	function setNav() {
		if(window.innerWidth > 768) {
			$("#navBar li a").attr("href", "javascript:;");
		} else {
			$("#navBar li a").eq(0).attr("href", "#borrowBook");
			$("#navBar li a").eq(1).attr("href", "#borrowList");
			$("#navBar li a").eq(2).attr("href", "#selfInfor");
		}
	}
	setNav();
	window.onresize = setNav;
})();


$(document).mousewheel(function(e, d) {
	if(d < 0) { //下
		$("#navBar li div").remove(".arrow-top");
	}else{
		$("#navBar li").append('<div></div>');
		$("#navBar li.active div").addClass('arrow-top');
	}
});