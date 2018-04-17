<table id="myTable" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($categories))
		<?php $i = 1; ?>
        @foreach($categories as $category)
            <tr>
                <td>{{ $i++ }}</td>
                @if ($edit == $category->id)
                    <form method="post" action="{{ route('admin.cards.category.update',['id'=>$category->id]) }}">
                        {{ csrf_field() }}
                        <td><input type="text" class="form-control" placeholder="Name" name="name" value="{{ $category->name }}" /></td>
                        <td><input type="submit" class="btn btn-info btn-xs" value="Update" /></td>
                    </form>
                @else
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        <a href="{{ route('admin.cards.category.edit', ['id'=> $category->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                        <a href="{{ route('admin.cards.category.delete', ['id'=> $category->id]) }}" data-url="{{ route('admin.cards.category.delete', ['id'=> $category->id]) }}" class="btn btn-danger btn-xs delBtn" data-id="{{$category->id}}"><i class="fa fa-trash-o"></i> Delete </a>
                    </td>
                @endif
            </tr>
        @endforeach
    @endif
    </tbody>
</table>