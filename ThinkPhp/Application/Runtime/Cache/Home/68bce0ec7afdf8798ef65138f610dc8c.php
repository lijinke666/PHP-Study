<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no"/>
    <title><?php echo ($title); ?></title>
    <style>
        body{
            padding: 2px;
            font-size:16px;
            font-family: "Microsoft YaHei";
            box-sizing: border-box;
        }
        *{
            transition: all 2s;
        }
        .page-list{
            height:400px;
            font-size: 20px;
            margin-bottom: 15px;
            border: 1px solid;
            padding: 20px;

        }
        #loading{
            text-align: center;
            display: none;
            position: fixed;
            bottom: 20px;
            width: 200px;
            height: 30px;
            padding: 5px;
            line-height: 30px;
            background-color: rgba(0,0,0,.5);
            color:#FFF;
            border-radius: 35px;
            left:50%;
            margin-left: -100px;
        }
        #null{
            text-align: center;
            display: none;
        }
    </style>
</head>
<body>
<?php if(is_array($PageData)): foreach($PageData as $key=>$v): ?><div class="page-list">
    <p>id : <?php echo ($v["c_id"]); ?></p>
    <p>评论: <?php echo ($v["c_msg"]); ?></p>
    <p>日期 : <?php echo ($v["c_date"]); ?></p>
</div><?php endforeach; endif; ?>
<!--加载中-->
<p id="loading">加载中 • • •</p>
<p id="null">没有数据了</p>
</body>
<script src="/Public/study1/js/jquery.min.js"></script>
<script>
    $(function(){
        var page =0;
        var isAjax = true;         //是否加载中
        var loading = $("#loading");    //加载中提示
        var $win = $(window);
        $win.on("scroll",function(){
            var scrollTop = $(window).scrollTop(),       //滚动条高度
                windowHeight = $(window).height(),       //窗口高度
                documentHeight = $(document).height();   //文档高度

             if( (scrollTop + windowHeight) >= documentHeight -10 && isAjax ){
                 var sizes = $(".page-list").size();
                 $.ajax({
                     url:"<?php echo U('Page/loading');?>",
                     type:"get",
                     dataType:"json",
                     data:{page:page,sizes:sizes},
                     cache:false,
                     beforeSend:function(){
                         isAjax=false;
                         loading.fadeIn(200);
                     },
                     success:function(data){
                         if(data==null || data=='undefined' || data==""){
                             loading.fadeOut(200);
                             $("#null").show();
                             $win.off("scroll");
                             return;
                         }
                         loading.fadeOut(200);
                         for(var i=0; i<data.length; i++){
                             var $div = $("<div class='page-list'><p>id :"+data[i].c_id+"</p><p>id :"+data[i].c_msg+"</p><p>id :"+data[i].c_date+"</p></div>");
                         }
                         $("#null").before($div);
                         isAjax=true;
                     },
                     error:function(){
                         loading.html('加载失败').fadeIn(200);
                     }

                 });
                 page++;
            }
        });
    })
</script>
</html>