<header class="header_bg">
	<!--頂部圖案-->
	<div class="top">
		<table class="top_table">
			<tr class="top_tr">
				<td rowspan="2" class="top_td0"><!--桌末狂歡logo-->
					<a href="index.php">
						<img src="jomor_html/img/logo.png" alt="logo" title="logo" width="50px" height="80px">
					</a>
				</td>
				<td rowspan="2" class="top_td1">
					<a href="store1-2.php" class="top_a">
						<img src="jomor_html/img/animal-01.png" alt="logo" title="store" width="70px" height="50px">
					</a>
					<span><a href="store1-2.php"" class="pp">店家地圖</a></span>
				</td>
				<td rowspan="2" class="top_td2">
					<a href="system/group/jo.php" class="top_a">
						<img src="jomor_html/img/animal-02.png" alt="logo" title="store" width="70px" height="50px">
					</a>
					<span><a href="system/group/jo.php" class="pp">揪團</a></span>
				</td>
				<td rowspan="2" class="top_td3">
					<a href="#" class="top_a">
						<img src="jomor_html/img/animal-03.png" alt="logo" title="store" width="70px" height="50px">
					</a>
					<span><a href="#" class="pp">討論區</a></span>
				</td>
				<td rowspan="2" class="top_td1">
					<a href="blog.php" class="top_a">
						<img src="jomor_html/img/animal-04.png" alt="logo" title="store" width="70px" height="50px">
					</a>
					<span><a href="blog.php" class="pp">桌遊專欄</a></span>
				</td>
				<td rowspan="2" class="top_td1">
					<a href="aboutus.php" class="top_a">
						<img src="jomor_html/img/animal-05.png" alt="logo" title="store" width="70px" height="50px">
					</a>
					<span><a href="aboutus.php" class="pp">聯絡我們</a></span>
				</td>
				<!--
				<td rowspan="2" class="top_td1">&nbsp;</td>
				<td><a href="login.html" class="lognin">登入</a></td>
				<td><a href="register.html" class="lognin">註冊</a></td>-->
				<div style="position:relative;">
				<?php
					include('system/user/link.php');
					include('system/user/sessionCheck.php');
					if(isset($_SESSION['pri'])){
						?>
						<?php
						$pri = $_SESSION['pri'];
						if($pri==0){//會員註冊但尚未驗證
							?>
							<td rowspan="2" class="top_td1">&nbsp;</td>
							<td class="input0" width="50px" align="center" valign="center">
								<a href="system/user/userdata.php" class="lognin">會員</a>
							</td>
							<td class="input0" width="50px" align="left" valign="center">
								<a href="system/user/logout.php" class="lognin">登出</a>
							</td>
							<?php
						}
						else if($pri==1){//正式會員
							?>
							<td rowspan="2" class="top_td1">&nbsp;</td>
							<td class="input0" width="50px" align="center" valign="center">
								<a href="system/user/userdata.php" class="lognin">會員</a>
							</td>
							<td class="input0" width="50px" align="left" valign="center">
								<a href="system/user/logout.php" class="lognin">登出</a>
							</td>
							<?php
						}
						else{//管理員
							?>
							<td rowspan="2" class="top_td1">&nbsp;</td>
							<td class="input0" width="50px" align="center" valign="center">
								<a href="system/user/userdata.php" class="lognin">管理</a>
							</td>
							<td class="input0" width="50px" align="left" valign="center">
								<a href="system/user/logout.php" class="lognin">登出</a>
							</td>
							<?php
						}
					}
					else{
						?>
						<td rowspan="2" class="top_td1">&nbsp;</td>
						<td class="input0" width="100px" align="center" valign="center">
							<a href="system/user/login.php" class="lognin">登入</a>
						</td>
						<td class="input0" width="100px" align="left" valign="center">
							<a href="system/user/signup.php" class="lognin">註冊</a>
						</td>
						<?php
					}
				?>
			</tr><!--tr-->
			<tr>
				<td colspan="2" class="top_td4"><input class="index_search" type="text" name="search" size="15"></td>
				<td class="top_td5" valign="center">
					<input class="button" name="submit" type="image" value="search" src="jomor_html/img/button.png">
				</td>
			</tr>
		</table>
	</div>
</header>