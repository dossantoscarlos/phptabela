<?php 
    
    $texto=array();
    $dbText = glob('db/*.txt');
    $posicao = (isset($_GET['p'])) ? intval($_GET['p']) : 1;
    $arrayDias = ['horario','segunda','terca', 'quarta','quinta','sexta','sabado'];
    $result = $dbText[$posicao-1];
    $text = file($result);
    for ($i = 0 ; $i < count($text);$i++){ 
        $texto[] =  array_combine($arrayDias,explode (',' ,$text[$i]));
    }
    $cont = count($dbText);
    $segunda = date("d/m/Y");
 ?>
 <div class='container-fluid'>
    <table class='table table-condensed table-hover'>
        <caption class='panel-title text-center' style='color:#337AB7'>
            <h1>
                <?php 
                    echo $segunda=date("d/m/Y");
                    ?>
                </h1>
            </caption>
        <thead>
            <?php
                foreach($arrayDias as $dia): 
                    echo '<th>'.strtoupper($dia).'</th>';
                endforeach;
            ?>
        </thead>
        <tbody>      
            <?php
                echo "<tr>";
                foreach($texto as $key =>$value){
                    echo "<td>".$texto[$key]['horario']."</td>";
                    echo "<td>".$texto[$key]['segunda']."</td>";
                    echo "<td>".$texto[$key]['terca']."</td>";
                    echo "<td>".$texto[$key]['quarta']."</td>";
                    echo "<td>".$texto[$key]['quinta']."</td>";
                    echo "<td>".$texto[$key]['sexta']."</td>";
                    echo "<td>".$texto[$key]['sabado']."</td>";
                    echo "</tr>";
                }            
            ?>            
        </tbody>
    </table>
</div>
<div class='container'>
    <div class='text-center'>
    <?php 
        for($i =1; $i <= $cont ; $i++){
            if($i==$posicao){
                printf("<a href='#' class='btn btn-default' style='margin-left:12px'> %s </a>",$i,$i);
            }else{
                printf("<a href='?p=%s' class='btn btn-primary' style='margin-left:12px;'> %s </a>",$i,$i);
            }
        }
    ?>  
    </div>
</div>



