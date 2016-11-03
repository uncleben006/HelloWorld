<header class="header_bg">
			<!--頂部圖案-->
			<div class="top">
				<table class="top_table">
					<tr class="top_tr">
						<td rowspan="2" class="top_td0"><!--桌末狂歡logo-->
							<a href="../../index.php">
								<img src="../../jomor_html/img/jomorparty_logo.png" alt="logo" title="logo" width="65px" height="65px">
							</a>
						</td>
						<td rowspan="2" class="top_td1">
							<a href="../../system/store/store1-2.php" class="top_a">
								<img src="../../jomor_html/img/animal-01.png" alt="logo" title="store" width="70px" height="50px">
							</a>
							<span><a href="../../system/store/store1-2.php"" class="pp">店家地圖</a></span>
						</td>
						<td rowspan="2" class="top_td2">
							<a href="../group/jo.php" class="top_a">
								<img src="../../jomor_html/img/animal-02.png" alt="logo" title="store" width="70px" height="50px">
							</a>
							<span><a href="../group/jo.php" class="pp">揪團</a></span>
						</td>
						<td rowspan="2" class="top_td3">
							<a href="../../discussion.php" class="top_a">
								<img src="../../jomor_html/img/animal-03.png" alt="logo" title="store" width="70px" height="50px">
							</a>
							<span><a href="../../discussion.php" class="pp">討論區</a></span>
						</td>
						<td rowspan="2" class="top_td1">
							<a href="../../blog.php" class="top_a">
								<img src="../../jomor_html/img/animal-04.png" alt="logo" title="store" width="70px" height="50px">
							</a>
							<span><a href="../../blog.php" class="pp">桌遊專欄</a></span>
						</td>
						<td rowspan="2" class="top_td1">
							<a href="../../aboutus.php" class="top_a">
								<img src="../../jomor_html/img/animal-05.png" alt="logo" title="store" width="70px" height="50px">
							</a>
							<span><a href="../../aboutus.php" class="pp">聯絡我們</a></span>
						</td>
						<td rowspan="2" class="top_notify_td01"><!--通知欄-->
							<img src="../../jomor_html/img/notify.png" class="notify_img01" onClick="openNotify()">
							<!--通知欄跳出的div框-->
							<div id="notify" style="position:absolute; visibility: hidden ">							  	
						        <?php
									if(isset($_SESSION['account'])){
										$account = $_SESSION['account'];
										$selectRemindAccount = "SELECT * FROM `remind` WHERE `account` = '".$account."'";
										mysql_query("SET NAMES'UTF8'");
										mysql_query("SET CHARACTER SET UTF8");
										mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
										$selectRemindAccount = mysql_query($selectRemindAccount);
										$remindNum = mysql_num_rows($selectRemindAccount);
										if($remindNum>0){
											?>
											<div class="notify_fram">
												<?php
												//做提醒判定，
												// 0 ==鎖定房間
												// 1 ==被踢出房間
												// 2 ==房主刪除房間
												while($remindAccount = mysql_fetch_assoc($selectRemindAccount)){
													$selectUserHost = "SELECT * FROM `user` WHERE `account` = '".$remindAccount['host']."'";
													mysql_query("SET NAMES'UTF8'");
													mysql_query("SET CHARACTER SET UTF8");
													mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
													$selectUserHost = mysql_query($selectUserHost);
													$userHost = mysql_fetch_assoc($selectUserHost);
													$photo = $userHost['photo'];
													$name = $userHost['name'];
													$date = date("m/d",strtotime($remindAccount['date']));
													$time = date("H:i",strtotime($remindAccount['time']));
													if($remindAccount['decide']==0){														
														?>
															<div class="notify_div01">
													            <div class="notify_div_img">
													              	<img src="photo/<?php echo $photo; ?>" class="notify_headph">
													            </div>
													            <div class="notify_div_p">
													                <p>您於剛剛正式加入<font color="red"><?php echo $name; ?></font>所創建的房間<font color="red"><?php echo $remindAccount['room']; ?></font>，提醒您<font color="red"><?php echo $date; ?></font> <font color="red"><?php echo $time; ?></font>在天鵝咖啡館別遲到囉～</p>
													            </div>
															</div>
													  	<?php   
													}
													if($remindAccount['decide']==1){
														?>
															<div class="notify_div01">
													            <div class="notify_div_img">
													              	<img src="../../jomor_html/img/attention.png" class="notify_attention">
													            </div>
													            <div class="notify_div_p">
													                <p>您於剛剛被<font color="red"><?php echo $name; ?></font>踢出了房間，房名為<font color="red"><?php echo $remindAccount['room']; ?></font></p>
													            </div>
															</div>
													  	<?php  
													}
													if($remindAccount['decide']==2){
														?>
															<div class="notify_div01">
													            <div class="notify_div_img">
													              	<img src="../../jomor_html/img/attention.png" class="notify_attention">
													            </div>
													            <div class="notify_div_p">
													                <p><font color="red"><?php echo $name; ?></font>因為個人因素刪除了房間，房名為<font color="red"><?php echo $remindAccount['room']; ?></font></p>
													            </div>
															</div>
													  	<?php  
													}
												}
												?>
											</div>  
											<?php
										}										
									}
								?>								  	 
							</div>
						</td>
						<?php
							if(isset($_SESSION['pri'])){
								?>
								<?php
								$pri = $_SESSION['pri'];
								$account = $_SESSION['account'];
								$selectUserAccount = "SELECT * FROM `user` WHERE `account` = '".$account."'";
								mysql_query("SET NAMES'UTF8'");
								mysql_query("SET CHARACTER SET UTF8");
								mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
								$selectUserAccount = mysql_query($selectUserAccount);
								$userAccount = mysql_fetch_assoc($selectUserAccount);
								$photo = $userAccount['photo'];
								if($pri==0){//會員註冊但尚未驗證
									?>
									<td rowspan="2" class="top_notify_td02"><!--圓形頭貼照-->
										<div class="nav_userImg" >
											<img src="../user/photo/<?php echo $photo ?>" class="notify_img02" onClick="openNav()">
											<div class="nav_select" onClick="openNav()"></div>
										</div>

										<!--頭貼點他跳出的div選單-->
										
									   	<div id="nav" style="position:absolute;width:200px; height:400px;visibility:hidden">
								  			<div class="nav_div">
										        <div class="nav_bt_div">
										            <a href="userdata.php" class="nav_bt">我的檔案</a>
										        </div>
										        <div class="nav_bt_div">
										            <a href="logout.php" class="nav_bt2">登出</a>
										        </div>
								  			</div>   
										</div> 
									</td>
									<td><a href="userdata.php" class="lognin">會員</a></td>
									<td><a href="logout.php" class="lognin">登出</a></td>
									<?php
								}
								else if($pri==1){//正式會員
									?>
									<td rowspan="2" class="top_notify_td02"><!--圓形頭貼照-->
										<div class="nav_userImg" >
											<img src="../user/photo/<?php echo $photo ?>" class="notify_img02" onClick="openNav()">
											<div class="nav_select" onClick="openNav()"></div>
										</div>

										<!--頭貼點他跳出的div選單-->
										
									   	<div id="nav" style="position:absolute;width:200px; height:400px;visibility:hidden">
								  			<div class="nav_div">
										        <div class="nav_bt_div">
										            <a href="individual_self.php" class="nav_bt">我的檔案</a>
										        </div>
										        <div class="nav_bt_div">
										            <a href="system/user/logout.php" class="nav_bt2">登出</a>
										        </div>
								  			</div>   
										</div> 
									</td>
									<td><a href="userdata.php" class="lognin">會員</a></td>
									<td><a href="logout.php" class="lognin">登出</a></td>
									<?php
								}
								else{//管理員
									?>
									<td rowspan="2" class="top_notify_td02"><!--圓形頭貼照-->
										<div class="nav_userImg" >
											<img src="../user/photo/<?php echo $photo ?>" class="notify_img02" onClick="openNav()">
											<div class="nav_select" onClick="openNav()"></div>
										</div>

										<!--頭貼點他跳出的div選單-->
										
									   	<div id="nav" style="position:absolute;width:200px; height:400px;visibility:hidden">
								  			<div class="nav_div">
										        <div class="nav_bt_div">
										            <a href="individual_self.php" class="nav_bt">我的檔案</a>
										        </div>
										        <div class="nav_bt_div">
										            <a href="system/user/logout.php" class="nav_bt2">登出</a>
										        </div>
								  			</div>   
										</div> 
									</td>
									<td><a href="userdata.php" class="lognin">管理</a></td>
									<td><a href="logout.php" class="lognin">登出</a></td>
									<?php
								}
							}
							else{
								?>
								<td rowspan="2" class="top_notify_td02"><!--圓形頭貼照-->
									<img src="photo/default.png" class="notify_img02">
								</td>
								<td><a href="login.php" class="lognin">登入</a></td>
								<td><a href="signup.php" class="lognin">註冊</a></td>
								<?php
							}
						?>
					</tr><!--tr-->
					<tr>
						<td colspan="2" class="top_td4"><input class="index_search" type="text" name="search" size="15"></td>
						<td class="top_td5" valign="center">
							<input class="button" name="submit" type="image" value="search" src="../../jomor_html/img/button.png">
						</td>
					</tr>
				</table>
			</div>
		</header>