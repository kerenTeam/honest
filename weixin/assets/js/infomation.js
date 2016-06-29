window.onload = function(){
	(function(){
		var list = document.getElementsByClassName('my_channel_list')[0]; 
		var my_list_li = list.getElementsByTagName('li');
		var add_list_li = document.getElementsByClassName('list_ul')[0].getElementsByTagName('li');
		var delete_btn = document.getElementById('delete_btn');
		var delete_btn_two = document.getElementById('delete_btn_two');

		var my_list_ul = document.getElementsByClassName('my_list_ul')[0]; 
		var list_ul = document.getElementsByClassName('list_ul')[0]; 

		var mychannel = ['成都','热门','巴中','大连','你好','今天','我的','你的','特色','哈哈'];
		var addchannel = ['添加','添加','添加','添加','添加','添加','添加','添加','添加','添加','添加','添加','添加','添加','添加','添加'];
			// 显示箭头
			delete_btn.onclick = function(){

				for (var i = 0; i < my_list_li.length; i++) {
					var after = my_list_li[i].getElementsByClassName('after')[0];
					// console.log(after);
					after.style.display = 'block';
					
					
					my_list_li[i].i = i;
					my_list_li[i].onclick = function(){
						var index = this.i;
						
						// mychannel.splice(index, 1);
						console.log(index);
						console.log(mychannel[index]);


						addchannel.push(mychannel[index]);
						// console.log(mychannel[index]);
						
						
						addRender();
						// console.log(addchannel);
						console.log(mychannel);
						this.style.display = 'none';

					};
					for (var j = 0; j < add_list_li.length; j++) {
						add_list_li[j].j = j;
						add_list_li[j].onclick = function(){
							var index = this.j;
							
							// mychannel.splice(index, 1);
							console.log(index);
							console.log(addchannel[index]);
							mychannel.push(addchannel[index]);
							this.style.display = 'none';
							console.log(mychannel);
							myRendertwo();
							

						};
					}



				};
				this.style.display = 'none';
				delete_btn_two.style.display = 'block';

			}

			// 隐藏箭头
			delete_btn_two.onclick = function(){
				for (var i = 0; i < my_list_li.length; i++) {
					var after = my_list_li[i].getElementsByClassName('after')[0];
					// console.log(after);
					after.style.display = 'none';
					my_list_li[i].onclick = null;
				}
				this.style.display = 'none';
				delete_btn.style.display = 'block';
			}
			// 我的频道渲染
			function myRender(){
				var str = '';
				for (var i = 0; i < mychannel.length; i++) {
					
					str += '<li>'+mychannel[i]+'<span class="after"></span></li>'
					// console.log(str);
				}
				my_list_ul.innerHTML = str;

			};
			myRender();
			function myRendertwo(){
				var str = '';
				for (var i = 0; i < mychannel.length; i++) {
					
					str += '<li>'+mychannel[i]+'<span class="after" style="display: block;"></span></li>'
					// console.log(str);
				}
				my_list_ul.innerHTML = str;

			};
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