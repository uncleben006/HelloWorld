<!--行動裝置rwd的視窗變小nav變小圖示可展開-->
<!--rwdjomo-->
<nav class="rwd_nav">
	<a><img src="../../jomor_html/img/rwdlogo.png" class="rwdlogo"></a>
	<!--rwd右邊的通知欄與頭像-->
	<div class="rwd_nav_hd" >
		<div class="rwd_nav_table">
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
						<img src="../../jomor_html/img/notify2.png" class="rwd_notify_img01" onClick="openNotify_rwd()">
						<!--通知欄跳出的div框-->
						<div id="notify_rwd" style="position:absolute; visibility:hidden">
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
									              	<img src="../user/photo/<?php echo $photo; ?>" class="notify_headph">
									            </div>
									            <div class="notify_div_p">
									                <p>您於剛剛正式加入<font color="red"><?php echo $name; ?></font>所創建的房間<font color="red"><?php echo $remindAccount['room']; ?></font>，提醒您<font color="red"><?php echo $date; ?></font> <font color="red"><?php echo $time; ?></font>，在<font color="red"><?php echo $remindAccount['store'] ?></font>，別遲到囉~</p>
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
						</div> 
						<?php
					}	
					else{
						?>
						<img src="../../jomor_html/img/notify1.png" class="rwd_notify_img01">
						<?php
					}									
				}
			?>								
		</div>
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
					<!--圓形頭貼照-->
						<div class="rwd_nav_userImg" >
							<img src="../../system/user/photo//<?php echo $photo ?>" class="rwd_notify_img02" onClick="openNav()">
							<!--頭像旁三角形選單<div class="nav_select" onClick="openNav()"></div>-->
						</div>

						<!--頭貼點他跳出的div選單
						
					   	<div id="nav" style="position:absolute;width:200px; height:400px;visibility:hidden">
				  			<div class="nav_div">
						        <div class="nav_bt_div">
						            <a href="../user/userdata.php" class="nav_bt">我的檔案</a>
						        </div>
						        <div class="nav_bt_div">
						            <a href="../user/logout.php" class="nav_bt2">登出</a>
						        </div>
				  			</div>   
						</div> 
						頭貼點他跳出的div選單-->
					<div class="rwd_nav_ppp">
						<a href="../../system/user/userdata.php" class="rwd_lognin">會員</a>
					</div>
					<div class="rwd_nav_ppp2">
						<a href="../../system/user/logout.php" class="rwd_lognin">登出</a>
					</div>
					<?php
				}
				else if($pri==1){//正式會員
					?>
					<!--圓形頭貼照-->
						<div class="rwd_nav_userImg" >
							<img src="../user/photo/<?php echo $photo ?>" class="img_notify_img02" onClick="openNav()">
							<!--頭像旁三角形選單<div class="nav_select" onClick="openNav()"></div>-->
						</div>

						<!--頭貼點他跳出的div選單
						
					   	<div id="nav" style="position:absolute;width:200px; height:400px;visibility:hidden">
				  			<div class="nav_div">
						        <div class="nav_bt_div">
						            <a href="../user/userdata.php" class="nav_bt">我的檔案</a>
						        </div>
						        <div class="nav_bt_div">
						            <a href="../user/logout.php" class="nav_bt2">登出</a>
						        </div>
				  			</div>   
						</div> 
						頭貼點他跳出的div選單-->
					<div class="rwd_nav_ppp">
						<a href="../../system/user/userdata.php" class="rwd_lognin">會員</a>
					</div>
					<div class="rwd_nav_ppp2"> 
						<a href="../../system/user/logout.php" class="rwd_lognin">登出</a>
					</div>
					<?php
				}
				else if($pri==2){//fb登入會員
					?>
					<!--圓形頭貼照-->
						<div class="rwd_nav_userImg" >
							<img src="<?php echo $photo ?>" class="rwd_notify_img02" onClick="openNav()">
							<!--頭像旁三角形選單<div class="nav_select" onClick="openNav()"></div>-->
						</div>

						<!--頭貼點他跳出的div選單
						
					   	<div id="nav" style="position:absolute;width:200px; height:400px;visibility:hidden">
				  			<div class="nav_div">
						        <div class="nav_bt_div">
						            <a href="../user/userdata.php" class="nav_bt">我的檔案</a>
						        </div>
						        <div class="nav_bt_div">
						            <a href="../user/logout.php" class="nav_bt2">登出</a>
						        </div>
				  			</div>   
						</div> 
						頭貼點他跳出的div選單-->
					<div class="rwd_nav_ppp">
						<a href="../../system/user/userdata.php" class="rwd_lognin">會員</a>
					</div>
					<div class="rwd_nav_ppp2">
						<a href="../../system/user/logout.php" class="rwd_lognin">登出</a>
					</div>
					<?php
				}
				else{//管理員
					?>
					<!--圓形頭貼照-->
						<div class="rwd_nav_userImg" >
							<img src="../user/photo/<?php echo $photo ?>" class="rwd_notify_img02" onClick="openNav()">
							<!--頭像旁三角形選單<div class="nav_select" onClick="openNav()"></div>-->
						</div>

						<!--頭貼點他跳出的div選單
						
					   	<div id="nav" style="position:absolute;width:200px; height:400px;visibility:hidden">
				  			<div class="nav_div">
						        <div class="nav_bt_div">
						            <a href="../user/userdata.php" class="nav_bt">我的檔案</a>
						        </div>
						        <div class="nav_bt_div">
						            <a href="../user/logout.php" class="nav_bt2">登出</a>
						        </div>
				  			</div>   
						</div> 
						頭貼點他跳出的div選單-->
					<div class="rwd_nav_ppp">
						<a href="../../system/user/userdata.php" class="rwd_lognin">管理</a>
					</div>
					<div class="rwd_nav_ppp2">
						<a href="../../system/user/logout.php" class="rwd_lognin">登出</a>
					</div>
					<?php
				}
			}
			else{
				?>
				<!--圓形頭貼照-->
				<div class="rwd_nav_userImg" >
					<img src="../../system/user/photo/default.png" class="rwd_notify_img02">
				</div>
				<div class="rwd_nav_ppp">
					<a href="../../system/user/login.php" class="rwd_lognin">登入</a>
				</div>
				<div class="rwd_nav_ppp2">
					<a href="../../system/user/signup.php" class="rwd_lognin">註冊</a>
				</div>
				<?php
			}
		?>
	</div>
    <a id="menu-toggle" href="javascript:void(0);" onClick="rwdbt(rwdul)">&#9776;</a>
    <ul id="rwdul">
    	<a href="../../index.php"><li>首頁</li></a>
        <a href="../../system/store/store1-2.php"><li>店家地圖</li></a>
        <a href="../../system/store/store2.php"><li>店家列表</li></a>
        <a href="../../system/group/jo.php"><li>揪團</li></a>
        <a href="../../discussion.php"><li>討論區</li></a>
        <a href="../../blog.php"><li>桌遊專欄</li></a>
        <a href="../../aboutus.php"><li>聯絡我們</li></a>
    </ul>
</nav>
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
								<img src="../../jomor_html/img/notify2.png" class="notify_img01" onClick="openNotify()">
								<!--通知欄跳出的div框-->
								<div id="notify" style="position:absolute; visibility: hidden ">	
									<div class="notify_fram">
										<?php
										//做提醒判定，
										// 0 ==鎖定房間
										// 1 ==被踢出房間
										// 2 ==房主刪除房間
										while($remindAccount = mysql_fetch_assoc($selectRemindAccount)){
											$selectUserHost = "SELECT * FROM `user` WHERE `account` = '".$remindAccount['host']."'";
											$selectStoreName = 'SELECT * FROM `store` WHERE `storeName` = "'.$remindAccount['store'].'"';
											mysql_query("SET NAMES'UTF8'");
											mysql_query("SET CHARACTER SET UTF8");
											mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
											$selectUserHost = mysql_query($selectUserHost);
											$userHost = mysql_fetch_assoc($selectUserHost);
											$selectStoreName = mysql_query($selectStoreName);
											$storeName = mysql_fetch_assoc($selectStoreName);

											$pri = $userHost['pri'];
											$photo = $userHost['photo'];
											$name = $userHost['name'];
											$date = date("m/d",strtotime($remindAccount['date']));
											$time = date("H:i",strtotime($remindAccount['time']));

											if($remindAccount['decide']==0){
												if($pri==2){
													?>
													<div class="notify_div01">
											            <div class="notify_div_img">
											            	<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $remindAccount['host'];?>">
											              		<img src="<?php echo $photo; ?>" class="notify_headph" style="border-radius: 50px;">
											              	</a>
											            </div>
											            <div class="notify_div_p">
											                <p>您於剛剛正式加入<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $remindAccount['host'];?>"><font color="red"><?php echo $name; ?></font></a>所創建的房間<a href="http://www.jomorparty.com/system/group/jo.php?no=<?php echo $remindAccount['no']?>"><font color="blue"><?php echo $remindAccount['room']; ?></font></a>，提醒您<font color="red"><?php echo $date; ?></font> <font color="red"><?php echo $time; ?></font>，在<a href="http://www.jomorparty.com/system/store/store2.php?no=<?php echo $storeName['no'];?>"><font color="blue"><?php echo $remindAccount['store'] ?></font></a>，別遲到囉~</p>
											            </div>
													</div>
													<?php
												}	
												else{
													?>
													<div class="notify_div01">
											            <div class="notify_div_img">
											            	<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $remindAccount['host'];?>">
											              		<img src="photo/<?php echo $photo; ?>" class="notify_headph">
											              	</a>
											            </div>
											            <div class="notify_div_p">
											                <p>您於剛剛正式加入<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $remindAccount['host'];?>"><font color="red"><?php echo $name; ?></font></a>所創建的房間<a href="http://www.jomorparty.com/system/group/jo.php?no=<?php echo $remindAccount['no']?>"><font color="blue"><?php echo $remindAccount['room']; ?></font></a>，提醒您<font color="red"><?php echo $date; ?></font> <font color="red"><?php echo $time; ?></font>，在<a href="http://www.jomorparty.com/system/store/store2.php?no=<?php echo $storeName['no'];?>"><font color="blue"><?php echo $remindAccount['store'] ?></font></a>，別遲到囉~</p>
											            </div>
													</div>
													<?php
												}  
											}
											if($remindAccount['decide']==1){
												?>
													<div class="notify_div01">
											            <div class="notify_div_img">
											              	<img src="../../jomor_html/img/attention.png" class="notify_attention">
											            </div>
											            <div class="notify_div_p">
											                <p>您於剛剛被<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $remindAccount['host'];?>"><font color="red"><?php echo $name; ?></font></a>踢出了房間，房名為<font color="red"><?php echo $remindAccount['room']; ?></font></p>
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
											                <p><a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $remindAccount['host'];?>"><font color="red"><?php echo $name; ?></font></a>因為個人因素刪除了房間，房名為<font color="red"><?php echo $remindAccount['room']; ?></font></p>
											            </div>
													</div>
											  	<?php  
											}
										}
										?>
									</div>  
								</div>
								<?php
							}	
							else{
								?>
								<img src="../../jomor_html/img/notify1.png" class="notify_img01" onClick="openNotify()">
								<?php
							}									
						}
					?>		
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
									<!--頭像旁三角形選單<div class="nav_select" onClick="openNav()"></div>-->
								</div>

								<!--頭貼點他跳出的div選單
								
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
								頭貼點他跳出的div選單-->
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
									<!--頭像旁三角形選單<div class="nav_select" onClick="openNav()"></div>-->
								</div>

								<!--頭貼點他跳出的div選單
								
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
								頭貼點他跳出的div選單-->
							</td>
							<td><a href="userdata.php" class="lognin">會員</a></td>
							<td><a href="logout.php" class="lognin">登出</a></td>
							<?php
						}
						else if($pri==2){//fb登入會員
							?>
							<td rowspan="2" class="top_notify_td02"><!--圓形頭貼照-->
								<div class="nav_userImg" >
									<img src="<?php echo $photo ?>" class="notify_img02" onClick="openNav()">
									<!--頭像旁三角形選單<div class="nav_select" onClick="openNav()"></div>-->
								</div>

								<!--頭貼點他跳出的div選單
								
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
								頭貼點他跳出的div選單-->
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
									<!--頭像旁三角形選單<div class="nav_select" onClick="openNav()"></div>-->
								</div>

								<!--頭貼點他跳出的div選單
								
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
								頭貼點他跳出的div選單-->
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
			</tr>
		</table>
	</div>
</header>