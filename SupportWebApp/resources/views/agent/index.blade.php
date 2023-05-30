<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <form action="{{ route('agent.tickets.search') }}" method="GET" class="form-inline">
                            <div class="input-group">
                                <input type="text" name="customer_name" class="form-control" placeholder="Search by Customer Name">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(!empty($tickets))
                        @foreach($tickets as $ticket)
                        <div class="item col-xs-4 col-lg-4 float-left">
                            <a href="{{ route('agent.ticket.show', $ticket->id) }}" class="card-link">
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
                                <div class="btn custom-button-container">
                                    @if($ticket->status == 0)
                                        <button class="btn btn-warning">Pending</button>
                                    @else
                                        <button class="btn btn-danger">Closed</button>
                                    @endif
                                </div>
                                </div>
                            </div>
                        </a>
                        </div>
                        @endforeach
                    @else
                        <p>No tickets found.</p>
                    @endif
                </div>
            </div>
            <div class="pagination float-left mt-5">
                {{ $tickets->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</x-app-layout>
