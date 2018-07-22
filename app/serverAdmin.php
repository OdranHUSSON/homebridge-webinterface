<?php
/**
 * Created by PhpStorm.
 * User: odranhusson
 * Date: 7/22/18
 * Time: 11:08 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class serverAdmin extends Model
{
    // Creates files that will be intrepreted by bash command as function to do programiticly

    protected $folder = "cron";
    protected $timeout = 1;

    /**
     * @return array
     */
    public function askForRestart() {
        $cmd = "sudo systemctl restart homebridge";
        $write = file_put_contents($this->folder . "/" . "restart.sh", $cmd);
        if($write == FALSE) {
            $result = [
                "result" => "KO"
            ];
        }
        else {
            $result = [
                "result" => "OK"
            ];
        }
        return $result;
    }

    /**
     * @return array
     */
    public function isHomebridgeOnline() {

        $homebridgeConfig = new homebridgeConfig();
        try {
            if (fsockopen("localhost", $homebridgeConfig->getPort()['data'], $errno, $errstr, $this->timeout)) {
                $result = [
                    "result" => "OK",
                    "data" => "Online"
                ];
            } else {
                $result = [
                    "result" => "KO",
                    "data" => "Offline"
                ];
            }
        }
        catch (\Exception  $timeoutException) {
            $result = [
                "result" => "KO",
                "data" => "Offline"
            ];
        }
        return $result;
    }
}