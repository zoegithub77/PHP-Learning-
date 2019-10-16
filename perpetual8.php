<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>綜合練習-萬年曆製作</title>
    <style>
    *{
        list-style-type:none;
        text-align:center;
    }

    .bg{
        background:pink;
    }
    table{
           border-collapse: collapse;
           margin:auto;
        }
    table td{
        padding:10px;
        border:1px solid #999;
       }
    h2{
        text-align:center;
        color:#09f;
    }
    </style>
</head>
<body>

<?php

if(!empty($_GET['month'])){

    $month=$_GET['month'];
    

}else{
        
    $month=date("m");
        
}

if(!empty($_GET['year'])){

    $year=$_GET['year'];

}else{

    $year=date("Y");

}
echo "<h2>".$month."月-".$year."年</h2>";



    $sd=[
        9=>"生日",
        10=>"國慶日",
        25=>"光復節",
    ];
    $today=date("Y-m-d");
    $todayDays=date("d");
    $start="$year-$month-01";
    $startDay=date("w",strtotime($start));
    $days=date("t",strtotime($start));
    $endDay=date("w",strtotime("$year-$month-$days"));

    echo "<h2>".date("Y-m",strtotime($start))."</h2>";

    echo "<br>";

    if(($month-1)>0){
    
        $premonth=$month-1;
        $preyear=$year;
  
    }else{
    
        $premonth=12;
        $preyear=$year-1;
    }
    if(($month+1)<=12){
    
        $nextmonth=$month+1;
        $nextyear=$year;
    
    }else{
    
        $nextmonth=1;
        $nextyear=$year+1;    
    
    }
    ?>

<h2>
    <a href="perpetual8.php?month=<?php echo $premonth ?>&year=<?php echo $preyear ?>">上一月</a>
    <a href="perpetual8.php?month=<?php echo $nextmonth ?>&year=<?php echo $nextyear ?>">下一月</a>
</h2>

<table border="1">
    <tr>
        <td>日</td>
        <td>一</td>
        <td>二</td>
        <td>三</td>
        <td>四</td>
        <td>五</td>
        <td>六</td>
    </tr>
<?php
for($i=0;$i<6;$i++){

    echo "<tr>";

    for($j=0;$j<7;$j++){
        if(!empty($sd[$i*7+$j+1-$startDay])){
            $str="";
        }else{
            $str="";
        }
        if($i==0){

            if($j<$startDay){
                 echo "<td></td>";

            }else{
                if(($i*7+$j+1-$startDay)==$todayDays){
                    
                    echo "    <td class='bg'>".($i*7+$j+1-$startDay).$str."</td>";    
                }else{

                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }
            }
        }else{

            if(($i*7+$j+1-$startDay)<=$days){
                if(($i*7+$j+1-$startDay)==$todayDays){
                    echo "    <td class='bg'>".($i*7+$j+1-$startDay).$str."</td>";    
                }else{
                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }
            }else{
                echo "    <td></td>";    
            }
        }
   }
    echo "</tr>";
}

?>
   
</table>

</body>
</html>