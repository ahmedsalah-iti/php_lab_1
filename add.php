<?php
function myConcat(&$row,$col,$delimiter = ":"){
    if ($row == ""){
        $row = $col;
    }else{
        $row = $row.$delimiter.$col;
    }
}
$txtFilePath = "list.txt";
function saveToFile($lineData){
    global $txtFilePath;
    if (file_exists($txtFilePath)){
        $f = fopen($txtFilePath,'a');
        if ($f){
            fwrite($f,$lineData."\n");
            fclose($f);
            return TRUE;
        }else{
            return FALSE;
        }
    }else{
        $f = fopen($txtFilePath,'w');
        if ($f){
            fwrite($f,$lineData."\n");
            fclose($f);
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
}
function fileDataToHtmlTable(){
    global $txtFilePath;
    if (file_exists($txtFilePath)){
        $f = fopen($txtFilePath,'r');
        if ($f){
            $table_row_data='';
            while(!feof($f)){
                $line = fgets($f);
                $splitData = explode(":",$line);
                $table_row_data = $table_row_data."<tr>";
                foreach ($splitData as $record){
                    if ($splitData[count($splitData)-1]!=$record)
                    {
                        $table_row_data = $table_row_data."<th>".$record."</th>";
                    }else{
                   


                        $skills_data_arr = explode("$$$",$splitData[count($splitData)-1]);
                        if (count($skills_data_arr) > 0){
                        $table_row_data = $table_row_data."<th><ul>";
        
                        foreach ($skills_data_arr as $skill){
                            $table_row_data = $table_row_data."<li>$skill</li>";
                        }
                            $table_row_data = $table_row_data."</ul></th>";
                        }











                    }
                }


                $table_row_data = $table_row_data."</tr>";
            }
            echo "
            <table>
                <tr>
                    <th>Gender</th>
                    <th>Name</th>
                    <th>UserName</th>
                    <th>Address</th>
                    <th>Track</th>
                    <th>Skills</th>
                </tr>
                
                $table_row_data
                
            </table>
            ";
        }
    }
}
?>