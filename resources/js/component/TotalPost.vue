<template>
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Post</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ totalPost }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                totalPost: 0
            }
        },
        mounted(){

            this.getTotalPost();

            Echo.channel(`post-channel`)
                .listen('.App\\Events\\PostNotify', (e) => {
                    this.getTotalPost();
                });

           
        }, 
        methods: {
            getTotalPost(){
                 axios.get('/api/dashboard/total-post').then(response => {
                    this.totalPost = response.data;
                });
            }
        }

    }
</script>