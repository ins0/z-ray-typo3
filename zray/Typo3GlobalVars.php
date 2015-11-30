<?php

namespace Typo3;

class Typo3GlobalVars {

    private $globalConfigKeys = array(
        'TYPO3_MISC',
        'TYPO3_CONF_VARS',
        'TYPO3_LOADED_EXT',
        'TYPO3_CONF_VARS_extensionAdded',
        'TSFE',
    );

    public function beforeStart($context, &$storage)
    {
        $variables = array();
        foreach($this->globalConfigKeys as $keyName)
        {
            if (isset($GLOBALS[$keyName])) {
                $variables[$keyName] = $GLOBALS[$keyName];
            }
        }

        $storage['Environment'] = $variables;
    }
}
