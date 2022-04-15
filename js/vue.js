import Vue
Vue.component('events', {
    template: '#events-template',

    data () {
        return {
            list: [],
            timer: ''
        }
    },
    created () {
        this.fetchEventsList();
        this.timer = setInterval(this.fetchEventsList, 300000);
    },
    methods: {
        fetchEventsList () {
            this.$http.get('events', (events) => {
                this.list = events;
            }).bind(this);
        },
        cancelAutoUpdate () {
            clearInterval(this.timer);
        }
    },
    beforeDestroy () {
        this.cancelAutoUpdate();
    }
});

new Vue({
    el: 'body',
});