<div class="form-group row align-items-center" :class="{'has-danger': errors.has('path'), 'has-success': fields.path && fields.path.valid }">
    <label for="path" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.image.columns.path') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.path" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('path'), 'form-control-success': fields.path && fields.path.valid}" id="path" name="path" placeholder="{{ trans('admin.image.columns.path') }}">
        <div v-if="errors.has('path')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('path') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('caption'), 'has-success': fields.caption && fields.caption.valid }">
    <label for="caption" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.image.columns.caption') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.caption" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('caption'), 'form-control-success': fields.caption && fields.caption.valid}" id="caption" name="caption" placeholder="{{ trans('admin.image.columns.caption') }}">
        <div v-if="errors.has('caption')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('caption') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.image.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.image.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('type'), 'has-success': fields.type && fields.type.valid }">
    <label for="type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.image.columns.type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.type" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('type'), 'form-control-success': fields.type && fields.type.valid}" id="type" name="type" placeholder="{{ trans('admin.image.columns.type') }}">
        <div v-if="errors.has('type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('story_id'), 'has-success': fields.story_id && fields.story_id.valid }">
    <label for="story_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.image.columns.story_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.story_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('story_id'), 'form-control-success': fields.story_id && fields.story_id.valid}" id="story_id" name="story_id" placeholder="{{ trans('admin.image.columns.story_id') }}">
        <div v-if="errors.has('story_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('story_id') }}</div>
    </div>
</div>


