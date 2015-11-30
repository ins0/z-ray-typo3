<?php

namespace Typo3;

class Module extends \ZRay\ZRayModule {

	public function config() {

	    return array(
	        'extension' => array(
				'name' => 'TYPO3',
			),
            'defaultPanels' => array(
                'tlogger' => false,
             ),
	        'panels' => array(
				'logs' => array(
					'display'       => true,
	                'logo'          => 'logo.png',
	                'menuTitle' 	=> 'Logs',
	                'panelTitle'	=> 'Logs',
				    'searchId'      => 'typo3-logs-search',
				    'pagerId'       => 'typo3-logs-pager',
				),
	         )
	    );
	}	
}
