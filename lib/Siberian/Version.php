<?php

class Siberian_Version {

    const TYPE = 'SAE';
    const NAME = 'Single App Edition';
<<<<<<< HEAD
    const VERSION = '4.11.1-beta.1';
    const NATIVE_VERSION = '4';
=======
    const VERSION = '4.12.4';
    const NATIVE_VERSION = '4';
    const API_VERSION = 'undefined';
>>>>>>> upstream/master

    static function is($type) {
        return self::TYPE == strtoupper($type);
    }
}
