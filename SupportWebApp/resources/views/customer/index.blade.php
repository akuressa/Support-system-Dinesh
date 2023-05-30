<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(!empty($tickets))
                        @foreach($tickets as $ticket)
                        <div class="item col-xs-4 col-lg-4 float-left">
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
                                    Reference:
                                    </span>
                                    <span>{{ $ticket->reference }}</span>
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
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p>No tickets found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
