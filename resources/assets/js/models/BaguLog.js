import axios from 'axios';

export default {
    paginate(then)
    {
        axios.get('/bagu/api/records')
            .then(({data}) => {
                then(data);
            });
    },

    find(id, then)
    {
        return new Promise((resolve, reject) => {
            axios.get(`/bagu/api/records/${id}`)
                .then(({data}) => {
                    console.log('low level then');
                    resolve(data);
                })
                .catch(({message}) => {
                    reject(message);
                });
        });
    }
};
