<template>
    <div>
        <log-details v-for="log in records" :log="log"></log-details>
    </div>
</template>

<script>
import BaguLog from '../../models/BaguLog';
import LogDetails from './log-details.vue';

export default {
    name: 'Index',
    components: {'log-details': LogDetails},

    data()
    {
        return {
            records: [],
        };
    },

    created() {
        BaguLog.paginate(records => {
            this.records = records;
        });
    }
}
</script>
