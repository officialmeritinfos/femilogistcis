@extends('admin.base')
@section('content')

    <div class="container">
        <div class="card mt-4">
            <div class="card-header text-center">
                <h4>Add Delivery Stage</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.delivery.stage.store', $delivery->id) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" class="form-control" placeholder="Enter location" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="picked-up">Picked Up</option>
                            <option value="in-transit">In Transit</option>
                            <option value="out-for-delivery">Out for Delivery</option>
                            <option value="delivered">Delivered</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="remark">Remarks</label>
                        <textarea name="remark" id="remark" class="form-control" rows="3" placeholder="Enter any remarks"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add Stage</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
