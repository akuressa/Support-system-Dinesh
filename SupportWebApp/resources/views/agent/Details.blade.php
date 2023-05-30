<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <div class="w-full sm:max-w-md">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="item">
                                <div class="card">
                                    <div class="caption card-body">
                                        <div class="title">
                                            <span class="group card-title inner list-group-item-heading">
                                                Title:
                                            </span>
                                            <span>{{ $ticket->name }}</span>
                                        </div>
                                        <div class="title">
                                            <span class="group card-title inner list-group-item-heading">
                                                Customer Name:
                                            </span>
                                            <span>{{ $ticket->user->name }}</span>
                                        </div>
                                        <div class="description mt-3">
                                            <p class="group inner list-group-item-text">
                                                {{ $ticket->problem_description }}
                                            </p>
                                        </div>
                                        <div class="btn custom-button-container">
                                            @if($ticket->status == 0)
                                                <button class="btn btn-warning">Pending</button>
                                            @else
                                                <button class="btn btn-danger">Closed</button>
                                            @endif
                                        </div>

                                        <div class="container mb-5">
                                            <div class="row justify-content-center">
                                                <div class="">
                                                    <form action="{{ route('agent.ticket.reply', $ticket->id) }}" method="post" class="form-inline mt-3">
                                                        @csrf
                                                        <div class="input-group">
                                                            <input type="text" name="reply" class="form-control" placeholder="Reply to the ticket">
                                                            <div class="input-group-append">
                                                                <button type="submit" class="btn btn-primary">Reply</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    @if(session('replies'))
                                                        <div class="mt-3">
                                                            Reply 
                                                        </div>
                                                        @foreach(session('replies') as $reply)
                                                            <p>{{ $reply->reply_message }}</p>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
