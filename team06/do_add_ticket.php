<?php
include_once("connect.php");

//取得傳過來的檔案
$photo = '';
// if(isset($_FILES['photo']))
// {
//   //print_r($_FILES);
//   /**
//    * //檔案的陣列有以下索引值
//    * $_FILES['設定的name鍵值']['name'] 原本的檔名
//    * $_FILES['設定的name鍵值']['tmp_name'] 暫存在server上面的檔名，會被重新命名過
//    * $_FILES['設定的name鍵值']['type'] 檔案型態
//    * $_FILES['設定的name鍵值']['size'] 檔案大小
//    * $_FILES['設定的name鍵值']['error'] 錯問代碼
//    */
//   //如果有傳 photo 索引值的檔案來
//   //檢查上傳到server的暫存檔案是否存在
//   if(file_exists($_FILES['photo']['tmp_name']))
//   {
//     // move_uploaded_file 這個方法可以將上傳的檔案，移動到你目標的資料夾。
//     $targetFolder = "file/";
//     move_uploaded_file($_FILES['photo']['tmp_name'], $targetFolder . $_FILES['photo']['name']);

//     //將目標資料夾與檔案名稱組再一起，就是在server上的檔案位置了。
//     $photo = $targetFolder.$_FILES['photo']['name'];
//     //echo "檔案存在，可以搬移";
//   }
//   else
//   {
//     echo "上傳檔案失敗，暫存檔不在，請確認資料夾寫入權限。或php.ini上傳檔案容量限制是否太小。";
//   }
// }


    //取得上傳檔案資訊
    $filename=$_FILES['photo']['name'];
    $tmpname=$_FILES['photo']['tmp_name'];
    $filetype=$_FILES['photo']['type'];
    $filesize=$_FILES['photo']['size'];    
    $filename=$_FILES["photo"]["name"];
    move_uploaded_file($_FILES['photo']['tmp_name'],"img/".$filename);
    $fileplace='img/'.$filename;
    echo $fileplace;
    $file=NULL;
    

    $sort_name=$_POST['sort_name'];
    $sort_price=$_POST['sort_price'];
    $sort_info=$_POST['sort_info'];
    $sort_sum=$_POST['sort_sum'];
    $sort_place=$_POST['sort_place'];
    $sort_hold=$_POST['sort_hold'];
    $sort_time=$_POST['sort_time'];
    $sort_img=$fileplace;
    




    if(isset($_FILES['photo']['error'])){    
        if($_FILES['photo']['error']==0){                                    
            $instr = fopen($tmpname,"rb" );
            $file = addslashes(fread($instr,filesize($tmpname)));        
            
          }
        
    }
    
    //新增圖片到資料庫
         
    
    $add_sql="INSERT INTO `sort`( `sort_name`, `sort_price`, `sort_info`, `sort_sum`, `sort_place`, `sort_hold`, `sort_time`, `sort_img`)
    VALUES (' $sort_name',' $sort_price','$sort_info',' $sort_sum','$sort_place','$sort_hold',' $sort_time','".$fileplace."')";
    echo "INSERT INTO `sort`( `sort_name`, `sort_price`, `sort_info`, `sort_sum`, `sort_place`, `sort_hold`, `sort_time`, `sort_img`)
    VALUES (' $sort_name',' $sort_price','$sort_info',' $sort_sum','$sort_place','$sort_hold',' $sort_time','".$fileplace."')";
    $result=mysqli_query($conn, $add_sql);
  if(isset($sort_name)&&isset($sort_price)&&isset($sort_info)&&isset($sort_sum)&&isset($sort_place)&&isset($sort_hold)&&isset($sort_time)){

        if($result){
          echo "成功新增資料";
          header('location: adminend.php');

        }else{
        echo "錯誤:".$add_sql."<br>".$conn->error;
        }
 }
 else{
   echo "";
 }



?>






<?php
//結束mysql連線
mysqli_close($conn);
?>
