<div class="form-group row align-items-center" :class="{'has-danger': errors.has('message'), 'has-success': fields.message && fields.message.valid }">
    <label for="message" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.message.columns.message') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.message" v-validate="'required'" id="message" name="message" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('message')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('message') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sender_id'), 'has-success': fields.sender_id && fields.sender_id.valid }">
    <label for="sender_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.message.columns.sender_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sender_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sender_id'), 'form-control-success': fields.sender_id && fields.sender_id.valid}" id="sender_id" name="sender_id" placeholder="{{ trans('admin.message.columns.sender_id') }}">
        <div v-if="errors.has('sender_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sender_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('receiver_id'), 'has-success': fields.receiver_id && fields.receiver_id.valid }">
    <label for="receiver_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.message.columns.receiver_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.receiver_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('receiver_id'), 'form-control-success': fields.receiver_id && fields.receiver_id.valid}" id="receiver_id" name="receiver_id" placeholder="{{ trans('admin.message.columns.receiver_id') }}">
        <div v-if="errors.has('receiver_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('receiver_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('chat_id'), 'has-success': fields.chat_id && fields.chat_id.valid }">
    <label for="chat_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.message.columns.chat_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.chat_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('chat_id'), 'form-control-success': fields.chat_id && fields.chat_id.valid}" id="chat_id" name="chat_id" placeholder="{{ trans('admin.message.columns.chat_id') }}">
        <div v-if="errors.has('chat_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('chat_id') }}</div>
    </div>
</div>


