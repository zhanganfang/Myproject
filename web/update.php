<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Layui</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="./layui/css/layui.css"  media="all">
  <style>
        *{
            margin: 0;
            padding: 0;
        }
        .left{
            width: 200px;
            height: 100%;
            /*background: red;*/
            position: absolute;
        }
        .right{
            height: 100%;
            margin-left: 200px;
            /*background: blue;*/
            overflow: auto;
        }
    </style>
</head>
<body>
<div class="layui-side layui-bg-black left" style="height:100%">
  <div class="layui-side-scroll">
    <div title="菜单缩放" class="kit-side-fold"><i class="fa fa-navicon" aria-hidden="true"></i></div>
    <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
    <ul class="layui-nav layui-nav-tree" lay-filter="test">
      <li class="layui-nav-item layui-nav-itemed">
        <a class="" href="javascript:;" rel="external nofollow" ><i class="fa fa-user-circle-o fa-lg"></i> <span >back-stage management</span></a>
        <dl class="layui-nav-child">
          <dd><a href="http://127.0.0.1/xm_new/web/index.html" rel="external nofollow"  ><i class="fa fa-list fa-lg "></i> <span >Goods List</span></a></dd>
        </dl>
        <dl class="layui-nav-child">
          <dd><a href="http://127.0.0.1/xm_new/web/turnover.html" rel="external nofollow"  ><i class="fa fa-list fa-lg"></i> <span >Expense</span></a></dd>
        </dl>
      </li>
    </ul>
  </div>
</div>



<div class="right">
  <div align="center">
<br>
  <h2>Modified page</h2>
  <br>

  <form class="layui-form" action="javascript:;">
  <div class="layui-form-item">
    <label class="layui-form-label">name</label>
    <div class="layui-input-block">
      <input type="text" name="name" required  lay-verify="required" placeholder="Please enter the name of the item" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">type</label>
    <div class="layui-input-block">
      <select name="type" lay-verify="required">
        <option value="">Please select the item type</option>
        <option value="marine products">marine products</option>
        <option value="meat">meat</option>
        <option value="vegetables">vegetables</option>
      </select>
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">unit_price</label>
    <div class="layui-input-block">
      <input type="text" name="unit_price" required  lay-verify="required" placeholder="Please enter the unit price" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">inventory</label>
    <div class="layui-input-block">
      <input type="text" name="inventory" required  lay-verify="required" placeholder="Please enter the inventory of goods" autocomplete="off" class="layui-input">
    </div>
  </div>
  <input type="hidden" name="id" value=<?php echo "$_GET[id]"; ?>>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">Immediately change</button>
      <button type="reset" class="layui-btn layui-btn-primary">reset</button>
    </div>
  </div>
</form>
</div>
  
</div>
<script src="./layui/layui.js" charset="utf-8"></script>
<script>
  layui.use('table', function(){
    var table = layui.table;
    var $ = layui.$;
    var layer = layui.layer;
    var isShow = true; 
    var form = layui.form;
  
    //Listening to submit
    form.on('submit(formDemo)', function(data){
      $.ajax({
          type: "post",
          url: "http://127.0.0.1/xm_new/php/Update.php",
          data: data.field,
          success: function (res) {
              window.location.href="./inventory.html";
          }
        });
    });
    
    $('#layerDemo .layui-btn').on('click', function(){
      var othis = $(this), method = othis.data('method');
      active[method] ? active[method].call(this, othis) : '';
    });
  });
</script>

</body>
</html>