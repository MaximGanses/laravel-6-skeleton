<template>
    <div class="container">
        <h1>Lookup tweets from username</h1>

        <input type="text" placeholder="Twitter username" class="form-control">
        <button class="btn btn-primary mt-1">Find tweets</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                post: {}
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            lookTweet()
            {}

        }
    }
</script>
