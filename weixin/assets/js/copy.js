window.onload = function(){
	(function(){
		var list = document.getElementsByClassName('my_channel_list')[0]; 
		var my_list_li = list.getElementsByTagName('li');
		var add_list_li = document.getElementsByClassName('list_ul')[0].getElementsByTagName('li');
		var delete_btn = document.getElementById('delete_btn');
		var delete_btn_two = document.getElementById('delete_btn_two');

		var my_list_ul = document.getElementsByClassName('my_list_ul')[0]; 
		var list_ul = document.getElementsByClassName('list_ul')[0]; 

		var mychannel = ['热门','热门','成都','热门','热门','热门','热门','热门','热门','热门'];
		var addchannel = ['添加','添加','添加','添加','添加','添加','添加','添加','添加','添加','添加','添加','添加','添加','添加','添加'];
			// 显示箭头
			delete_btn.onclick = function(){
				for (var i = 0; i < my_list_li.length; i++) {
					var after = document.createElement("span");
					after.className="after";
					my_list_li[i].appendChild(after);
					// console.log(after);
					my_list_li[i].i = i;
					my_list_li[i].onclick = function(){
						var index = this.i;
						console.log(mychannel[index]);
						mychannel.splice(index, 1);
						console.log(mychannel);
						myRender();

					};
				};
				this.style.display = 'none';
				delete_btn_two.style.display = 'block';

			}
			// 隐藏箭头
			delete_btn_two.onclick = function(){
				for (var i = 0; i < my_list_li.length; i++) {
					var after = my_list_li[i].getElementsByTagName('span')[0];

					my_list_li[i].removeChild(after);
					// console.log(after);
				}
				this.style.display = 'none';
				delete_btn.style.display = 'block';
			}
			// 我的频道渲染
			function myRender(){
				var str = '';
				for (var i = 0; i < mychannel.length; i++) {
					
					str += '<li>'+mychannel[i]+'</li>'
					// console.log(str);
				}
				my_list_ul.innerHTML = str;

			};
			myRender();
			// 推荐频道渲染
			function addRender(){
				var str = '';
				for (var i = 0; i < addchannel.length; i++) {
					
					str += '<li><img src="../../assets/images/channelup.png">'+addchannel[i]+'</li>'
					// console.log(str);
				}
				list_ul.innerHTML = str;
			};
			addRender();




	})();

}