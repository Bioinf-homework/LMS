
$(function() {


	$(".email-item").each(function(){

		$(this).hover(function(){
			$(this).addClass("email-item-selected");
		},
		function(){
			$(this).removeClass("email-item-selected");
		})
	})

    $(".menu-s").click(function(){
        swal({
                title: "输入想搜索的作者名字",
                type: 'input',
                inputType: "text",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "(*^.^*)",
                showLoaderOnConfirm: true,
            },
            function(name){
                $.get("search",{
                    "name": name
                    }
                    ,function(data){
                        if (data == '0') {
                            swal.showInputError("木有该作者相关信息");
                        }
                        else{
                            // 跳转.. 
                            window.location.href="search?type=show&name="+name; 
                            // swal("Nice!", "正在跳转" , "success");
                        }
                    }
                )

            });
    })

})
