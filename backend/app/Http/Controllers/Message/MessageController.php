<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Http\Requests\Message\StoreMessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\Ticket;
use App\Services\Message\MessageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    public function __construct(
        private readonly MessageService $service
    ) {
    }

    public function index(Ticket $ticket): AnonymousResourceCollection
    {
        return MessageResource::collection($ticket->messages()->get());
    }

    public function store(Ticket $ticket, StoreMessageRequest $request): MessageResource
    {
        $data = $request->validated();
        $user = $request->user();

        $message = $this->service->createMessage($ticket, $user, $data);
        unset($message->user);
        unset($message->ticket);

        return new MessageResource($message);
    }

    public function destroy(Message $message): JsonResponse
    {
        $message->delete();

        return response()->json(status: Response::HTTP_NO_CONTENT);
    }
}
