<?php

namespace Typo3;

class Typo3GlobalHooks {

    /**
     * After Function Hook
     *
     * @param $context
     * @param $storage
     */
    public function afterExit($context, &$storage)
    {
        $storage['Hooks'] = array(
            'CORE' => $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS'],
            'USER' => $GLOBALS['TYPO3_CONF_VARS']['EXTCONF'],
        );
    }
}
