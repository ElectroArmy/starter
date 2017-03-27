Vue.prototype.$http = axios;





new Vue({
    el: '#app',

    data: function () {
        return {
            userList: [],
            user: {id: '', name: ''},
            authUser: {id: '', name: ''},
            edit: false,
            newMessage: {id: '', sender_id: '', content: ''},
            messages: {sender_id: '', receiver_id: '', content: '', created_at: ''},
        }

    },
    //ready: function () {
    //  this.listen();
    //this.fetchUsers();
    //},

    methods: {
        listen() {
            Echo.channel('chat.1.messages')
                .listen('MessageSent', event => {
                    this.messages.push(event.message)
                    this.assignMessages()
                })
                .listen('MessageDeleted', event => {
                    this.fetchMessages()
                })
                .listen('MessageUpdated', event => {
                    this.fetchMessages()
                });
        },
        fetchUsers: function () {
            axios.get('api/users').then(function (response) {
                this.userList = response.data
                this.user = response.data[0]
                //this.fetchAuthUser()
                //this.fetchMessages()
            });
        },

        fetchAuthUser: function () {
            this.$http.get('api/auth-user').then(function (response) {
                this.authUser = response.data
            });
        },

        fetchMessages: function () {
            this.$http.get('api/messages/' + this.user.id).then(function (response) {
                this.messages = response.data
                //this.assignMessages()
            });
        },

        chooseUser: function (user) {
            this.user = user
            this.fetchMessages()
            this.edit = false
        },

        assignMessages: function () {
            for (var i = 0; i <= this.messages.length; i++) {
                if (this.messages[i].sender_id == this.authUser.id) {
                    this.messages[i].content = this.authUser.name + ' says: ' + this.messages[i].content
                }
                else if (this.messages[i].receiver_id == this.authUser.id) {
                    this.messages[i].content = this.user.name + ' says: ' + this.messages[i].content
                }
            }
        },

        getMessage: function (id) {
            this.$http.get('api/message/' + id).then(function (response) {
                this.newMessage.id = response.data.id
                this.newMessage.sender_id = response.data.sender_id
                this.newMessage.content = response.data.content
            });
        },
        sendMessage: function () {
            this.$http.post('api/message', {
                'sender_id': this.authUser.id,
                'receiver_id': this.user.id,
                'content': this.newMessage.content
            }).then(function (response) {
                this.fetchMessages()
                this.emptyNewMessage()
            });
        },
        updateMessage: function (id) {
            this.$http.patch('api/message/' + id, {
                'sender_id': this.authUser.id,
                'content': this.newMessage.content
            }).then(function (response) {
                this.fetchUsers()
                this.emptyNewMessage()
                this.edit = false
            });
        },
        deleteMessage: function (message) {
            if (this.isMessageSent(message)) {
                this.$http.delete('api/message/' + message.id).then(function (response) {
                    console.log(response.body)
                    this.fetchMessages()
                    this.emptyNewMessage()
                });
            }
        },
        editMessage: function (message) {
            if (this.isMessageSent(message)) {
                this.edit = true
                this.getMessage(message.id)
            }
        },

        isMessageSent: function (message) {
            return this.authUser.id == message.sender_id
        },
        isMessageReceived: function (message) {
            return this.authUser.id == message.receiver_id
        },
        emptyNewMessage: function () {
            this.newMessage.id = ''
            this.newMessage.sender_id = ''
            this.newMessage.content = ''
        },

    },

    mounted() {
        axios.get('api/users').then(response => this.userList =response.data);
        //this.listen();
        //this.fetchUsers();
        this.fetchAuthUser()

    }
});