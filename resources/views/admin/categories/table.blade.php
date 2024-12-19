<div class="row tblLocations mt-2 mx-1">

    <div class="row">
        <div class="col-sm-12">
            <table class="table align-middle datatable dt-responsive table-check nowrap dataTable no-footer  table-bordered" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                <thead>
                <tr role="row">
                    <th scope="col">
                        <div class="d-flex justify-content-between w-60px">
                            @sortablelink('category_name', __('system.fields.name'), [], ['class' => 'w-100 text-gray'])
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex justify-content-between w-150px">
                            @sortablelink('status', __('system.fields.status'), [], ['class' => 'w-100 text-gray'])
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex justify-content-between w-150px">
                            @sortablelink('show_in_menu', __('system.categories.show_in_menu'), [], ['class' => 'w-100 text-gray'])
                        </div>
                    </th>
                    <th class="h-mw-80px">{{ __('system.crud.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($categories ?? [] as $category)
                    <tr>
                        <td>{{ $category->lang_name }}</td>

                        <td>{!! displayStatus($category->status) !!}</td>
                        <td>{!! displayMenuStatus($category->show_in_menu) !!}</td>

                        <td>
                            @can('delete categories')
                                {!! html()->form('delete', route('admin.categories.destroy', ['category' => $category->id]))
                                    ->class('data-confirm')
                                    ->attribute('autocomplete', 'off')
                                    ->attribute('data-confirm-message', __('system.fields.are_you_sure'))
                                    ->attribute('data-confirm-title', __('system.crud.delete'))
                                    ->id('delete-form_' . $category->id)->open() !!}
                            @endcan

                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                @can('edit categories')
                                    <a role="button" href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" class="btn btn-success">{{ __('system.crud.edit') }}</a>
                                @endcan
                                @can('delete categories')
                                    <button type="submit" class="btn btn-danger">{{ __('system.crud.delete') }}</button>
                                @endcan
                            </div>

                            @can('delete categories')
                                {!! html()->closeModelForm() !!}
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            {{ __('system.crud.data_not_found', ['table' => __('system.categories.menu')]) }}
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
