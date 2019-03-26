<?php
use App\Enums\UserRole;

class TagHelper {
	public static function getRole($key){
		switch ($key) {
			case TagGetDeviceName::CPU:
				return 'CPU';
				break;
			case TagGetDeviceName::GPU:
				return 'GPU';
				break;
			case TagGetDeviceName::Main:
				return 'Main';
				break;
			case TagGetDeviceName::RAM:
				return 'RAM';
				break;
			case TagGetDeviceName::ROM:
				return 'ROM';
				break;
		}
	}

	public static function getOptionRole(){
		return array(
			TagGetDeviceName::CPU => 'CPU',
			TagGetDeviceName::GPU => 'GPU',
			TagGetDeviceName::Main => 'Main',
			TagGetDeviceName::RAM => 'RAM',
			TagGetDeviceName::ROM => 'ROM',
		);
	}
}
