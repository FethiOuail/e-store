
<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>

<div class="container">

    <div class="row">
        <div class="col-md-6">
            <h4 class="card-title mb-4">   {{trans('message.AllCategories')}} </h4>
        </div>
        <div class="col-md-6">
            <a href="{{ route('admin.addcategory') }}" class="btn btn-success pull-right">{{trans('message.Add')}} </a>
        </div>
    </div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Id</th>
        <th> {{trans('message.CategoryName')}} </th>
        <th>{{trans('message.Slug')}} </th>
        <th>{{trans('message.Action')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($categories as $category)
    <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->slug}}</td>
        <td>

            <a href="{{ route('admin.editcategory', $category->slug ) }}" class="btn btn-success pull-right"><i class="fa fa-edit" aria-hidden="true"></i>{{trans('message.Edit')}} </a>

            <a href="#" onclick="confirm('Are you sure, You want to delete this category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})" style="margin-left:10px; "><i class="fa fa-times fa-2x text-danger"></i></a>

        </td>
    </tr>


    @endforeach

    </tbody>

</table>

    {{$categories->links()}}
</div>


    @push('scripts')
        <script>

            $(document).ready(function() {
                $('#example').DataTable();
            } );

        </script>
@endpush

