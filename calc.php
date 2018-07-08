<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="table2excel.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $("#btnExport").click(function () {
            $("#tblCustomers").table2excel({
                filename: "Table.xls"
            });
        });
    });
</script>
<style>
  .header {
    background-color: #4A6BE7;
  }

table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    text-align: left;
    padding: 16px;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}
</style>
</head>
<body>
    <div class="card header">
    <div class="card-body text-center"><b><h6 class="text-shadow">Calculations</h6></b></div>
  </div><br>
  <div style="background-color: #4AE777 ;color:black;padding: 4px">
    <form action="calc.php" method="post">
 <h6> FROM :<input type="date" name="fd" value="2018-07-03">    To :<input type="date" name="td" value="2018-07-04">  NAME:      <select id="sel1" name="cname">
     <?php 
       $con=mysqli_connect('localhost:3306','root','','tomato');
       $sql1="SELECT name FROM `customer` WHERE 1";
       if ($result=mysqli_query($con,$sql1))
     {
        while ($row=mysqli_fetch_row($result))
       {
         $name=$row[0];
       ?> <option value=<?php echo "$name";?>> <?php echo "$name";?></option>
    <?php   }
   } ?></select>&nbsp&nbsp<input type="submit" class="btn btn-warning"  value="click" />         <input type="button" class="btn btn-warning" id="btnExport" value="Export" /></h6></h6>
   </form>
 </div>

 
<?php 
 $con=mysqli_connect('localhost:3306','root','','tomato');
 if(isset($_POST["cname"])) { 
 $cname=$_POST['cname'];
 $fdate=date("Y-m-d",strtotime($_POST['fd']));
 $todate=date("Y-m-d",strtotime($_POST['td']));
 ?>
 <div class="table-responsive">
 <table id="tblCustomers">
  <tr>
    <th>Date</th>
    <th>Name</th>
    <th>Line</th>
    <th>Variety1</th>
    <th>Variety2</th>
    <th>Variety3</th>
    <th>price</th>
    <th>discount</th>
    <th>Tolatl amount</th>
  </tr> <?php

       $sql1="SELECT * FROM `order` WHERE name='$cname' and date>='$fdate' and date<='$todate'";
       if ($result=mysqli_query($con,$sql1))
     {
        while ($row=mysqli_fetch_row($result))
       { ?>
        <tr>
         <td><?php $val=strtotime($row[0]);
          echo date("d-m-Y",$val);
         ?></td>
         <td><?php echo "$row[1]";?></td>
         <td><?php echo "$row[2]";?></td>
         <td><?php echo "$row[3]";?></td>
         <td><?php echo "$row[4]";?></td>
         <td><?php echo "$row[5]";?></td>
         <td><?php echo "$row[6]";?></td>
         <td><?php echo "$row[7]";?></td>
         <td><?php echo "$row[7]";?></td>
         </tr>
         <?php   
       }

   } 
 }
?>
</table>
</div>

</body>
</html>
