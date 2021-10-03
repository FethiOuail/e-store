<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="card-title mb-4">  {{trans('message.SaleSetting')}}   </h4>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateSale">
                            <div class="form-group">
                                <label class="{{trans('message.Status')}}"></label>
                                <div class="">
                                    <select class="form-control" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">{{trans('message.SaleDate')}}</label>
                                <div class="">
                                    <input type="text" id="sale-date" placeholder="YYYY/MM/DD H:M:S" class="form-control input-md" wire:model="sale_date" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=""></label>
                                <div class="">
                                    <button type="submit" class="btn btn-primary">{{trans('message.Update')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            $('#sale-date').datetimepicker({
                format : 'Y-MM-DD h:m:s',
            })
                .on('dp.change',function(ev){
                    var data = $('#sale-date').val();
                @this.set('sale_date',data);
                });
        });
    </script>

@endpush
