<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\AssignTicketToAgentRequest;
use App\Http\Requests\Ticket\StoreTicketRequest;
use App\Http\Requests\Ticket\UpdateTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use App\Models\User;
use App\Services\Ticket\TicketService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    public function __construct(
        private readonly TicketService $service
    ) {
    }

    public function index(): AnonymousResourceCollection
    {
        $tickets = Ticket::paginate(20);
        $tickets->loadMissing('categories');
        $tickets->loadMissing('labels');

        return TicketResource::collection($tickets);
    }

    public function store(StoreTicketRequest $request): TicketResource
    {
        $data = $request->validated();
        $user = $request->user();

        $ticket = $this->service->createTicket($user, $data);
        $ticket->loadMissing('categories');
        $ticket->loadMissing('labels');

        return new TicketResource($ticket);
    }

    public function show(Ticket $ticket)
    {
        $ticket->loadMissing('categories');
        $ticket->loadMissing('labels');
        $ticket->loadMissing('messages');
        $ticket->loadMissing('messages.user');

        return new TicketResource($ticket);
    }

    public function update(Ticket $ticket, UpdateTicketRequest $request): TicketResource
    {
        $data = $request->validated();
        $this->service->updateTicket($ticket, $data);

        return new TicketResource($ticket);
    }

    public function destroy(Ticket $ticket): JsonResponse
    {
        $this->service->deleteTicket($ticket);

        return response()->json(status: Response::HTTP_NO_CONTENT);
    }

    public function assignAgent(Ticket $ticket, AssignTicketToAgentRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = User::where('uuid', $data['agent_uuid']);

        $this->service->assignTicketToAgent($ticket, $user);

        return response()->json([
            'message' => 'Agent assigned successfully',
        ], Response::HTTP_OK);
    }

    public function lockTicket(Ticket $ticket): JsonResponse
    {
        $this->service->lockTicket($ticket);

        return response()->json([
            'message' => 'Ticket was locked successfully',
        ], Response::HTTP_OK);
    }
}
