<div>
    <form action="{{route('admin.courses.index')}}" method="get">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control"
                       value="{{request('name')}}"
                       placeholder="Search by name">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
</div>