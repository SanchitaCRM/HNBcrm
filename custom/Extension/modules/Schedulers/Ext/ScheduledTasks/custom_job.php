<?php
    array_push($job_strings, 'custom_job');
    function custom_job()
    {
        //logic here
        $GLOBALS['log']->fatal("Sanchita Samrit");
        //return true for completed
        return true;
    }
?>