<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>註冊會員</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td class="tdbline" id="top"><center><img src="images/logo.jpg" alt="會員" width="100" height="100"></td></center>
  </tr>
  <tr>
    <td class="tdbline"><table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr valign="top">
        <td class="tdrline"><form action="" method="POST" name="formJoin" id="formJoin" onSubmit="return checkForm();">
          <p class="title">加入會員</p>
          <div class="dataDiv">
            <hr size="1" />
            <p class="heading" align="center">帳號資料</p>
            <p><strong>帳號</strong>：
                <input name="username" type="text" class="normalinput" id="username">
                <font color="#FF0000">*</font><br>
                <span class="smalltext">請填入6~12個字元以內的大小寫英文字母、數字、以及_ 符號。</span></p><br />
            <p><strong>密碼</strong>：
                <input name="passwd" type="password" class="normalinput" id="passwd">
                <font color="#FF0000">*</font><br>
                <span class="smalltext">請填入8~12個字元以內的英文字母、數字、以及各種符號組合，</span></p><br />
            <p><strong>確認密碼</strong>：
                <input name="passwdchk" type="password" class="normalinput" id="m_passwdrecheck">
                <font color="#FF0000">*</font> <br>
                <span class="smalltext">再輸入一次密碼</span></p>
            <hr size="1" />
            <p class="heading" align="center">個人資料</p><br />
            <p><strong>真實姓名</strong>：
                <input name="Name" type="text" class="normalinput" id="m_name">
                <font color="#FF0000">*</font> </p><br />
            <p><strong>性　　別
              </strong>：
              <input name="Sex" type="radio" value="boy" checked>男
  						<input name="Sex" type="radio" value="girl">女 <font color="#FF0000">*</font></p><br />
            <p><strong>生　　日</strong>：
                <input name="Birthday" type="date" class="normalinput" id="m_birthday">
                <font color="#FF0000">*</font> <br>
                <span class="smalltext">為西元格式(YYYY/MM/DD)。</span></p><br />
            <p><strong>電子郵件</strong>：
                <input name="Email" type="text" class="normalinput" id="m_email">
                <font color="#FF0000">*</font> </p>
						<p class="smalltext">請確定此電子郵件為可使用狀態，以方便未來系統使用，如補寄會員密碼信。</p><br />
						<p><strong>住　　址</strong>：
                <select name="city">
									<option value="choose">--請選擇--</option>
									<option value="Keelung">基隆市</option>
									<option value="Taipei">臺北市</option>
									<option value="NewTaipei">新北市</option>
									<option value="Taoyuan">桃園市</option>
									<option value="Yilan">宜蘭縣</option>
									<option value="HsinchuCountry">新竹縣</option>
									<option value="Hsinchu">新竹市</option>
									<option value="Miaoli">苗栗縣</option>
									<option value="Taichung">臺中市</option>
									<option value="Changhua">彰化縣</option>
									<option value="Nantou">南投縣</option
									<option value="Yunlin">雲林縣</option>>
									<option value="Chiayi">嘉義市</option>
									<option value="ChiayiCountry">嘉義縣</option>
									<option value="Tainan">臺南市</option>
									<option value="Kaohsiung">高雄市</option>
									<option value="Pingtung">屏東縣</option>
									<option value="Hualien">花蓮縣</option>
									<option value="Taitung">臺東縣</option>
									<option value="Penghu">澎湖縣</option>
									<option value="Kinmen">金門縣</option>
									<option value="Matsu">馬祖縣</option>
									<option value="Other">其他</option>
								</select>
								<input type="text" name="location" size="40">
                <font color="#FF0000">*</font> <br>
                <p class="smalltext">請確定此地址為收件地址，以方便未來取得購物內容。</p><br />
            <p> <font color="#FF0000">*</font>為必填欄位</p>
          </div>
          <hr size="1" />
          <p align="center">
            <input name="action" type="hidden" id="action" value="join">
            <input type="submit" name="Submit2" value="送出申請">
            <input type="reset" name="Submit3" value="重設資料">
            <input type="button" name="Submit" value="回上一頁" onClick="window.history.back();">
          </p>
        </form></td>
        <td width="200">
        <div class="boxtl"></div><div class="boxtr"></div>
<div class="regbox">
          <p class="heading"><strong>填寫資料注意事項：</strong></p>
          <ol>
            <li> 請提供您本人正確、最新及完整的資料。 </li><br />
            <li> 在欄位後方出現「*」符號表示為必填的欄位。</li><br />
            <li>填寫時請您遵守補助說明。</li><br />
            <li>關於您的會員註冊以及其他特定資料，本系統不會向任何人出售或出借你所填寫的個人資料。</li><br />
            <li>在註冊成功後，除了「	帳號」外您可以在會員專區內修改您所填寫的個人資料。</li>
          </ol>
          </div>
        <div class="boxbl"></div><div class="boxbr"></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" background="images/album_r2_c1.jpg" class="trademark">© 2017 TEAM5 All Rights Reserved.</td>
  </tr>
</table>
</body>
</html>

<?php session_start;?>
<?php
  include("connMysql.php");
  extract($_POST);
  $id = $username;
  $pw = $passwd;
  $pw2= $passwdchk;
  $name = $Name;
  $birthday = $birthday;
  $email = $Email;
  $loc = $city + $location;
  if($city == "choose") echo '請選擇城市';
  if($id != NULL && $pw != NULL && $pw==$pw2){
    $sql= "INSERT INTO member_table(username,password,name,birthday,email,loc) values('$id','$pw','$name','$birthday','$email','$loc')";
    if(mysql_query($sql)) echo '新增成功！';
    else echo '新增失敗！';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
  }
?>