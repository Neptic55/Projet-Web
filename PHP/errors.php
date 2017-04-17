<?php

function alert ($message){

    exit('<script>'.alert($message).'</script>');
}