<template lang="html">
    <div>
        <p class="is--black">{{ message.message }}</p>
        <small class="is--black">{{ message.user.name }}</small>
    </div>
    
</template>

<script>
    export default{
        props: ['message']
    }
</script>

<style lang="css">
    .chat-message {
        padding: 1rem;
    }
    
    .chat-message > p {
        margin-bottom: .5rem;
    }
</style>