<template>
    <div class="container">
        TODO get tasks data
        <ul class="list-group">
            <li class="list-group-item"><a href="#">Tache</a></li>
        </ul>
    </div>
</template>
<script>
//@TODO create template for list task
    export default {
        data() {
            return {
                tasks: {}
            }
        },
        created() {
            axios.get("/tasks")
                .response(response => console.log(response))
                .catch()
        },

        mounted() {
            console.log('component mounted. ')
        }
    }

</script>
