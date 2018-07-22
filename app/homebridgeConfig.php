<?php
namespace App;


use Illuminate\Database\Eloquent\Model;
use PHPQRCode\QRcode;

class homebridgeConfig extends Model
{

    protected $configSchemaFile = "config/homebridge-schema.json";
    protected $configFile = "config/config.json";

    protected $defaultJson = '{"bridge":{"name":"Homebridge","username":"CC:22:3D:E3:CE:30","port":51826,"pin":"031-45-154"},"description":"This is an example configuration file with one fake accessory and one fake platform. You can use this as a template for creating your own configuration file containing devices you actually own.","accessories":[{"accessory":"WeMo","name":"Coffee Maker"}],"platforms":[{"platform":"PhilipsHue","name":"Hue"}]}';

    /**
     * @return array
     */
    public function getConfig() {
        $read = file_get_contents($this->configFile);
        if($read == FALSE) {
            $result = [
              "result" => "KO",
              "data" => ""
            ];
        }
        else {
            $result = [
                "result" => "OK",
                "data"  => $read
            ];
        }
        return $result;
    }

    /**
     * @return array
     */
    public function getSchema() {
        $read = file_get_contents($this->configSchemaFile);
        if($read == FALSE) {
            $result = [
                "result" => "KO",
                "data" => ""
            ];
        }
        else {
            $result = [
                "result" => "OK",
                "data"  => $read
            ];
        }
        return $result;
    }

    /**
     * @param $json
     * @return array
     */
    public function writeConfig($json) {
        $write = file_put_contents($this->configFile, $json);
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
    public function resetConfig() {
        return $this->writeConfig($this->defaultJson);
    }

    /**
     * @return mixed
     */
    protected function jsonDecodeConfig() {
        return json_decode($this->getConfig()['data']);
    }

    /**
     * @return array
     */
    public function getBridgeInformations() {
        return [
            "result" => "OK",
            "data" => $this->jsonDecodeConfig()->bridge
        ];
    }

    /**
     * @return array
     */
    public function getPin() {
        return [
            "result" => "OK",
            "data" => $this->jsonDecodeConfig()->bridge->pin
        ];
    }

    public function getQrCode() {
        QRcode::png($this->getPin()['data'],"images/qrcode.png", 'L', '20');
        return [
            "result" => "OK",
            "data" => "images/qrcode.png"
        ];
    }

}