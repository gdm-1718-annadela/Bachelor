import AppForm from '../app-components/Form/AppForm';

Vue.component('mood-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                mood:  '' ,
                picturetitle:  '' ,
                picturepath:  '' ,
                
            }
        }
    }

});