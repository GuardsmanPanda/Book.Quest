<?php

namespace Infrastructure\Exception;

use Illuminate\Support\Facades\Log;
use Infrastructure\Audit\Model\AuditError;
use Infrastructure\Auth\Auth;
use Infrastructure\Http\Service\Req;
use Throwable;

class Error {
    public static function logException(Throwable $throwable = null, string $message = '', string $type = "general"): void {
        try {
            $values = ['type' => $type, 'message' => $message, 'user_id' => Auth::id()];
            if ($throwable !== null) {
                $values['exception_trace'] = $throwable->getTraceAsString();
                $values['exception_message'] = $throwable->getMessage();
            }
            $values['ip'] = Req::ip();
            $values['country'] = Req::ipCountry();
            $values['method'] = Req::method();
            $values['url'] = request()?->fullUrl();
            $values['parameters'] = json_encode(request()?->input(), JSON_THROW_ON_ERROR);
            $values['body'] = request()?->getContent();
        //    AuditError::create($values);
        } catch (Throwable $x) {
            Log::critical("Could not save exception, type: $type, message: $message, exception: " . $x->getMessage());
            Log::critical($x->getTraceAsString());
        }
    }

    public static function logMessage(string $message, string $type = "general"): void {
        self::logException(message: $message, type: $type);
    }
}
