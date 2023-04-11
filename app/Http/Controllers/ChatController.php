<?php

namespace App\Http\Controllers;

use App\Http\Services\ChatService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct(protected ChatService $chatService)
    {
    }


    public function chat(Request $request)
    {
        try {
            $role = $request->role;
            $message = $request->message;

            $data = $this->chatService->chat($role, $message);

            return response()->json($data);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function getModels()
    {
        try {
            $data = $this->chatService->getModels();

            return response()->json($data);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
