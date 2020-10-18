<table width="270px">

    <?php
    $table = '';
        $row = 8; 
        $col = 8; 
        for($i = 0; $i < $col; $i++){
            $table .= '<tr>';
            for($j = 0; $j < $row; $j++){
                if(($i + $j) % 2 == 0){
                    $table .= '<td style="background-color: black"></td>';
                }else $table .= '<td></td>';
                
            }
        $table .= '</tr>';

        }
        echo $table;
    ?>
</table>