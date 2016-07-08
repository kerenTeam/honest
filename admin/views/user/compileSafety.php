<div class="admin-content">
	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">安监局</strong> / <small>编辑</small></div>
    </div>
    <hr>
	<form class="am-form am-padding-top am-padding-bottom" method="post" action="<?=site_url('user/editcompile');?>" enctype="multipart/form-data">
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				姓名
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" value="asdf" name="userName" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				性别
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<label><input type="radio" name="gender" value="男" >男</label>
				&nbsp;&nbsp;&nbsp;
				<label><input type="radio" name="gender" value="女 " >女</label>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				头像
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="file" id="imgUpload" name="picImg" onchange="previewImage(this)" class="upload-add" required>
	            <br>
	            <div id="preview"><input type="hidden" name="picImg" value="assets/img/Home_01_02.png"> <img class="minImg" src="assets/img/Home_01_02.png"> </div>
			</div>
		</div>
		
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				所在地
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" value="成都" name="address" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				职业
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" value="局长" name="occupation" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				简介
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<textarea name="">csd</textarea>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-offset-2 am-u-sm-4 am-u-end">
					<input type="hidden" name="id" value="" /> 
				<button type="submit" class="am-btn am-btn-primary">确定</button>
			</div>
		</div>
	</form>








</div>
  <script type="text/javascript" src="assets/js/imgup.js"></script>