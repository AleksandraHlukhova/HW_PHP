<table width="270px">

    <?php
    $table = '';
        $row = 10; 
        $col = 10; 
        $numb = 0;
        for($i = 1; $i <= $col; $i++){
            $table .= '<tr>';
            for($j = 1; $j <= $row; $j++){
                $n = $i*$j;
                $table .= "<td>{$n}</td>";
            }
        $table .= '</tr>';

        }
        echo $table;
    ?>
</table>