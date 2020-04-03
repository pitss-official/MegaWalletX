<?php
switch($argv[1]){
    case "run":
        if(!isset($argv[2]))$argv[2]="localhost:8000";
        echo "Starting Virtual Server at http://{$argv[2]}\n";
        system("php -S {$argv[2]}");
        break;
    case "exec":
        {
            include_once("application/bootstrap.php");
            \Controller\ScheduleController::exec();
        }
        break;
    default:
        echo "Invalid Command Line Arguments";
        break;
}