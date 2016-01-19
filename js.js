  $(document).ready(function() {
	$('#import_set').submit(function() {
	  $(this).ajaxSubmit({
		dataType:'json',
		success:ShowSetResponse,
		error:showError
	  });
	  var dialog = new BootstrapDialog({
		closable: false,
		title: '提示',
		message: '正在保存设置，请稍候。。。'
	  });
	  dialog.realize();
	  dialog.open();
	  return false;
	});

	$('#import_new').submit(function() {
	  $(this).ajaxSubmit({
		dataType:'json',
		success:showNewResponse,
		error:showError
	  });
	  var dialog = new BootstrapDialog({
		closable: false,
		title: '提示',
		message: '正在提交导入数据，请稍候...<br/><br/>正在检测BDUSS是否有效，提交时间可能较长请耐心等待...'
	  });
	  dialog.realize();
	  dialog.open();
	  return false;
	});
  });

  function ShowSetResponse(data) {
	if (data.type == "success") {
	  $("#zzyl").val(data.regular);
	  var dialog = new BootstrapDialog({
		title: '提示',
		message: '设置已成功保存！',
		closable: false,
		type: 'type-success',
		buttons: [{
		  label: '关闭',
		  cssClass: 'btn-success',
		  action: function (dialogRef) {
			$.each(BootstrapDialog.dialogs, function(id, dialog){dialog.close();});
		  }
		}]
	  });
	  dialog.realize();
	  dialog.open();
	} else {
	  var dialog = new BootstrapDialog({
		title: '错误',
		message: data.emsg,
		type: 'type-danger',
		closable: false,
		buttons: [{
		  label: '关闭',
		  cssClass: 'btn-danger',
		  action: function (dialogRef) {
			$.each(BootstrapDialog.dialogs, function(id, dialog){dialog.close();});
		  }
		}]
	  });
	  dialog.realize();
	  dialog.open();
	}
  }

  function showNewResponse(data) {
	if(data.status == 'success') {
	  window.location.href = "http://"+window.location.host+"/setting.php?mod=showtb&ref";
	  var dialog = new BootstrapDialog({
		title: '提示',
		message: data.info+"<br/><br/>正在刷新贴吧列表，请稍后...<br/>",
		closable: false,
		type: 'type-primary'
	  });
	  dialog.realize();
	  dialog.open();
	} else {
	  var dialog = new BootstrapDialog({
		title: '提示',
		message: data.info,
		closable: false,
		type: 'type-primary',
		buttons: [{
		  label: '关闭',
		  cssClass: 'btn-primary',
		  action: function (dialogRef) {
			$.each(BootstrapDialog.dialogs, function(id, dialog){dialog.close();});
		  }
		}]
	  });
	  dialog.realize();
	  dialog.open();
	}
  }

function showError() {
  var dialog = new BootstrapDialog({
	title: '错误',
	message: '提交数据错误！<br/>提交超时或提交页面无响应！',
	type: 'type-danger',
	closable: false,
	buttons: [{
	  label: '关闭',
	  cssClass: 'btn-danger',
	  action: function (dialogRef) {
		$.each(BootstrapDialog.dialogs, function(id, dialog){dialog.close();});
	  }
	}]
  });
  dialog.realize();
  dialog.open();
}