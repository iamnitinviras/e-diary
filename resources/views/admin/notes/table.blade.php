<div class="row">
    <div class="col-sm-12">
        <table class="table align-middle datatable dt-responsive table-check nowrap dataTable no-footer  table-bordered" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
            <thead>
            <tr role="row">
                <th scope="col">
                    <div class="d-flex justify-content-between w-260px">
                        @sortablelink('title', __('system.notes.menu'), [], ['class' => 'w-100 text-gray'])
                    </div>
                </th>
                <th scope="col">
                    <div class="d-flex justify-content-between w-100px">
                        @sortablelink('category_id', __('system.categories.title'), [], ['class' => 'w-100 text-gray'])
                    </div>
                </th>

                <th scope="col">
                    <div class="d-flex justify-content-between">
                        @sortablelink('status', __('system.fields.status'), [], ['class' => 'text-gray'])
                    </div>
                </th>
                <th class="h-mw-80px">{{ __('system.crud.action') }}</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($notes as $note)
                <tr>
                    <td>
                        {{ $note->title }}
                    </td>

                    <td>
                        <span class="text-body">{{ $note->category->lang_name }}</span>
                    </td>
                    <td>
                        {!! displayBlogStatus($note->status) !!}
                    </td>

                    <td>
                        @can('delete notes')
                            {!! html()->form('delete', route('admin.notes.destroy', ['note' => $note->id]))
                                ->class('data-confirm')
                                ->attribute('autocomplete', 'off')
                                ->attribute('data-confirm-message', __('system.fields.are_you_sure'))
                                ->attribute('data-confirm-title', __('system.crud.delete'))
                                ->id('delete-form_' . $note->id)->open() !!}
                        @endcan

                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            @can('edit notes')
                                <a role="button" href="{{ route('admin.notes.edit', ['note' => $note->id]) }}" class="btn btn-success">{{ __('system.crud.edit') }}</a>
                            @endcan

                            @can('delete notes')
                                <button type="submit" class="btn btn-danger">{{ __('system.crud.delete') }}</button>
                            @endcan
                        </div>

                        @can('delete notes')
                            {!! html()->closeModelForm() !!}
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        {{ __('system.crud.data_not_found', ['table' => __('system.notes.title')]) }}
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
