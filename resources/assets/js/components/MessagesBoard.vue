<template>
    <div class="card">
        <div class="card-header">Messages</div>

        <div class="card-body">
            <ul class="messages-list list-group">
                <li class="list-group-item" :class="alertType(message.type)" v-for="message in messages">
                    <span class="badge bage-secondary">{{ message.date }}</span>
                    {{ message.content.trim() }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['messages'],
        methods: {
            alertType: function(type) {
                var type_class = "list-group-item-";
                switch (type) {
                    case "start":
                        type_class += "info";
                        break;
                    case "end":
                        type_class += "success";
                        break;
                    case "error":
                        type_class += "danger";
                        break;
                    default:
                        type_class += "primary";
                }
                return type_class;
            }
        }
    }
</script>
