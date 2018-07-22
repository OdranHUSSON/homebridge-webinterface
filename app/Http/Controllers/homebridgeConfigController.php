<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homebridgeConfigController
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getConfig() {
        return response()->json((new \App\homebridgeConfig)->getConfig());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSchema() {
        return response()->json((new \App\homebridgeConfig)->getSchema());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function writeConfig(Request $request) {
        return response()->json((new \App\homebridgeConfig)->writeConfig($request->get('data')));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetConfig() {
        return response()->json((new \App\homebridgeConfig)->resetConfig());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBridgeInformations() {
        return response()->json((new \App\homebridgeConfig)->getBridgeInformations());
    }

}
