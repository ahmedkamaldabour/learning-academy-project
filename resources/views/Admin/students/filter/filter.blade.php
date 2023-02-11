<div>
    <form action="{{route('admin.students.index')}}" method="get">
        <div class="row">
            <div class="col-md-2">
                <input type="text" name="name" class="form-control"
                       value="{{request('name')}}"
                       placeholder="Search by name">
            </div>
            <div class="col-md-2">
                <input type="text" name="email" class="form-control"
                       value="{{request('email')}}"
                       placeholder="Search by email">
            </div>
            <br>
            <div class="col-md-2">
                <input type="text" name="specialized_at" class="form-control"
                       value="{{request('specialized_at')}}"
                       placeholder="Search by specialization">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
</div>