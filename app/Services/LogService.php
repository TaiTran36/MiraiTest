<?php

namespace App\Services;
use Log;
use App\Supports\Constant;
use App\Supports\Message;

class LogService
{

    /**
     * Start log output
     *
     * @param int|string $logUID
     * @param mixed $request
     */
    public function writeLogStart(int|string $logUID, mixed $request): void
    {
        $this->writeLog($logUID, Constant::TYPE_LOG_START, Message::LOG_START, [
            'request_header' => $request->header(),
            'request_param' => $request->except($this->arrParamRequestExcept),
        ]);
    }

    /**
     * Exit log output
     *
     * @param int|string $logUID
     * @param mixed $response
     */
    public function writeLogEnd(int|string $logUID, mixed $response = null): void
    {
        $this->writeLog($logUID, Constant::TYPE_LOG_END, Message::LOG_END, params: ['response' => $response]);
    }

    /**
     * Processing progress log output
     *
     * @param int|string $logUID
     * @param string $step
     * @param int|string|null $member_id
     * @param array $params
     */
    public function writeLogProcess(int|string $logUID, string $step, int|string $member_id = null, array $params = []): void
    {
        $this->writeLog($logUID, Constant::TYPE_LOG_PROCESS, $step, $member_id, $params);
    }

    /**
     * Error log output
     *
     * @param int|string $logUID
     * @param string $step
     * @param int|string|null $member_id
     * @param array $params
     * @param string $level
     */
    public function writeLogError(int|string $logUID, string $step, int|string $member_id = null, array $params = [], string $level = Constant::TYPE_LOG_ERROR): void
    {
        $this->writeLog($logUID, $level, $step, $member_id, $params);
    }

    /**
     * Write log
     *
     * @param int|string $logUID
     * @param string $typeLog
     * @param string $step
     * @param int|string|null $member_id
     * @param array $params
     */
    public function writeLog(int|string $logUID, string $typeLog, string $step, int|string $member_id = null, array $params = []): void
    {
        if (str_contains(php_sapi_name(), 'cli')) {
            //batch endpoint
            $server = request()->server();
            $endpoint = $server['argv'][1] ?? null;
        } else {
            //api endpoint
            $uri = explode("/", url()->current(), 4);
            $endpoint = str_replace('api', '', $uri[3]);
        }
        $paramLog = [
            'endpoint' => $endpoint,
            'step' => $step
        ];

        if (!empty($member_id)) {
            $paramLog['member_id'] = $member_id;
        }

        if (!empty($params)) {
            $paramLog = array_merge($paramLog, $params);
        }

        $logLevel = $this->switchLogLevel($typeLog);
        $channel = $this->switchChannelLogLevel($typeLog);
        Log::channel($channel)->$logLevel($logUID, $paramLog);
    }
}
