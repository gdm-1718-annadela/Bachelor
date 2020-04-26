import AppForm from '../app-components/Form/AppForm';

Vue.component('user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                username:  '' ,
                name:  '' ,
                firstname:  '' ,
                email:  '' ,
                email_verified_at:  '' ,
                age:  '' ,
                story:  '' ,
                picturetitle:  '' ,
                picturepath:  '' ,
                password:  '' ,
                type_id:  '' ,
                
            }
        }
    }

});