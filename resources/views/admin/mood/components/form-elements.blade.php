<div class="form-group row align-items-center" :class="{'has-danger': errors.has('mood'), 'has-success': fields.mood && fields.mood.valid }">
    <label for="mood" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mood.columns.mood') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.mood" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('mood'), 'form-control-success': fields.mood && fields.mood.valid}" id="mood" name="mood" placeholder="{{ trans('admin.mood.columns.mood') }}">
        <div v-if="errors.has('mood')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('mood') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('picturetitle'), 'has-success': fields.picturetitle && fields.picturetitle.valid }">
    <label for="picturetitle" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mood.columns.picturetitle') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.picturetitle" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('picturetitle'), 'form-control-success': fields.picturetitle && fields.picturetitle.valid}" id="picturetitle" name="picturetitle" placeholder="{{ trans('admin.mood.columns.picturetitle') }}">
        <div v-if="errors.has('picturetitle')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('picturetitle') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('picturepath'), 'has-success': fields.picturepath && fields.picturepath.valid }">
    <label for="picturepath" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mood.columns.picturepath') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.picturepath" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('picturepath'), 'form-control-success': fields.picturepath && fields.picturepath.valid}" id="picturepath" name="picturepath" placeholder="{{ trans('admin.mood.columns.picturepath') }}">
        <div v-if="errors.has('picturepath')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('picturepath') }}</div>
    </div>
</div>


