  <x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Create Support Ticket</h1>

                    <form action="/customer/tickets/store" method="POST" class="row p-5 g-3 mt-sm-5 mt-2 justify-content-center bg-dark">
                        @csrf
                        <div class="card col-md-8 p-4 mb-sm-3">
                            <div class="row mb-3 mt-3">
                                <label class="col-sm-4 col-form-label" for="ticket_name">Ticket Name</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="ticket_name" id="ticket_name" placeholder="Ticket Name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="problem_description">Description</label>
                                <div class="col-sm-7">
                                    <textarea name="description" class="form-control" placeholder="Description" required></textarea>
                                </div>
                            </div>
                            <div class="mb-3 center-button">
                                <button type="submit" class="btn btn-primary">Submit Ticket</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

