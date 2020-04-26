import AppForm from '../app-components/Form/AppForm';

Vue.component('story-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                text:  '' ,
                user_id:  '' ,
                category_id:  '' ,
                mood_id:  '' ,
                type_id:  '' ,
                
            }
        }
    }

});