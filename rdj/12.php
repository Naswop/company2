<script src="./layui/jquery-1.7.2.min.js"></script>
<script>
        $(function () {
            $.post("/Tasktable/mydll", function () { });
        });
        var $income_box = $('#income_box'),//表格盒区域
                    $income_table = $('#income_table');//统计表格
        var _height = $income_box.height(),//翻页高度

            trLen = $income_table.find('tr').length,//总记录条数
            perPage = 5,//每页显示行数
            _left = 26.355;//页码移动距离
        var countPage = Math.ceil(trLen / perPage);//总页数
        var page = 1;//起始页
        var $startPages = $('#startPages');
        //分页区
        var $pages_box = $('#pages_box');
        var $select_pages = $('#select_pages');
        var $inner_pages = $pages_box.find('.J_pages');
        $startPages.find('li').eq(0).text('共' + trLen + '条');//条数
        $startPages.find('li').eq(1).text(page + '/' + countPage + '页');//页数
        var aPages = ['<li class="current">1</li>'];
        var optionPages = ['<option value="1" selected="selected">第1页</option>'];
        for (var i = 2; i <= countPage; i++) {
            aPages.push('<li>' + i + '</li>');
            optionPages.push('<option value="' + i + '">第' + i + '页</option>');
        }
        $inner_pages.append(aPages.join(''));
        $select_pages.append(optionPages.join(''));

        if (countPage <= 5) {//总页数小于5页
            $pages_box.find('.pages').width(29 * countPage);
        } else {
            $pages_box.find('.pages').width(140);
        }
        //点击某一页
        $inner_pages.find('li').off().on('click', function (e) {
            if (!$income_table.is(":animated")) {
                $(this).addClass('current').siblings().removeClass('current');
                var index = $(this).index();
                page = index + 1;
                //表格移动
                $income_table.stop().animate({ 'top': -1 * (_height * index) + "px" }, 500);
                $select_pages.val(index + 1);
                $startPages.find('li').eq(1).text(page + '/' + countPage + '页');//页数
                if (countPage > 5) {
                    if (page > 3 && page < countPage - 1) {
                        $inner_pages.stop().animate({ 'left': -1 * (_left * (page - 3)) + "px" }, 500);
                    }
                    if (page == 1 || page == 2 || page == 3) {
                        $inner_pages.stop().animate({ 'left': 0 + "px" }, 500);
                    }
                    if (page == countPage || page == countPage - 1 || page == countPage - 2) {
                        $inner_pages.stop().animate({ 'left': -1 * (_left * (countPage - 5)) + "px" }, 500);
                    }
                }
            }
        });

        //点击下拉页中的某一页
        $select_pages.on('change', function (e) {
            if (!$income_table.is(":animated")) {
                var index = parseInt($(this).val());
                page = index;
                $inner_pages.find('li').eq(index - 1).addClass('current').siblings().removeClass('current');
                //表格移动
                $income_table.stop().animate({ 'top': -1 * (_height * (index - 1)) + "px" }, 500);
                $startPages.find('li').eq(1).text(page + '/' + countPage + '页');//页数
                if (countPage > 5) {
                    if (page > 3 && page < countPage - 1) {
                        $inner_pages.stop().animate({ 'left': -1 * (_left * (page - 3)) + "px" }, 500);
                    }
                    if (page == 1 || page == 2 || page == 3) {
                        $inner_pages.stop().animate({ 'left': 0 + "px" }, 500);
                    }
                    if (page == countPage || page == countPage - 1 || page == countPage - 2) {
                        $inner_pages.stop().animate({ 'left': -1 * (_left * (countPage - 5)) + "px" }, 500);
                    }
                }

            }

        });

        //上一页
        $pages_box.find('.prev').off().on('click', function (e) {
            if (!$income_table.is(":animated")) {
                if (page == 1) {
                    $income_table.stop();
                    $inner_pages.stop();
                } else {
                    $income_table.animate({ 'top': "+=" + _height + "px" }, 500);
                    if (countPage > 5) {
                        if (page > 3 && page < countPage - 1) {
                            $inner_pages.animate({ 'left': "+=" + _left + "px" }, 500);
                        }
                        if (page == 1 || page == 2 || page == 3) {
                            $inner_pages.stop().animate({ 'left': 0 + "px" }, 500);
                        }
                        if (page == countPage || page == countPage - 1) {
                            $inner_pages.stop().animate({ 'left': -1 * (_left * (countPage - 5)) + "px" }, 500);
                        }
                    }
                    page--;
                    $inner_pages.find('li').eq(page - 1).addClass('current').siblings().removeClass('current');
                    $select_pages.val(page);
                    $startPages.find('li').eq(1).text(page + '/' + countPage + '页');//页数
                }
            }
        });
        //下一页
        $pages_box.find('.next').off().on('click', function (e) {
            if (!$income_table.is(":animated")) {
                if (page == countPage) {
                    $income_table.stop();
                    $inner_pages.stop();
                } else {
                    $income_table.animate({ 'top': "-=" + _height + "px" }, 500);
                    if (countPage > 5) {
                        if (page >= 3 && page < countPage - 1) {
                            $inner_pages.animate({ 'left': "-=" + _left + "px" }, 500);
                        }
                        if (page == 1 || page == 2) {
                            $inner_pages.stop().animate({ 'left': 0 + "px" }, 500);
                        }
                        if (page == countPage || page == countPage - 1 || page == countPage - 2) {
                            $inner_pages.stop().animate({ 'left': -1 * (_left * (countPage - 5)) + "px" }, 500);
                        }
                    }
                    page++;
                    $inner_pages.find('li').eq(page - 1).addClass('current').siblings().removeClass('current');
                    $select_pages.val(page);
                    $startPages.find('li').eq(1).text(page + '/' + countPage + '页');//页数
                }
            }

        });

    </script>
<style type="text/css">
        .income_box {
            max-height: 158px;
            min-height: 133px;
            height: 144.477999px;
            overflow: hidden;
            position: relative;
            margin: 0 auto;
            width: 795px;
        }

        .colgroup1, .colgroup2 {
            width: 15%;
        }

        .colgroup3, .colgroup4, .colgroup5, .colgroup6 {
            width: 14%;
        }

        .income_table {
            position: absolute;
            top: 0;
            left: 0;
        }

        .pptv_pages .pages {
            display: inline-block;
            top: 20px;
            padding: 4px 0;
            height: 38px;
            overflow: hidden;
            position: relative;
        }

        .pptv_pages .inner_pages {
            display: inline-block;
            position: absolute;
            top: 12px;
            height: 38px;
        }
        .buttons {
            padding:0px;
            bottom: 20px;
            right: 10px;
        }
        .buttons li {
            width: 21px;
            line-height: 24px;
            font-size: 12px;
            text-align: center;
            float: left;
            color: #337ab7;
            background-color: #fff;
            margin-left: 5px;
            cursor: pointer;
            list-style:none;
            display:block;
            border: 1px solid #ddd;
        }

        .buttons li.current {
           color:#fff;
           background-color: #337ab7;
           border-color: #337ab7;
        }
        .leftList {
            width:260px;
            position:relative;
            padding:0px;
            top: 32px;
            left: 1px;
        }
        #startPages li {
            width:53px;
            height:26px;
            line-height:25px;
            text-align: center;
            float: left;
            list-style:none;
            display:block;
            margin-left:4px;
            font-size:12px;
            cursor: pointer;
            font-family: 微软雅黑, Verdana, sans-serif, 宋体, serif;
        }
         #startPages li:nth-child(1),#startPages li:nth-child(2) {
            color:#333;
            background-color: #fff; 
            border: 1px solid #ddd;
        }
         #startPages li:nth-child(3) {
            color: #fff;
            background: #337ab7;
        }
        .rightList {
            width: 260px;
            position: relative;
            padding: 0px;
            bottom: 22px;
            left: 300px;
        }
        #endPages li {
            width:53px;
            height:26px;
            line-height:25px;
            text-align: center;
            float: left;
            cursor: pointer;
            list-style:none;
            display:block;
            margin-left:4px;
            font-size:12px;
            font-family: 微软雅黑, Verdana, sans-serif, 宋体, serif;
        }
        #endPages li:nth-child(1) {
            color: #fff;
            background-color: #337ab7;
        }
        #endPages li:nth-child(2) {
           color:#333;
           border:none!important;
        }
        #endPages li:nth-child(2) select option {
           border: 1px solid #ddd;
        }
    </style>
<div style="height:29px;position: relative;margin:0 auto;width:795px;">
            <table class="ad_list ad_link bsgrid">
                <colgroup class="colgroup1"></colgroup>
                <colgroup class="colgroup2"></colgroup>
                <colgroup class="colgroup3"></colgroup>
                <colgroup class="colgroup4"></colgroup>
                <colgroup class="colgroup5"></colgroup>
                <colgroup class="colgroup6"></colgroup>
                <tr><th>分会账号</th><th>名称</th><th>充值总额</th><th>充值次数</th><th>注册人数</th><th>注册IP数</th><th>日期</th></tr>
            </table>
        </div>
        <div class="income_box" id="income_box">
            <table class="ad_list ad_link income_table bsgrid" id="income_table">
                <colgroup class="colgroup1"></colgroup>
                <colgroup class="colgroup2"></colgroup>
                <colgroup class="colgroup3"></colgroup>
                <colgroup class="colgroup4"></colgroup>
                <colgroup class="colgroup5"></colgroup>
                <colgroup class="colgroup6"></colgroup>
                <tr><td>abcxd1</td><td>是对方即</td><td>1000</td><td>50</td><td>60</td><td>60</td><td>2016.08.05</td></tr>
                <tr><td>abcxd2</td><td>是对方即</td><td>1000</td><td>50</td><td>60</td><td>60</td><td>2016.08.05</td></tr>
                <tr><td>abcxd3</td><td>是对方即</td><td>1000</td><td>50</td><td>60</td><td>60</td><td>2016.08.05</td></tr>
                <tr><td>abcxd4</td><td>是对方即</td><td>1000</td><td>50</td><td>60</td><td>60</td><td>2016.08.05</td></tr>
                <tr><td>abcxd1</td><td>是对方即</td><td>1000</td><td>50</td><td>60</td><td>60</td><td>2016.08.05</td></tr>
                <tr><td>abcxd2</td><td>是对方即</td><td>1000</td><td>50</td><td>60</td><td>60</td><td>2016.08.05</td></tr>
                <tr><td>abcxd3</td><td>是对方即</td><td>1000</td><td>50</td><td>60</td><td>60</td><td>2016.08.05</td></tr>              
                <tr><td>abcxd4</td><td>是对方即</td><td>1000</td><td>50</td><td>60</td><td>60</td><td>2016.08.05</td></tr>
                <tr><td>abcxd2</td><td>是对方即</td><td>1000</td><td>50</td><td>60</td><td>60</td><td>2016.08.05</td></tr>
                <tr><td>abcxd3</td><td>是对方即</td><td>1000</td><td>50</td><td>60</td><td>60</td><td>2016.08.05</td></tr>              
                <tr><td>abcxd4</td><td>是对方即</td><td>1000</td><td>50</td><td>60</td><td>60</td><td>2016.08.05</td></tr>
            </table>
        </div>
        <div class="pptv_pages" id="pages_box" style="width:886px;margin:0 auto">
            <div class="pptv_pages">
                <span></span>
                <span></span>
                <div class="leftList">
                    <ul id="startPages">
                        <li></li>
                        <li></li>
                        <li class="prev">上一页</li>
                    </ul>
                </div>
                <div class="pages">
                    <ul class="inner_pages J_pages buttons"></ul>
                </div>
                <div class="rightList">
                    <ul id="endPages">
                        <li class="next">下一页</li>
                        <li><select style="height: 24px;" id="select_pages"></select></li>
                    </ul>
                </div>
            </div>
        </div>
