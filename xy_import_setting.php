<?php 
if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); }
//参数替换
function getgs($gs){
	$data = str_ireplace('{百度ID}','(.*)',$gs);
	$data = str_ireplace('{百度BDUSS}','([0-9a-zA-Z\-\~]+)',$data);
	return $data; 
}
?>
<!-- NAVI -->
<ul class="nav nav-tabs" id="PageTab">
	<li class="active"><a href="#adminid" id="tab_1" data-toggle="tab" onClick="$('#newid2').css('display','none');$('#newid').css('display','none');$('#adminid').css('display','');">基本设置</a></li>
	<li><a href="#newid" id="tab_2" data-toggle="tab" onClick="$('#newid').css('display','');$('#adminid').css('display','none');$('#newid2').css('display','none');">批量导入</a></li>
</ul><br/>
<!-- END NAVI -->

<!-- PAGE1: ADMINID-->
<div class="tab-pane fade in active" id="adminid">
	<form id="import_set" action="index.php?mod=view:xy_import:ajax&set" method="post">
		<div class="input-group">
			<span class="input-group-addon">导入格式</span>
			<input type="text" name="gs" class="form-control" value="<?php echo option::get('xy_import_gs');?>" placeholder="参考格式：{百度ID}----BDUSS={百度BDUSS}" required/>
		</div><br/>
		<div class="input-group">
			<span class="input-group-addon">正则预览</span>
			<input type="text" id="zzyl" class="form-control" value="<?php echo getgs(option::get('xy_import_gs'));?>" placeholder="警告，当前没有设置格式，将无法导入" disabled/>
		</div><br/>
		<div class="input-group">
        	<label><input type="checkbox" name="check" value="1" <?php echo option::get('xy_import_check') == 1 ? 'checked' : ''; ?>> 导入时效验BDUSS有效性</label>
		</div><br/>
		<div class="input-group">
        	<label><input type="checkbox" name="refresh" value="1" <?php echo option::get('xy_import_refresh') == 1 ? 'checked' : ''; ?>> 导入后自动刷新贴吧列表</label>
		</div><br/>
        <button type="submit" class="btn btn-success">保存设置</button>
	</form><br/><br/><br/>
	<div class="panel panel-default">
		<div class="panel-heading" onClick="$('#jianjie').fadeToggle();"><h3 class="panel-title"><span class="glyphicon glyphicon-chevron-down"></span> 格式参数简介</h3></div>
		<div class="panel-body" id="jianjie">
        	<p>* 批量导入使用正则方式匹配，请务必确认设置格式和导入格式相同！/p>
            <p>* 请务必确认导入格式存在百度ID和BDUSS两个参数，缺一不可！</p>
			<p>1、<b>{百度ID}</b> 该参数匹配导入文本的百度用户名。</p>
			<p>2、<b>{百度BDUSS}</b> 该参数匹配导入文本的BDUSS。</p>
		</div>
	</div>
</div>
<!-- END PAGE1 -->

<!-- PAGE2: NEWID -->
<div class="tab-pane fade" id="newid" style="display:none">
	<form id="import_new" action="index.php?mod=view:xy_import:ajax&new" method="post">
		<div class="input-group" style="width:100%;">
        	<textarea name="import_str" style="height:300px;" class="form-control" placeholder="在此粘贴要导入的文本。" required></textarea>
		</div><br>
		<button type="submit" class="btn btn-success">批量导入</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onClick="{if(confirm('确定要删除所有绑定吗？\r\n一旦删除无法恢复！\r\n包括以前的手动绑定也会删除！')){window.location = 'index.php?mod=view:xy_import:ajax&delete';}return false;};" class="btn btn-danger">删除所有绑定</button>
	</form>
</div>
<!-- END PAGE3 -->
<link href="//cdn.bootcss.com/bootstrap3-dialog/1.34.9/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://libs.useso.com/js/jquery.form/3.50/jquery.form.min.js"></script>
<script type="text/javascript" src="//cdn.bootcss.com/bootstrap3-dialog/1.34.9/js/bootstrap-dialog.min.js"></script>
<script type="text/javascript" src="plugins/xy_import/js.js"></script>