<?php

namespace App\Traits\ProshoreEventTraits;

trait ProshoreDecryptionTrait {
    private $keys = ['id'];

    private function decryptKeys (&$request) {
        $requestKeys = array_keys($request->all());
        foreach ($this->keys as $key) {
            if (in_array($key, $requestKeys)) {
            	if (!is_null($request[$key])){
            		$request[$key] = decrypt($request->$key);
            	}
            }
        }
    }
}