import Vue from 'vue';
import moment from 'moment';

Vue.filter('fromNow', function (date) {
    const local = moment.utc(date).toDate();
    return moment(local).fromNow();
});
