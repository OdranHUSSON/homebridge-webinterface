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

}
