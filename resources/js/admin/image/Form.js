import AppForm from '../app-components/Form/AppForm';

Vue.component('image-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                path:  '' ,
                caption:  '' ,
                title:  '' ,
                type:  '' ,
                story_id:  '' ,
                
            }
        }
    }

});