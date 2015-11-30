<?php

namespace Typo3;

class Typo3Logs {

    private $logLevel = array(
        0 => 'emergency',
        1 => 'alert',
        2 => 'critical',
        3 => 'error',
        4 => 'warning',
        5 => 'notice',
        6 => 'info',
        7 => 'debug',
    );

    /**
     * After Function Hook
     *
     * @param $context
     * @param $storage
     */
    public function afterExit($context, &$storage)
    {
        list($level, $message, $data) = $context['functionArgs'];
        $logLevelType = $this->getLogLevelText($level);
        $calledClass = $this->normalizeCaller($context['this']->getName());

        $storage['tlogger'][] = array(
            'message' => $message,
            'lvl' => $level,
            'type' => $logLevelType,
            'data' => $data,
            'caller' => $calledClass,
        );
    }

    /**
     * Normalize caller class name
     *
     * @param $caller
     * @return mixed
     */
    private function normalizeCaller($caller)
    {
        return str_replace('.', '/', $caller);
    }

    /**
     * Get the current loglevel
     *
     * @param $level
     * @return mixed
     */
    private function getLogLevelText($level)
    {
        return $this->logLevel[$level];
    }
}
