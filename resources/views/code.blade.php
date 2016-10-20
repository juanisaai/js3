<td>
    <a href="{{ route('deleteEmployee', ['id' => $supplier->id]) }}">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </a> |
    <a href="{{ route('editEmployee', ['id' => $supplier->id]) }}">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
    </a>
</td>



<div class="btn">
    <button type="button" class="btn btn-default" aria-haspopup="true" aria-expanded="false">
        <a href="{{ route('readAssign') }}">Back</a>
    </button>
</div>
