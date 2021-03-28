<?php
$arr=array(
 '教学部'=>array(
 array('richard','18','male'),
 array('roy','20','male'),
 array('david','21','male'),
 ),

 '宣传部'=>array(
 array('edward','18','male'),
 array('gao','20','female'),
 array('lv','21','female'),
 ),

 '财务部'=>array(
 array('li','18','male'),
 array('gao','20','male'),
 array('david','21','female'),
 ),

);


while(list($key,$value)=each($arr))
{
    echo '<h1>'.$key.'</h1>';
    echo '<table border="1">';
    foreach($value as $k=>$v)
    {
        echo '<tr>';
        
        for($i=0;$i<count($v);$i++)
        {
        echo '<td>'.$v[$i].'</td>';
        }   
        echo '<tr>';    
        
    }  
    echo '</table>';
}


?>