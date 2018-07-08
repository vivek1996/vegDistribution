<?php
 $con=mysqli_connect('localhost:3306','root','','tomato');
 $v1=(int)$_POST['v1'];
 $v2=(int)$_POST['v2'];
 $v3=(int)$_POST['v3'];
 $line="line1";
 $name="pradee"
 $discount=(int)$_POST['disc'];
  $dat=date('Y-m-d');
   $sql="SELECT * FROM `variety_price` WHERE date='$dat'";
     if ($result=mysqli_query($con,$sql))
     {
        while ($row=mysqli_fetch_row($result))
       { 
             $p1=(int)$row[1];
             $p2=(int)$row[2];
             $p3=(int)$row[3];
      }
    }
     else {
    echo "0 results";
}
        
        $x=($v1*$p1);
        $y=($v2*$p2);
        $z=($v3*$p3);
        $price=(int)$x+(int)$y+(int)$z;
        $tot=(int)$price-$discount;
 $sql1="INSERT INTO `order`(`date`, `name`,`line`, `tomato1`, `tomato2`, `tomato3`, `price`, `discount`, `total_amount`) VALUES (now(),'pradee','$line',$v1','$v2','$v3','$price','$discount','$tot')";
 $sql1="INSERT INTO `order`(`date`, `name`, `line`, `tomato1`, `tomato2`, `tomato3`, `price`, `discount`, `total_amount`) VALUES (now(),'$name',[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])";
  if (mysqli_query($con, $sql1)) {
      header('Location: table.html');
    }
    else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($con);;
    }
?>
