<?php

namespace Sahib\Bagu;

use Sahib\Bagu\Models\BaguLog;

class Bagu
{
    public function log($level, $message, $context)
    {
        try {
            BaguLog::create([
                'level' => $level,
                'message' => $this->getMessage($message),
                'context' => $this->getContext($context),
                'exception' => $this->getException($message),
                'script_path' => $this->getScriptPath($message),
                'script_line' => $this->getScriptLine($message),
                'code' => $this->getCode($message),
                'trace' => $this->getTrace($message),
                'request_client' => request()->ip(),
                'request_method' => request()->method(),
                'request_input' => $this->getRequestInput(),
                'request_path' => request()->path(),
            ]);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function getMessage($message)
    {
        if ($this->isException($message)) {
            return $message->getMessage();
        }

        return $message;
    }

    public function getContext($context)
    {
        if (empty($context)) {
            return null;
        }

        return var_export($context, true);
    }

    public function isException($message)
    {
        return $message instanceof \Exception;
    }

    public function getException($message)
    {
        if ($this->isException($message)) {
            return get_class($message);
        }

        return null;
    }

    public function getScriptPath($message)
    {
        if ($this->isException($message)) {
            return $message->getFile();
        }

        return null;
    }

    public function getScriptLine($message)
    {
        if ($this->isException($message)) {
            return $message->getLine();
        }

        return null;
    }

    public function getCode($message)
    {
        if ($this->isException($message)) {
            return $message->getCode();
        }

        return null;
    }

    public function getTrace($message)
    {
        if ($this->isException($message)) {
            return $message->getTraceAsString();
        }

        return null;
    }

    public function getRequestInput()
    {
        return var_export(request()->all(), true);
    }
}
