







/***********************這不能include，因為每個檔案階層會有相對路徑不同的問題，所以只用寫的寫在各檔header就好****************************/


<?php
if(empty($account)){
	header('Location:block.php?situation=3');
}
?>