<div>
    <table>
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Customer Name</th>
                <th>Notes</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quotes as $q)
            <tr>
                <td>{{$q['title']}}</td>
                <td>{{$q['name']}}</td>
                <td>{{$q['notes']}}</td>
                <td>{!!$q['status']!!}</td>
                <td>{!!$q['action']!!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$quotes->links()}}

    
</div>
