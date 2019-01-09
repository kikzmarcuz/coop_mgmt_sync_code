<?php

function paymentCount($count, $amount){
	$counter=0;
	if($count > 0){
        $amount = $amount/$count;
        $counter = 1;
    }else{
        $counter = 0;
    }

    return($counter);
}

?>