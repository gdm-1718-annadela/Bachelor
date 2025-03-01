@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.mood.actions.edit', ['name' => $mood->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <mood-form
                :action="'{{ $mood->resource_url }}'"
                :data="{{ $mood->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.mood.actions.edit', ['name' => $mood->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.mood.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </mood-form>

        </div>
    
</div>

@endsection