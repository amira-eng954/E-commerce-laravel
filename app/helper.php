
<?php
if (!function_exists('successResponse')) {
    function successResponse($message = null, $data = null)
    {
        $response = [
            'status' => true,
            'message' => $message,
            'data' => $data,
        ];
        return response()->json($response);
    }
}

if (!function_exists('failedResponse')) {
    function failedResponse($message = null, $data = null)
    {
        $response = [
            'status' => false,
            'message' => $message,
            'data' => $data,
        ];
        return response()->json($response);
    }
}
