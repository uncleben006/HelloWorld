<header class="header_bg">
	<!--頂部圖案-->
	<div class="top">
		<table border="0">
		<tr>
		 	<td rowspan="2" class="table-bg" width="175px" align="center" valign="center">
					<a href="index.php">
						<img src="jomor_html/img/00.png" alt="logo" title="logo" width="90x" height="85x">
					</a>	
			</td>
			<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
					<a href="system/group/group.php">
						<img src="jomor_html/img/01.png" alt="吉祥物圖一" title="揪團" width="120px" height="85px">
					</a>
			</td>
			<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
					<a href="store1-2.php">
						<img src="jomor_html/img/02.png" alt="吉祥物圖二" title="店家地圖" width="114px" height="85px">
					</a>
			</td>
			<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
					<a href="#">
						<img src="jomor_html/img/03.png" alt="吉祥物圖三" title="討論區" width="114px" height="87px">
					</a>
			</td>
			<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
					<a href="blog.php">
						<img src="jomor_html/img/04.png" alt="吉祥物圖四" title="桌遊專欄" width="124px" height="86px">
					</a>
			</td>
			<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
					<a href="aboutus.php">
						<img src="jomor_html/img/05.png" alt="吉祥物圖五" title="聯絡我們" width="114px" height="85px">
					</a>
			</td>
			<?php
				include('system/user/link.php');
				include('system/user/sessionCheck.php');
				if(isset($_SESSION['pri'])){
					?>
					<?php
					$pri = $_SESSION['pri'];
					if($pri==0){//會員註冊但尚未驗證
						?>
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
					<td class="input0" width="100px" align="center" valign="center">
						<a href="system/user/login.html" class="lognin">登入</a>
					</td>
					<td class="input0" width="100px" align="left" valign="center">
						<a href="system/user/signup.php" class="lognin">註冊</a>
					</td>
					<?php
				}
			?>
		</tr>
		<!--搜尋列-->
		<tr>
			<td class="table-bg1" align="center" valign="center">
				<input class="index_search" type="text" name="search" size="15">
			</td>
			<td class="table-bg1" valign="center">
					<input class="button" name="submit" type="image" value="search" src="jomor_html/img/button.png">
			</td>
		</tr>
		</table>
	</div>
	<!--導覽列-->
	<nav class="navdiv">
		<div>
		    <ul>
		        <li class="nav0"><a href="system/group/group.php">揪 團</a></li>
		        <li class="nav1"><a href="store1-2.php">店家地圖</a></li>
		        <li class="nav1"><a href="#">討 論 區</a></li>
		        <li class="nav2"><a href="blog.php">桌遊專欄</a></li>
		        <li class="nav2"><a href="aboutus.php">聯絡我們</a></li>
		    </ul>
		  </div>
	</nav>
</header>