import AppForm from '../app-components/Form/AppForm';

Vue.component('message-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                message:  '' ,
                sender_id:  '' ,
                receiver_id:  '' ,
                chat_id:  '' ,
                
            }
        }
    }

});